<?php
    namespace App\Models;
    use CodeIgniter\Model;
 
    class Usuario extends Model{
        protected $table = 'usuario';
        protected $primaryKey = 'usuario_id';
        protected $allowedFields = ['usuario_id','nombre','apellido', 'cantidad','correo_electronico','contrasena','direccion','telefono','rol_id'];
    }
?>