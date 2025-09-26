<?php
    namespace App\Controllers;
 
use App\Models\Usuario;
use CodeIgniter\Controller;
 
    class usuarioController extends BaseController{
        public function verUsuarios(){
            $usuario = new Usuario();
            $datosBD['datosBD'] = $usuario->findAll();
            return view('menuUsuarios',$datosBD);
        }
 
        public function guardarUsuario(){
            $usuario_id = $this->request->getVar('txt_usuario_id');
            $nombre = $this->request->getVar('txt_nombre');
            $apellido = $this->request->getVar('txt_apellido');
            $correo = $this->request->getVar('txt_correo');
            $contrasena = $this->request->getVar('txt_contrasena');
            $rol_id = $this->request->getVar('txt_rol_id');
 
           $usuario = new Usuario();
            $datos=['usuario_id'=>$usuario_id,    
                    'nombre'=>$nombre,
                    'apellido'=>$apellido,
                    'correo'=>$correo,
                    'contrasena'=>$contrasena,
                    'rol_id'=>$rol_id
                    ];              
            $usuario->insert($datos);
            return $this->verUsuarios();
            }
 
        public function eliminarUsuario($id_usuario=null){
            $usuario = new Usuario();
            $usuario->delete($id_usuario);
            return $this->verUsuarios();
        }
 
        public function localizarUsuario($id_usuario=null){  
            $usuario = new Usuario();
            $datosUsuario['datosUsuario']=$usuario->where('usuario_id',$id_usuario)->first();
            return view('frm_actualizarUsuario',$datosUsuario);  
        }
        
        public function modificarUsuario(){
            $usuario_id = $this->request->getVar('txt_usuario_id');
            $nombre = $this->request->getVar('txt_nombre');
            $apellido = $this->request->getVar('txt_apellido');
            $correo = $this->request->getVar('txt_correo');
            $contrasena = $this->request->getVar('txt_contrasena');
            $rol_id = $this->request->getVar('txt_rol_id');
 
           $usuario = new Usuario();
            $datos=['usuario_id'=>$usuario_id,    
                    'nombre'=>$nombre,
                    'apellido'=>$apellido,
                    'correo'=>$correo,
                    'contrasena'=>$contrasena,
                    'rol_id'=>$rol_id
                    ];              
            $usuario->update($usuario_id,$datos);
            return $this->verUsuarios();
            }
    }