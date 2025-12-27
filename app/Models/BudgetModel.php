<?php
namespace App\Models;
use CodeIgniter\Model;

class BudgetModel extends Model
{
    protected $table  ='budgets_table';
    protected $primaryKey = 'budget_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id','budget_ga','budget_sn'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}