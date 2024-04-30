<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF;

class InformeController extends Controller
{
    public function generarPDF(Request $request)
    {
        // Capturar la imagen del div
        $imagenBase64 = $request->input('imagen_base64');

        // Convertir la imagen de base64 a una imagen
        $imagen = base64_decode($imagenBase64);

        // Crear instancia de TCPDF
        $pdf = new TCPDF();

        // Establecer propiedades del documento
        $pdf->SetCreator('ADMIN');
        $pdf->SetAuthor('ADMIN');
        $pdf->SetTitle('Informe de Estadísticas - ECO JÁNDULA TEAM');
        $pdf->SetSubject('Your Subject');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Agregar una página
        $pdf->AddPage();

        // Agregar la imagen al PDF
        $pdf->Image('@' . $imagen, 10, 10, 100, 0, 'PNG');

        // Salida del PDF (puedes guardar, descargar, o enviar por correo electrónico)
        $pdf->Output('informe_estadisticas.pdf', 'D');
    }
}
