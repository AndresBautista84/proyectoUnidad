<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Factura extends Model{
        protected $table = 'factura';
        protected $primaryKey = 'factura_id';
        protected $allowedFields = ['factura_id','fecha','estado', 'cantidad','usuario_id','producto_id','metodo_id'];
    }
?>