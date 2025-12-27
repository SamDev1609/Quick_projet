<?php
namespace App\Models;
use CodeIgniter\Model;

class SupplyModel extends Model
{
    protected $table  ='supply_table';
    protected $primaryKey = 'supply_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id','amount','profit','customer_code'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}