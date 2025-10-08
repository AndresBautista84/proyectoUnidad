<?php
require_once __DIR__ . '/../models/factura.php';
require('../vendor/fpdf/fpdf.php'); // Asegúrate de tener FPDF instalado

class FacturaController {

    public static function agregar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario_id = $_POST["usuario_id"];
            $producto_id = $_POST["producto_id"];
            $metodo_id = $_POST["metodo_id"] ?? 1; // Por defecto: 1 (ej. efectivo)
            $cantidad = $_POST["cantidad"];

            factura::agregarProducto($usuario_id, $producto_id, $metodo_id, $cantidad);

            header("Location: ../views/carrito.php?usuario_id=$usuario_id");
            exit;
        }
    }

    public static function confirmar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario_id = $_POST["usuario_id"];
            factura::confirmarCompra($usuario_id);
            header("Location: ../views/compra_exitosa.php");
            exit;
        }
         }

    public static function confirmar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario_id = $_POST["usuario_id"];
            factura::confirmarCompra($usuario_id);
            header("Location: ../views/compra_exitosa.php");
            exit;
        }
    }

    public function generarFactura($productos, $total, $usuario_id)
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Factura Urban Beat');
        $pdf->Ln(10);

        foreach ($productos as $p) {
            $pdf->Cell(0,10,"{$p['nombre']} x{$p['cantidad']} Q{$p['precio']}",0,1);
        }
        $pdf->Ln(10);
        $pdf->Cell(0,10,"Total: Q{$total}",0,1);

        $pdf->Output();
    }
}
?>