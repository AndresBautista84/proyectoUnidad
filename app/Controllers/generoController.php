<?php
    namespace App\Controllers;
 
use App\Models\Genero;
use CodeIgniter\Controller;
 

    class generoController extends BaseController{
        public function verGeneros(){
            $genero = new Genero();
            $datosBD['datosBD'] = $genero->findAll();
            return view('menuGeneros',$datosBD);
        }
 
        public function guardarGenero(){
            $genero_id = $this->request->getVar('txt_genero_id');
            $nombre = $this->request->getVar('txt_nombre');
 
           $genero = new Genero();
            $datos=['genero_id'=>$genero_id,    
                    'nombre'=>$nombre
                    ];              
            $genero->insert($datos);
            return $this->verGeneros();
            }
 
        public function eliminarGenero($id_genero=null){
            $genero = new Genero();
            $genero->delete($id_genero);
            return $this->verGeneros();
        }
 
        public function localizarGenero($id_genero=null){  
            $genero = new Genero();
            $datosGenero['datosGenero']=$genero->where('genero_id',$id_genero)->first();
            return view('frm_actualizarGenero',$datosGenero);  
        }
   
        Public function modificarGenero(){
            $genero_id = $this->request->getVar('txt_genero_id');
            $nombre = $this->request->getVar('txt_nombre');
 
           $genero = new Genero();
            $datos=['genero_id'=>$genero_id,    
                    'nombre'=>$nombre
                    ];              
            $genero->update($genero_id,$datos);
            return $this->verGeneros();
            }
    }