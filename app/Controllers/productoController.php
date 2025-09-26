<?php
    namespace App\Controllers;
 
use App\Models\Producto;
use CodeIgniter\Controller;
 
    class productoController extends BaseController{
        public function verProductos(){
            $producto = new Producto();
            $datosBD['datosBD'] = $producto->findAll();
            return view('menuProductos',$datosBD);
        }
 
        public function guardarProducto(){
            $producto_id = $this->request->getVar('txt_producto_id');
            $nombre = $this->request->getVar('txt_nombre');
            $descripcion = $this->request->getVar('txt_descripcion');
            $precio = $this->request->getVar('txt_precio');
            $stock = $this->request->getVar('txt_stock');
            $talla = $this->request->getVar('txt_talla');
            $color = $this->request->getVar('txt_color');
            $genero_id = $this->request->getVar('txt_genero_id');
 
           $producto = new Producto();
            $datos=['producto_id'=>$producto_id,    
                    'nombre'=>$nombre,
                    'descripcion'=>$descripcion,
                    'precio'=>$precio,
                    'stock'=>$stock,
                    'talla'=>$talla,
                    'color'=>$color,
                    'genero_id'=>$genero_id
                    ];              
            $producto->insert($datos);
            return $this->verProductos();
            }

        public function eliminarProducto($id_producto=null){
            $producto = new Producto();
            $producto->delete($id_producto);
            return $this->verProductos();
        }
 
        public function localizarProducto($id_producto=null){  
            $producto = new Producto();
            $datosProducto['datosProducto']=$producto->where('producto_id',$id_producto)->first();
            return view('frm_actualizarProducto',$datosProducto);  
        }
   
        public function modificarProducto(){
            $producto_id = $this->request->getVar('txt_producto_id');
            $nombre = $this->request->getVar('txt_nombre');
            $descripcion = $this->request->getVar('txt_descripcion');
            $precio = $this->request->getVar('txt_precio');
            $stock = $this->request->getVar('txt_stock');
            $talla = $this->request->getVar('txt_talla');
            $color = $this->request->getVar('txt_color');
            $genero_id = $this->request->getVar('txt_genero_id');
 
           $producto = new Producto();
            $datos=['producto_id'=>$producto_id,    
                    'nombre'=>$nombre,
                    'descripcion'=>$descripcion,
                    'precio'=>$precio,
                    'stock'=>$stock,
                    'talla'=>$talla,
                    'color'=>$color,
                    'genero_id'=>$genero_id
                    ];              
            $producto->update($producto_id,$datos);
            return $this->verProductos();
            }
    }