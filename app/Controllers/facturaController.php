<?php
    namespace App\Controllers;
 
use App\Models\Factura;
use CodeIgniter\Controller;
 
    class facturaController extends BaseController{
        public function verFacturas(){
            $factura = new Factura();
            $datosBD['datosBD'] = $factura->findAll();
            return view('menuFacturas',$datosBD);
        }
 
    public function guardarFactura(){
            $factura_id = $this->request->getVar('txt_factura_id');
            $fecha = $this->request->getVar('txt_fecha');
            $estado = $this->request->getVar('txt_estado');
            $cantidad = $this->request->getVar('txt_cantidad');
            $usuario_id = $this->request->getVar('txt_usuario_id');
            $producto_id = $this->request->getVar('txt_producto_id');
            $metodo_id = $this->request->getVar('txt_metodo_id');
 
           $factura = new Factura();
            $datos=['factura_id'=>$factura_id,    
                    'fecha'=>$fecha,
                    'estado'=>$estado,
                    'cantidad'=>$cantidad,
                    'usuario_id'=>$usuario_id,
                    'producto_id'=>$producto_id,
                    'metodo_id'=>$metodo_id
                    ];              
            $factura->insert($datos);
            return $this->verFacturas();
            }

        public function eliminarFactura($id_factura=null){
            $factura = new Factura();
            $factura->delete($id_factura);
            return $this->verFacturas();
        }
 
        public function localizarFactura($id_factura=null){  
            $factura = new Factura();
            $datosFactura['datosFactura']=$factura->where('factura_id',$id_factura)->first();
            return view('frm_actualizarFactura',$datosFactura);  
        }
   
        public function modificarFactura(){
            $factura_id = $this->request->getVar('txt_factura_id');
            $fecha = $this->request->getVar('txt_fecha');
            $estado = $this->request->getVar('txt_estado');
            $cantidad = $this->request->getVar('txt_cantidad');
            $usuario_id = $this->request->getVar('txt_usuario_id');
            $producto_id = $this->request->getVar('txt_producto_id');
            $metodo_id = $this->request->getVar('txt_metodo_id');
 
           $factura = new Factura();
            $datos=['factura_id'=>$factura_id,    
                    'fecha'=>$fecha,
                    'estado'=>$estado,
                    'cantidad'=>$cantidad,
                    'usuario_id'=>$usuario_id,
                    'producto_id'=>$producto_id,
                    'metodo_id'=>$metodo_id
                    ];              
            $factura->update($factura_id,$datos);
            return $this->verFacturas();
            }
    }