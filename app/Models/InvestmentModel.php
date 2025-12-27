<?php
namespace App\Models;
use CodeIgniter\Model;

class InvestmentModel extends Model
{
    protected $table  ='investments_table';
    protected $primaryKey = 'investment_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['user_id','amount','code_country','status','pattern','created_at','deleted_at'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}