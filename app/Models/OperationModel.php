<?php
namespace App\Models;
use CodeIgniter\Model;


class OperationModel extends Model
{
    protected $table  ='operations_table';
    protected $primaryKey = 'operation_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id','amount','profit','lost','total_sent','created_at'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    public function getRadarChart()
    {
        $db = \Config\Database::connect();
       $query=$db->query("SELECT 
    month(created_at),sum(profit) as month_profit,
    CASE month(created_at)
        WHEN 1 THEN 'Janvier'
        WHEN 2 THEN 'Février'
        WHEN 3 THEN 'Mars'
        WHEN 4 THEN 'Avril'
        WHEN 5 THEN 'Mai'
        WHEN 6 THEN 'Juin'
        WHEN 7 THEN 'Juillet'
        WHEN 8 THEN 'Août'
        WHEN 9 THEN 'Septembre'
        WHEN 10 THEN 'Octobre'
        WHEN 11 THEN 'Novembre'
        WHEN 12 THEN 'Décembre'
        ELSE 'month_num'
    END AS month_num
FROM supply_table
WHERE year(created_at) = year(CURRENT_DATE)
GROUP BY month(created_at)
ORDER BY month(created_at) asc");
        $data = $query->getResultArray();
        return $data;

    }

     public function getChartLine()
    {
        $db = \Config\Database::connect();
       $query=$db->query("SELECT 
  day(created_at) as day,sum(profit) as profit,sum(lost) as lost
FROM operations_table
WHERE month(created_at) = month(CURRENT_DATE)
AND year(created_at) = year(CURRENT_DATE)
GROUP BY day(created_at)");
        $data = $query->getResultArray();
        return $data;

    }

   /* Req de l'areignée cachée==>  
   
   SELECT day(created_at) as day,sum(profit) as profit,sum(lost) as lost
   
FROM operations_table
WHERE month(created_at) = month(CURRENT_DATE)
AND year(created_at) = year(CURRENT_DATE)

GROUP BY day(created_at)
ORDER BY created_at asc*/

    public function getBarChart()
    {
        $db = \Config\Database::connect();
       $query=$db->query("
   SELECT month(created_at) as month ,sum(profit) as profit,
    CASE month(created_at)
        WHEN 1 THEN 'Janvier'
        WHEN 2 THEN 'Février'
        WHEN 3 THEN 'Mars'
        WHEN 4 THEN 'Avril'
        WHEN 5 THEN 'Mai'
        WHEN 6 THEN 'Juin'
        WHEN 7 THEN 'Juillet'
        WHEN 8 THEN 'Août'
        WHEN 9 THEN 'Septembre'
        WHEN 10 THEN 'Octobre'
        WHEN 11 THEN 'Novembre'
        WHEN 12 THEN 'Décembre'
        ELSE 'month_num'
    END as month
FROM operations_table
group by month(created_at)");
        $data = $query->getResultArray();
        return $data;

    }
}