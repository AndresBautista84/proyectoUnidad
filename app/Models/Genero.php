<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Genero extends Model{
        protected $table = 'genero';
        protected $primaryKey = 'genero_id';
        protected $allowedFields = ['genero_id','nombre'];
    }
?>