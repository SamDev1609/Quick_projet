<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table  ='customer_table';
    protected $primaryKey = 'tel_customer';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tel_customer','name','user_id','created_at'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}