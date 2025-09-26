<?php
    namespace App\Controllers;
 
use App\Models\Metodo;
use CodeIgniter\Controller;
 

    class metodoController extends BaseController{
        public function verMetodos(){
            $metodo = new Metodo();
            $datosBD['datosBD'] = $metodo->findAll();
            return view('menuMetodos',$datosBD);
        }
 
        public function guardarMetodo(){
            $metodo_id = $this->request->getVar('txt_metodo_id');
            $nombre = $this->request->getVar('txt_nombre');
 
           $metodo = new Metodo();
            $datos=['metodo_id'=>$metodo_id,    
                    'nombre'=>$nombre
                    ];              
            $metodo->insert($datos);
            return $this->verMetodos();
            }
 
        public function eliminarMetodo($id_metodo=null){
            $metodo = new Metodo();
            $metodo->delete($id_metodo);
            return $this->verMetodos();
        }
 

        public function localizarMetodo($id_metodo=null){  
            $metodo = new Metodo();
            $datosMetodo['datosMetodo']=$metodo->where('metodo_id',$id_metodo)->first();
            return view('frm_actualizarMetodo',$datosMetodo);  
        }
   
        public function modificarMetodo(){
            $metodo_id = $this->request->getVar('txt_metodo_id');
            $nombre = $this->request->getVar('txt_nombre');
 
           $metodo = new Metodo();
            $datos=['metodo_id'=>$metodo_id,    
                    'nombre'=>$nombre
                    ];              
            $metodo->update($metodo_id,$datos);
            return $this->verMetodos();
            }
    }