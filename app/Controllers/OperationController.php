<?php

namespace App\Controllers;

use App\Models\OperationModel;
use App\Models\BudgetModel;
use App\Models\CustomerModel;
use \Config\Services\session;

class OperationController extends BaseController
{

    public function create(): string
    {
        $data['page_title'] = 'Gestion des transferts';
        return view('operation/create', $data);
    }



    //Get all sends
    function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT operations_table.created_at,operations_table.operation_id,
         operations_table.amount,operations_table.profit,operations_table.lost
        ,users_table.name,users_table.surname 
        FROM operations_table,users_table
        where operations_table.user_id = users_table.id order by operation_id desc");
        $data['operations_data'] = $query->getResultArray();
        $data['page_title'] = "Gestion envois -> Sénégal | CI";
        
        return view('operation/index', $data);
    }

    // Save new send
    public function save()
    {
        $send = new OperationModel();
        $budget = new BudgetModel();
        $db = \Config\Database::connect();

        if ($this->request->getPost('destination')=="SN") {

             //Recup variables
        $pourcentage = $this->request->getPost('amount')*0.09 - $this->request->getPost('lost');
        $amount = $this->request->getPost('amount');
        $lost = $this->request->getPost('lost');
        $total_sent = $this->request->getPost('amount') +  $this->request->getPost('lost');
        $user_id = $this->request->getPost('user_id');

        // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            if ($row1->budget_sn>$total_sent) {
                // Retirer le total sent dans le budget Senegal 
            $new_budget_sn = $row1->budget_sn - $total_sent;

            // Ajouter le total sent au budget
            $new_budget_ga = $row1->budget_ga + $amount+$pourcentage;

            // Inserer les nouveaux budgets 
            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $user_id
            ]);

            // Inserer les données de l'operation 
            $send->insert([
                'user_id' => $this->request->getPost('user_id'),
                'amount' =>  $amount,
                'profit' =>  $pourcentage,
                'lost' => $lost,
                'total_sent' => $total_sent
            ]);

             // Envoi des mail
        $user_query = $db->query("SELECT email FROM users_table");
            $user_email = $user_query->getResultArray();

            //mail($donnees['email'], $sujet, $message, $from);
        
            $email = \Config\Services::email();
            foreach ($user_email as $address) {
    $email->setTo($address);
    //$cid = $email->setAttachmentCID($filename);
     $email->setFrom('quicktransfer2520@gmail.com', 'QUICK');
    $email->setSubject('FELICITATIONS');
    $email->setMessage(" L'envoi du Gabon -> Sénégal de $amount a déjà été renseigné dans Quick transfer")
    ;$email->send();
    
         }

            

             $session = session();
            $session->setFlashdata('success', "Envoie Gabon -> Sénégal réussi, porfit : $pourcentage");
            return redirect()->to('/operations');

            }else {
               $session = session();
            $session->setFlashdata('mistake', 'Impossible de transferer un montant pas disponible!');
            return redirect()->to('/operations');
            }

        } else {

        //Recup variables
        $lost = $this->request->getPost('lost');
        $pourcentage = $this->request->getPost('amount') * 0.13 - $lost ;
        
        $user_id = $this->request->getPost('user_id');
        $amount = $this->request->getPost('amount');
        $total_sent = $amount + $lost;

        // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            if ($row1->budget_sn>$total_sent) {

        // Retirer le total sent du budget Senegal 
            $new_budget_sn = $row1->budget_sn - $total_sent;

            // Ajouter le total sent au budget
            $new_budget_ga = $row1->budget_ga + $amount;

         // Inserer les nouveaux budgets 
            $budget->insert([
                'budget_ga' => $new_budget_ga,
                'budget_sn' => $new_budget_sn,
                'user_id' => $user_id
            ]);

            // Inserer les données de l'operation 
            $send->insert([
                'user_id' => $this->request->getPost('user_id'),
                'amount' =>  $amount,
                'profit' =>  $pourcentage,
                'lost' => $lost,
                'total_sent' => $total_sent
            ]);

             // Envoi des mail
        $user_query = $db->query("SELECT email FROM users_table");
            $user_email = $user_query->getResultArray();

            //mail($donnees['email'], $sujet, $message, $from);
        
            $email = \Config\Services::email();
            foreach ($user_email as $address) {
    $email->setTo($address);
    //$cid = $email->setAttachmentCID($filename);
     $email->setFrom('quicktransfer2520@gmail.com', 'QUICK');
    $email->setSubject('FELICITATIONS');
    $email->setMessage(" L'envoi du Gabon -> Côte d'Ivoire de $amount a déjà été renseigné dans Quick transfer")
    ;$email->send();
    
         }

            $session = session();
            $session->setFlashdata('success', "Envoie Gabon -> Côte d'Ivoire réussi, porfit : $pourcentage");
            return redirect()->to('/operations');

             }else {
               $session = session();
            $session->setFlashdata('mistake', 'Impossible de transferer un montant pas disponible!');
            return redirect()->to('/operations');
            }
        } 
    }

    // Show operation
    public function edit($operation_id)
    {
        $OperationModel = new OperationModel();
        $data['operation_data'] = $OperationModel->find($operation_id);
        $data['page_title'] = "Modification d'un envoi";
        return view('operation/edit', $data);
    }
    // update product data
    public function update($operation_id)
    {
        var_dump($operation_id);
        $OperationModel = new OperationModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'pourcentage'  => $this->request->getPost('pourcentage'),
            'lost'  => $this->request->getPost('lost'),
            'amount'  => $this->request->getPost('amount'),
        ];
        $session = session();
        $session->setFlashdata('success', 'Envoi modifié');
        $save = $OperationModel->update($operation_id, $data);
        return redirect()->to('operation/index');
    }

    // Delete send
    public function delete($operation_id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("DELETE FROM operations_table WHERE operations_table.operation_id = $operation_id");
        if ($query) {
            $session = session();
            $session->setFlashdata('success', 'Envoi supprimé!');
            return redirect()->to('/operations');
        };
    }
}
