<?php

namespace App\Controllers;
use App\Models\SupplyModel;
use App\Models\BudgetModel;
use App\Models\UserModel;

class SupplyController extends BaseController
{

    public function create(): string
    {
        return view('supply/create');
    }

    //Get all Budget
    function index()
	{
        $db = \Config\Database::connect();
        $query = $db->query("SELECT supply_table.created_at,supply_table.profit,supply_table.supply_id,
         supply_table.amount,supply_table.customer_code,customer_table.name as cust_name
,users_table.name,users_table.surname,users_table.id 
FROM supply_table,users_table,customer_table
where supply_table.user_id = users_table.id
 and customer_table.tel_customer= supply_table.customer_code
  order by supply_id desc");
        $data['supply_data'] = $query->getResultArray();

        // Reccuperer tous les clients
        $query = $db->query("SELECT customer_table.tel_customer,customer_table.name
        FROM customer_table,users_table
        where customer_table.user_id = users_table.id");
        $data['customer_data'] = $query->getResultArray();

        $data['page_title'] = 'Gestion envois -> Gabon';
        return view('supply/index',$data);
	}
    
    // Save new supply
    public function save()
    {
         $db = \Config\Database::connect();
        $supply = new SupplyModel();
        $budget = new BudgetModel();

         // Recup les budgets
        $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

        // Calcul pourcentage
        $pourcentage = $this->request->getPost('amount')*0.03;

        // Retirer le total sent du budget Senegal 
        $new_budget_sn = $row1->budget_sn + $this->request->getPost('amount') + $pourcentage;

        // Ajouter le total sent au budget
        $new_budget_ga = $row1->budget_ga - $this->request->getPost('amount');

        // Inserer les nouveaux budgets 
            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $this->request->getPost('user_id')
            ]);

             $supply->insert(
            [
                'user_id' => $this->request->getPost('user_id'), 
                'amount' => $this->request->getPost('amount'),
                'profit' => $pourcentage,
                'customer_code' => $this->request->getPost('customer_code')
            ]
        );

           $crk=$this->request->getPost('amount');

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
    $email->setMessage(" L'envoi du Sénégal -> Gabon de $crk a déjà été renseigné dans Quick transfer")
    ;$email->send();
    
         }

                
        $session = session();
        $session->setFlashdata('success', "Envoi -> Gabon réussi, votre bénéfice: $pourcentage");
         return redirect()->to('/supply');
    }

     // Show supply
     public function edit($supply_id)
     {
         $SupplyModel = new SupplyModel();
     $data['supply_data'] = $SupplyModel->find($supply_id);
     $data['page_title'] = 'Gestion des budgets';
        return view('supply/edit',$data);
     }

     // update product data
     public function update($supply_id){
        var_dump($supply_id);
        $SupplyModel = new SupplyModel();
       $data = [
          'user_id' => $this->request->getPost('user_id'),
           'profit'  => $this->request->getPost('profit'),
           'lost'  => $this->request->getPost('lost'),
           'amount'  => $this->request->getPost('amount'),
            
           ];
              $session = session();
        $session->setFlashdata('success', 'Mise à jour réussie');
       $save = $SupplyModel->update($supply_id,$data);
       return redirect()->to('supply/index');
   }
   
    // Delete supply
    public function delete($supply_id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("DELETE FROM supply_table WHERE supply_table.supply_id = $supply_id");
        if($query){
            $session = session();
        $session->setFlashdata('success', 'Suppression réussie');
          return redirect()->to('/supply');
        };
        
    }

}
