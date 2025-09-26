<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Metodo extends Model{
        protected $table = 'metodo';
        protected $primaryKey = 'metodo_id';
        protected $allowedFields = ['metodo_id','nombre'];
    }
?>