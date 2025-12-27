<?php
namespace App\Controllers;
use App\Models\BudgetModel;

class BudgetController extends BaseController
{
    //Obtenir tous les budgets
    function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT users_table.name,users_table.surname,budgets_table.created_at,budgets_table.budget_ga,budgets_table.budget_sn
        , budgets_table.budget_id,users_table.id 
FROM budgets_table,users_table
where budgets_table.user_id = users_table.id order by budget_id desc");
       
        $data['budget_data'] = $query->getResultArray();
        $data['page_title'] = 'Gestion des budgets';
        return view('budget/index', $data);
    }

    // Appéller la page édit budget
    public function edit($budget_id)
    {
        $BudgetModel = new BudgetModel();
        $data['budget_data'] = $BudgetModel->find($budget_id);
        $data['page_title'] = 'Gestion des budgets';
        return view('budget/edit', $data);
    }

    // update product data
    public function update($budget_id)
    {
        $BudgetModel = new BudgetModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'budget_ga'  => $this->request->getPost('budget_ga'),
            'budget_sn'  => $this->request->getPost('budget_sn')
        ];
         $save = $BudgetModel->update($budget_id, $data);
        $session = session();
        $session->setFlashdata('success', 'Super! Budgets mise à jour!');
       
        return redirect()->to('/budgets');
    }
}
