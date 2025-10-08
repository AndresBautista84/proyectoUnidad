<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


//rutas para productos 
$routes->get('/productos', 'productoController::verProductos');
$routes->post('/guardarProducto', 'productoController::guardarProducto');   
$routes->get('/eliminarProducto/(:num)', 'productoController::eliminarProducto/$1');
$routes->get('/localizarProducto/(:num)', 'productoController::localizarProducto
/$1');
$routes->post('/modificarProducto', 'productoController::modificarProducto');

//rutas para facturas
$routes->get('/facturas', 'facturaController::verFacturas');
$routes->post('/guardarFactura', 'facturaController::guardarFactura');
$routes->get('/eliminarFactura/(:num)', 'facturaController::eliminarFactura/$1');
$routes->get('/localizarFactura/(:num)', 'facturaController::localizarFactura
/$1');
$routes->post('/modificarFactura', 'facturaController::modificarFactura');

//rutas para generos
$routes->get('/generos', 'generoController::verGeneros');
$routes->post('/guardarGenero', 'generoController::guardarGenero');
$routes->get('/eliminarGenero/(:num)', 'generoController::eliminarGenero/$1');
$routes->get('/localizarGenero/(:num)', 'generoController::localizarGenero
/$1');
$routes->post('/modificarGenero', 'generoController::modificarGenero');

//rutas para metodos
$routes->get('/metodos', 'metodoController::verMetodos');
$routes->post('/guardarMetodo', 'metodoController::guardarMetodo');
$routes->get('/eliminarMetodo/(:num)', 'metodoController::eliminarMetodo/$1');
$routes->get('/localizarMetodo/(:num)', 'metodoController::localizarMetodo
/$1');
$routes->post('/modificarMetodo', 'metodoController::modificarMetodo');

//rutas para roles
$routes->get('/roles', 'rolController::verRoles');
$routes->post('/guardarRol', 'rolController::guardarRol');
$routes->get('/eliminarRol/(:num)', 'rolController::eliminarRol/$1');
$routes->get('/localizarRol/(:num)', 'rolController::localizarRol
/$1');
$routes->post('/modificarRol', 'rolController::modificarRol');

//rutas para usuarios
$routes->get('/usuarios', 'usuarioController::verUsuarios');
$routes->post('/guardarUsuario', 'usuarioController::guardarUsuario');
$routes->get('/eliminarUsuario/(:num)', 'usuarioController::eliminarUsuario
/$1');
$routes->get('/localizarUsuario/(:num)', 'usuarioController::localizarUsuario
/$1');
$routes->post('/modificarUsuario', 'usuarioController::modificarUsuario');

//rutas para factura agregar
$routes->get('/detalleFactura/(:num)', 'facturaController::detalleFactura/$1');
