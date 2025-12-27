<?php

namespace App\Controllers;

use App\Models\OperationModel;
use App\Models\BudgetModel;
use \Config\Services\session;


class ClientstatsController extends BaseController
{

   
    //Get all sends
    function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(supply_table.supply_id) as ID,ROW_NUMBER() OVER () AS nbre_ligne,customer_table.name, SUM(supply_table.amount) as total_send,ROUND(SUM(supply_table.profit)) as total_get
FROM supply_table,customer_table
WHERE supply_table.customer_code=customer_table.tel_customer
GROUP by customer_table.tel_customer
ORDER BY amount ASC");
        $data['client_stats'] = $query->getResultArray();
        $data['page_title'] = "Gestion des transferts";
        $data['page_title']="Envois par clients";
        return view('statsclients/index', $data);
    }

      // Show LoanModel
    public function show($month_year)
    {

      // Tous les envois du mois
       $db = \Config\Database::connect();
        $query = $db->query("SELECT ROW_NUMBER() OVER () AS Nbre_ligne, operations_table.created_at as dateop,  operations_table.profit as gain,operations_table.lost
FROM operations_table
WHERE DATE_FORMAT(operations_table.created_at, '%m%Y') =$month_year");

// Total lost
       $builder = $db->query("Select sum(lost) as ts_lost from operations_table
       WHERE DATE_FORMAT(operations_table.created_at, '%m%Y') =$month_year");
       $results = $builder->getRow();
       $data['ts_lost'] = $results->ts_lost ?? 0;

// Total profits
       $builder = $db->query("Select sum(profit) as ts_profit from operations_table
       WHERE DATE_FORMAT(operations_table.created_at, '%m%Y') =$month_year");
       $results = $builder->getRow();
       $data['ts_profit'] = $results->ts_profit ?? 0;

       /* $y=date('Y', strtotime($month_year));*/
       $m=date('M', strtotime($month_year)); 

       //Last BP
       $builder = $db->query('SELECT (budget_ga+budget_sn) as last_bp FROM `budgets_table`
WHERE MONTH(created_at)=month(CURRENT_DATE)-1
AND year(created_at)=year(CURRENT_DATE)
ORDER BY budget_id DESC LIMIT 1');
       $results = $builder->getRow();
       $data['last_bp'] = $results->last_bp ?? 0;

        $data['operations_data'] = $query->getResultArray();  

         $data['repname']=$month_year;

       return view('reports/mth_report' , $data );
    }

  

}
