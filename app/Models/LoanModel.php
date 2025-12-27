<?php
namespace App\Models;
use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table  ='loan_table';
    protected $primaryKey = 'loan_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['user_id','amount','code_country','status','created_at','deleted_at'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}