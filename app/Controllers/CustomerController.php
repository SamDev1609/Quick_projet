<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\BudgetModel;

class CustomerController extends BaseController
{

    //Obtenir tous les investissements
    function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT customer_table.tel_customer,customer_table.name,customer_table.user_id,customer_table.created_at
        FROM customer_table,users_table
        where customer_table.user_id = users_table.id");
        $data['customer_data'] = $query->getResultArray();
        $data['page_title'] = 'Gestion des clients';
        return view('customer/index', $data);
    }

    // Save un nouvel investissement
    public function save()
    {
         $CustomerModel = new CustomerModel();
       
        $CustomerModel = new CustomerModel();
       $data['customer_data']=$CustomerModel->find($this->request->getPost('tel_customer'));
       
       if (empty($data['customer_data'])) {
                $CustomerModel->insert([
                'user_id' => $this->request->getPost('user_id'),
                'tel_customer' => $this->request->getPost('tel_customer'),
                'name' => $this->request->getPost('name')
            ]);

              // Redirection vers la route
            $session = session();
        $session->setFlashdata('success', 'Client ajouté avec susccès!');
        return redirect()->to('/customers'); 

         }else{

             // Redirection vers la route
            $session = session();
        $session->setFlashdata('success', 'Oups! ce client existe déjà');
        return redirect()->to('/customers'); 
         } 
             } 


    // Appeller page édit
    public function edit($investment_id)
    {
        $CustomerModel = new CustomerModel();
       $data['investment_data']=$CustomerModel->find($investment_id);
       $data['page_title'] = 'Retirer un montant';

    if (empty($data['investment_data'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Aucun prêt trouvé: '. $investment_id);
       }
       return view('investment/edit', $data);
    }


    // Mise à jour investissement
    public function update($investment_id)
    {
         $db = \Config\Database::connect();

        // réccuperer le code du pays
        $q1 = $db->query("SELECT amount,code_country FROM investments_table 
         WHERE investment_id = $investment_id");
        $r1 = $q1->getRow();

        $n_amount_investment=$r1->amount - $this->request->getPost('amount');
         
         // Nouvelle valeur du montantvloan
          $query14 = $db->query("UPDATE investments_table set amount =$n_amount_investment
        WHERE investment_id = $investment_id ");

        // Retirer le total sent du budget Senegal
        
        if ($r1->code_country === 'Senegal') {

            $db = \Config\Database::connect();

            //Pour Senegal
            // réccuperer amount de la tables budgets 
            $q2 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $r2 = $q2->getRow();

            // Retirer le total sent du budget Senegal
            $new_budget1 = $r2->budget_sn - $this->request->getPost('amount');
            
            // Stocker le nouveau budget Senegal
            $query14 = $db->query("UPDATE budgets_table set budget_sn=$new_budget1
        WHERE budget_id = $r2->budget_id ");
        } 
        else {
            $db = \Config\Database::connect();

            // réccuperer amount de la tables budgets 
            $q2 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $r2 = $q2->getRow();

            // Retirer le total sent du budget Senegal
            $new_budget1 = $r2->budget_ga - $this->request->getPost('amount');
            
            // Stocker le nouveau budget Senegal
            $query14 = $db->query("UPDATE budgets_table set budget_ga = $new_budget1
        WHERE budget_id = $r2->budget_id");
         
        }
        $session = session();
        $session->setFlashdata('success', 'Oups! Vous avez retiré un montant à votre investissement');
        return redirect()->to('/investments');
    }

  
    // Delete send
    public function retir_investissement ($investment_id)
    {
        $db = \Config\Database::connect();

        // réccuperer le code du pays
        $q1 = $db->query("SELECT amount,code_country FROM investments_table 
         WHERE investment_id = $investment_id");
        $r1 = $q1->getRow();
        
        // Retirer le total sent du budget Senegal
        //$new_amount1 = $row1->amount - $this->request->getPost('amount');

        if ($r1->code_country === 'Senegal') {

            $db = \Config\Database::connect();

            // réccuperer amount de la tables budgets 
            $q2 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $r2 = $q2->getRow();

            // Retirer le total sent du budget Senegal
            $new_budget1 = $r2->budget_sn - $r1->amount;
            
            // Stocker le nouveau budget Senegal
            $query14 = $db->query("UPDATE budgets_table set budget_sn=$new_budget1
        WHERE budget_id = $r2->budget_id");

          // Changer status loan
            $query14 = $db->query("UPDATE investments_table set status ='investissement retiré'
        WHERE investment_id = $investment_id ");
        } 
        else {

            $db = \Config\Database::connect();
            
            // réccuperer amount de la tables budgets 
            $q3 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $r3 = $q3->getRow();

            // Retirer le total sent du budget Senegal
            $new_budget2 = $r3->budget_ga - $r1->amount;
            
            // Stocker le nouveau budget Senegal
            $query14 = $db->query("UPDATE budgets_table set budget_ga = $new_budget2 
        WHERE budget_id = $r3->budget_id ");

        // Changer status loan
            $query14 = $db->query("UPDATE investments_table set status ='investissement retiré'
        WHERE investment_id = $investment_id ");

        
        }
         $session = session();
        $session->setFlashdata('success', 'Le montant a été retiré du budget!');
        return redirect()->to('/investments');
    }
}
