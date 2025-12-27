<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\BudgetModel;

class LoanController extends BaseController
{

    public function create(): string
    {
        $data['page_title'] = 'Gestion des budgets';
        return view('loan/create');
    }

    //Get all sends
    function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT loan_table.created_at,loan_table.user_id,loan_table.loan_id,loan_table.code_country,loan_table.status,
        loan_table.amount
        ,users_table.name,users_table.surname 
        FROM loan_table,users_table
        where loan_table.user_id = users_table.id order by loan_id desc");
        $data['loan_data'] = $query->getResultArray();
        $data['page_title'] = 'Gestion des prêts';
        return view('loan/index', $data);
    }

    // Save new send
    public function save()
    {    
        //elements connexion aux model
        $LoanModel = new LoanModel();
        $db = \Config\Database::connect();
        $budget = new BudgetModel();

        if ($this->request->getPost('code_country') === 'Senegal'){

            $code_country = $this->request->getPost('code_country');
            $amount = $this->request->getPost('amount');
            $user_id = $this->request->getPost('user_id');

            // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            // Retirer le total sent du budget Senegal 
            $new_budget_sn = $row1->budget_sn - $amount;
            $new_budget_ga = $row1->budget_ga;
    
            // Insérer les nouveaux budgets 
             $budget->insert([
                'budget_sn'=> $new_budget_sn,
                 'budget_ga'=> $new_budget_ga,
                'user_id'=> $user_id
            ]);

            // Inserer les données de l'operation
        $LoanModel->insert(
            [
                'user_id' => $this->request->getPost('user_id'),
                'amount' => $this->request->getPost('amount'),
                'code_country' => $code_country
            ]
        );
        $session = session();
        $session->setFlashdata('success', 'Nouveau prêt du Sénégal sauvegardé!');
        return redirect()->to('/loans');

         }else {
             $code_country = $this->request->getPost('code_country');
            $amount = $this->request->getPost('amount');
            $user_id = $this->request->getPost('user_id');

            // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            // Retirer le total sent du budget Ga 
            $new_budget_ga = $row1->budget_ga - $amount;
            $new_budget_sn = $row1->budget_sn;

            //Inserer nouveau budget
             $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $user_id
            ]);

            // Inserer les données de l'operation
            $LoanModel->insert(
            [
                'user_id' => $this->request->getPost('user_id'),
                'amount' => $this->request->getPost('amount'),
                'code_country' => $code_country
            ]
        );
        $session = session();
        $session->setFlashdata('success', 'Nouveau prêt du Gabon sauvegardé!');
        return redirect()->to('/loans');
         }

    }


    // Show LoanModel
    public function edit($loan_id)
    {
        $LoanModel = new LoanModel();
       $data['loan_data']=$LoanModel->find($loan_id);
       $data['page_title'] = 'Faire une avance sur le prêts';

    if (empty($data['loan_data'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Aucun prêt trouvé: '. $loan_id);
       }
       return view('loan/edit', $data);
    }

    // update product data
    public function update($loan_id)
    {
            $db = \Config\Database::connect();
            $budget = new BudgetModel();
            $loan = new LoanModel();

        // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            // Recup les le prets
            $query2 = $db->query("SELECT loan_id,amount,code_country FROM loan_table
            Where loan_id = $loan_id");
            $row2 = $query2->getRow();

        $user_id=$this->request->getPost('user_id');
        $code_country = $this->request->getPost('code_country');

         if (  $row2->code_country==='Gabon' ) {

          // Ajouter au budget senegal
            $new_budget_sn = $row1->budget_sn + $this->request->getPost('amount');
            $new_budget_ga = $row1->budget_ga;

            // Inserer les nouveaux budgets 
            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $user_id
            ]);

            $new_amount_loan = $row2->amount - $this->request->getPost('amount');

            // Stocker le nouveau budget Senegal
            $query14 = $db->query("UPDATE loan_table set amount = $new_amount_loan
        WHERE loan_id = $loan_id");
         
         } else {
          
            // Ajouter au budget senegal
            $new_budget_ga = $row1->budget_ga + $this->request->getPost('amount');
            $new_budget_sn = $row1->budget_sn;

            // Inserer les nouveaux budgets 

            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $user_id
            ]);

            $new_amount_loan = $row2->amount - $this->request->getPost('amount');

            // Stocker le nouveau budget Senegal
            $query14 = $db->query("UPDATE loan_table set amount = $new_amount_loan
        WHERE loan_id = $loan_id");
       
         }
           $session = session();
        $session->setFlashdata('success', 'Félicitations, vous avez remboursé une partie de votre dette');
        return redirect()->to('/loans');

    }

  
    // Delete send
    public function buy_loan($loan_id)
    {
        $db = \Config\Database::connect();

        // réccuperer le code du pays
        $q1 = $db->query("SELECT amount,code_country FROM loan_table 
         WHERE loan_id = $loan_id");
        $r1 = $q1->getRow();

        
        if ($r1->code_country === 'Senegal') {

             $db = \Config\Database::connect();
            $budget = new BudgetModel();
             $loan = new LoanModel();

            // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            // Recup les le prets
            $query2 = $db->query("SELECT loan_id,amount,code_country FROM loan_table
            Where loan_id = $loan_id");
            $row2 = $query2->getRow();

            // Retirer le total sent du budget Senegal
            $new_budget_ga = $row2->amount + $row1->budget_ga;
            $new_budget_sn =  $row1->budget_sn;

             // Inserer les nouveaux budgets 

            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
            ]);

          // Changer status loan
            $query14 = $db->query("UPDATE loan_table set status ='remboursée'
        WHERE loan_id = $loan_id ");

        } else {

            $db = \Config\Database::connect();
            $budget = new BudgetModel();
             $loan = new LoanModel();
             
        // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            // Recup les le prets
            $query2 = $db->query("SELECT loan_id,amount,code_country FROM loan_table
            Where loan_id = $loan_id");
            $row2 = $query2->getRow();

            // Retirer le total sent du budget Senegal
            $new_budget_sn = $row2->amount + $row1->budget_sn;
            $new_budget_ga =  $row1->budget_ga;

             // Inserer les nouveaux budgets 
            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn
            ]);

          // Changer status loan
            $query14 = $db->query("UPDATE loan_table set status ='remboursée'
        WHERE loan_id = $loan_id ");
        }

        $session = session();
        $session->setFlashdata('success', 'Bravo, vous avez remboursé toute votre dette!');
        return redirect()->to('/loans');
    }
}
