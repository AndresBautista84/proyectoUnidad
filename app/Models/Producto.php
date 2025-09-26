<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Producto extends Model{
        protected $table = 'producto';
        protected $primaryKey = 'producto_id';
        protected $allowedFields = ['producto_id','nombre','descripcion', 'precio','stock','talla','color','genero_id'];
    }
?>