<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Producto extends Model{
        protected $table = 'producto';
        protected $primaryKey = 'producto_id';
        protected $allowedFields = ['producto_id','nombre','descripcion', 'precio','stock','talla','color','genero_id'];
        
        public static function buscarPorId($id) {
            $mysqli = new mysql("localhost", "root", "", "urbanbeat");
            if ($mysqli->connect_errno) return null;
    
            $query = $mysqli->prepare("SELECT id, nombre, precio, talla, color FROM productos WHERE id = ?");
            $query->bind_param("i", $id);
            $query->execute();
            $result = $query->get_result();
            $producto = $result->fetch_assoc();
            $query->close();
            $mysqli->close();
            return $producto;
        }
    }
?>