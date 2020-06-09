<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PdfExport extends Model
{
    // FDF header section
     public $fdf_header = <<<FDF
    %FDF-1.2
    %,,oe"
    1 0 obj
    <<
    /FDF << /Fields [
FDF;

    // FDF footer section
     public $fdf_footer = <<<FDF
    ] >> >>
    endobj
    trailer
    <</Root 1 0 R>>
    %%EOF;
FDF;


     public function generateFdfFile($formValues){

         $content ='';

         if($formValues->all()){
             foreach($formValues->all() as $key=> $value) {
                 $content .= "<</T(" .$key. ")/V(".$value.")>>";
             }

             $fdf_file_content = $this->fdf_header.$content.$this->fdf_footer;
         }
            return $fdf_file_content;
     }

    public function addUser($newUserFullName){

                $user = DB::table('pdfexport_users')->insertGetId(
                    $newUserFullName->all()
                );
                return $user;

        }

     public function getUsers(){
         $users = DB::table('pdfexport_users')->get();
         return $users;
     }


}
