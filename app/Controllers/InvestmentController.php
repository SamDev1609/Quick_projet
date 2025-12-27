<?php

namespace App\Controllers;

use App\Models\InvestmentModel;
use App\Models\BudgetModel;

class InvestmentController extends BaseController
{

    //Obtenir tous les investissements
    function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT investments_table.created_at,investments_table.user_id,investments_table.investment_id,investments_table.code_country,investments_table.status,
        investments_table.amount,investments_table.pattern
        ,users_table.name,users_table.surname 
        FROM investments_table,users_table
        where investments_table.user_id = users_table.id order by investment_id desc");
        $data['investment_data'] = $query->getResultArray();
        $data['page_title'] = 'Gestion des investissements';
        return view('investment/index', $data);
    }

    // Save un nouvel investissement
    public function save()
    {
         $InvestmentModel = new InvestmentModel();
        $budget = new BudgetModel();
        $db = \Config\Database::connect();

         // Recup les budgets
            $query1 = $db->query("SELECT budget_id,budget_ga,budget_sn FROM budgets_table
            ORDER BY budget_id DESC
            LIMIT 1");
            $row1 = $query1->getRow();

            if ($this->request->getPost('code_country') === 'Senegal') {

            // Retirer le total sent du budget Senegal 
            $new_budget_sn = $row1->budget_sn + $this->request->getPost('amount');

            // Ajouter le total sent au budget
            $new_budget_ga = $row1->budget_ga;

             // Inserer les nouveaux budgets 

            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $this->request->getPost('user_id')
            ]);

             }else{

                 // Retirer le total sent du budget Senegal 
            $new_budget_ga = $row1->budget_ga + $this->request->getPost('amount');

            // Ajouter le total sent au budget
            $new_budget_sn = $row1->budget_sn;

             // Inserer les nouveaux budgets 

            $budget->insert([
                'budget_ga' =>  $new_budget_ga,
                'budget_sn' =>  $new_budget_sn,
                'user_id' => $this->request->getPost('user_id')
            ]);

                
             } 

             // Inserer les données de l'operation
        $InvestmentModel->insert(
            [
                'user_id' => $this->request->getPost('user_id'),
                'amount' => $this->request->getPost('amount'),
                'code_country' => $this->request->getPost('code_country'),
                'pattern' => $this->request->getPost('pattern')
            ]
        );

            // Redirection vers la route
            $session = session();
        $session->setFlashdata('success', 'Interressant! Vous avez fait un nouvel investissement');
        return redirect()->to('/investments');

   
    }


    // Appeller page édit
    public function edit($investment_id)
    {
        $InvestmentModel = new InvestmentModel();
       $data['investment_data']=$InvestmentModel->find($investment_id);
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
