<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Rol extends Model{
        protected $table = 'rol';
        protected $primaryKey = 'rol_id';
        protected $allowedFields = ['rol_id','nombre'];
    }
?>