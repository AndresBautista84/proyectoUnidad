<?php
    namespace App\Controllers;
 
use App\Models\Rol;
use CodeIgniter\Controller;
 
    class rolController extends BaseController{
        public function verRoles(){
            $rol = new Rol();
            $datosBD['datosBD'] = $rol->findAll();
            return view('menuRoles',$datosBD);
        }
 
        public function guardarRol(){
            $rol_id = $this->request->getVar('txt_rol_id');
            $nombre = $this->request->getVar('txt_nombre');
 
           $rol = new Rol();
            $datos=['rol_id'=>$rol_id,    
                    'nombre'=>$nombre
                    ];              
            $rol->insert($datos);
            return $this->verRoles();
            }

        public function eliminarRol($id_rol=null){
            $rol = new Rol();
            $rol->delete($id_rol);
            return $this->verRoles();
        }
 
        public function localizarRol($id_rol=null){  
            $rol = new Rol();
            $datosRol['datosRol']=$rol->where('rol_id',$id_rol)->first();
            return view('frm_actualizarRol',$datosRol);  
        }
   
        public function modificarRol(){
            $rol_id = $this->request->getVar('txt_rol_id');
            $nombre = $this->request->getVar('txt_nombre');
 
           $rol = new Rol();
            $datos=['rol_id'=>$rol_id,    
                    'nombre'=>$nombre
                    ];              
            $rol->update($rol_id,$datos);
            return $this->verRoles();
            }
    }