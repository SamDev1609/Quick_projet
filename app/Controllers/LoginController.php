<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BudgetModel;
use App\Models\OperationModel;
$session = session();


class LoginController extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    //Connexion
   
    public function login()
    {
        $session = session();
        $UserModel = new UserModel();
        $user_email = $this->request->getVar('user_email');
        $user_password = $this->request->getVar('user_password');
        $data = $UserModel->where('email', $user_email)->first();
        
        if ($data) {
            $pass = $data['password'];
            //$verify_pass = password_verify($password, $pass);
            if ($user_password==$pass) {
                $users_data = [
                    'id'       => $data['id'],
                    'surname' => $data['surname'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'logged_in'     => TRUE
                ];

                $session->set($users_data);
                return redirect()->to('/dashbord');
            } else {
                $session->setFlashdata('msg', 'Mauvais mot de passe');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Email incorrecte');
            return redirect()->to('/');
        }
    }

    public function dashbord(): string
    {
          $BudgetModel = new BudgetModel();
        $OperationModel = new OperationModel();
         $db = \Config\Database::connect();
         
         // Chart radar
         $data['radar_chart'] = $OperationModel->getRadarChart();

        // Line chart
         $data['line_chart'] = $OperationModel->getChartLine();

         // Bar chart
         $data['bar_chart'] = $OperationModel->getBarChart();

// Reccupère envois
 $query = $db->query("SELECT *
FROM operations_table
ORDER BY operation_id DESC LIMIT 15");
$data['operation_data'] = $query->getResultArray();




         //RECUPERE SUPPLY
        $query = $db->query("SELECT supply_table.created_at,supply_table.supply_id,
         supply_table.amount,supply_table.customer_code,supply_table.profit
,users_table.name,users_table.surname,users_table.id,users_table.pic_link
FROM supply_table,users_table
where supply_table.user_id = users_table.id order by supply_id desc limit 5");

$data['supply_data'] = $query->getResultArray();
      
        // Total profit
       $builder = $db->query('Select sum(profit) as profit_data from operations_table');
       $results = $builder->getRow();
       $data['profittop'] = $results->profit_data ?? 0;

       
    // Total envois SN
       $builder = $db->query('Select sum(profit) as ts_profit_data from supply_table');
       $results = $builder->getRow();
       $data['ts_profit_data'] = $results->ts_profit_data ?? 0;

       // Total revenus GA
       $builder = $db->query('Select sum(profit) as tg_profit_data from operations_table');
       $results = $builder->getRow();
       $data['tg_profit_data'] = $results->tg_profit_data ?? 0;

 
 
       //Solde senegal
       $builder = $db->query('Select budget_sn as liq_sn from budgets_table order by budget_id desc limit 1');
       $results = $builder->getRow();
       $data['liq_sn'] = $results->liq_sn ?? 0;

       //Solde gabon
       $builder = $db->query('Select budget_ga as liq_ga from budgets_table order by budget_id desc limit 1');
       $results = $builder->getRow();
       $data['liq_ga'] = $results->liq_ga ?? 0;

        //Solde total
       $builder = $db->query('Select (budget_ga + budget_sn) as liq_total from budgets_table ORDER by budget_id desc LIMIT 1');
       $results = $builder->getRow();
       $data['liq_total'] = $results->liq_total ?? 0;

       //Last BP
       $builder = $db->query('SELECT (budget_ga+budget_sn) as last_bp FROM `budgets_table`
WHERE MONTH(created_at)=month(CURRENT_DATE)-1
AND year(created_at)=year(CURRENT_DATE)
ORDER BY budget_id DESC LIMIT 1');
       $results = $builder->getRow();
       $data['last_bp'] = $results->last_bp ?? 0;

       //Revenus Current
       $builder = $db->query('SELECT sum(profit) as profit_current FROM supply_table
WHERE month(created_at) = month(CURRENT_DATE)
AND year(created_at)=year(created_at)');
       $results = $builder->getRow();
       $data['profit_current'] = $results->profit_current ?? 0;

        //Revenus otal 
       $builder = $db->query('SELECT sum(profit) as profit_total_now FROM operations_table
WHERE month(created_at) = month(CURRENT_DATE)
AND year(created_at)=year(created_at)');
       $results = $builder->getRow();
       $data['profit_total_now'] = $results->profit_total_now ?? 0;

        //Revenus month-1
       $builder = $db->query('SELECT sum(profit) as profit_total_1 FROM operations_table
WHERE month(created_at)=month(CURRENT_DATE)-1
AND year(created_at)=year(created_at)');
       $results = $builder->getRow();
       $data['profit_total_1'] = $results->profit_total_1 ?? 0;

        $data['app_name']="QUICK TRANSFER";
        $data['page_title']="Dashboard";
       return view('dashbord', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

  
}

