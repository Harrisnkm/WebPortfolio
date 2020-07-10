<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\PdfExport;

class PdfExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = new pdfExport();

        return view('pdfexport.index');

    }

    public function exportPdf(Request $request, $formName)
    {

        $pdfexport = new PdfExport();

      //create FDF file from user input
        $fdf_file_content = $pdfexport->generateFdfFile($request);


        Storage::disk('local')->put('file.fdf', $fdf_file_content);

        $out_file = uniqid().".pdf";

        $fdffile_dir = env("FDFFILE_DIR", "default");

        passthru("pdftk ".$formName.".pdf fill_form ".$fdffile_dir." output -");

    }

    public function addUser(Request $request){

        $pdfexport = new PdfExport();
        $userId = $pdfexport->addUser($request);

    }

    public function getUsers(){

        $users = new PdfExport();
        return $users->getUsers();

    }

}
