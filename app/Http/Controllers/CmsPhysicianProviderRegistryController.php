<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CmsPhysicianProviderRegistry;

class CmsPhysicianProviderRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('providersearch.index');

    }

    public function specialty($specialty){
        $providers = new CmsPhysicianProviderRegistry();
        dd($providers->getProvidersBySpecialty($specialty));

    }

    public function zip($zip){
        $providers = new CmsPhysicianProviderRegistry();
        $providers->getProvidersByZip($zip);
    }

    public function search(Request $request){
        $providers = new CmsPhysicianProviderRegistry();
        $results = $providers->getProvidersFiltered($request->all());

        return view('providersearch.providers', ['providers' => $results->toJson()]);
    }

    public function profile($npi){
        $providers = new CmsPhysicianProviderRegistry();
        $result = $providers->getProviderProfilebyNPI($npi);

        return view('providersearch.providerProfile', ['provider' => $result]);

    }

    public function getAffiliatedProviders($pecosid){
       $subquery = DB::table('cms_physician_provider_registry')->selectRaw('*')->selectRaw('NPI as providerNPI')->selectRaw('CONCAT_WS(" ",frst_nm,mid_nm,lst_nm,suff) AS full_name')->where('Org_PAC_ID', $pecosid);
        $query = DB::table( DB::raw("({$subquery->toSql()}) as a"))->mergeBindings($subquery);
        $query = $query->leftJoin('cms_physician_individual_mips_score','a.NPI','=','cms_physician_individual_mips_score.NPI');

        return $query->get();
    }

    public function getAffiliatedHospitals($hospital){
            $hospitalProviders = $this->getHospitalsUnion()
            ->having('hospitals', 'like', '%'.$hospital.'%')->get();
            return $hospitalProviders;

    }


    public function getSpecialties(){
        $specialties = DB::table('cms_physician_specialties')->pluck('specialty');
        return $specialties;
    }

    public function getHospitalsUnion(){

        $hospitals  = DB::table('cms_physician_provider_registry')->selectRaw('*')->selectRaw('CONCAT_WS(" ",frst_nm,mid_nm,lst_nm,suff) AS full_name')->selectRaw('CONCAT_WS(",",hosp_afl_ibn_1,hosp_afl_ibn_2,hosp_afl_ibn_3) AS hospitals');
        return $hospitals;
    }



    public function getHospitals(){

        $hospitals1 = DB::table('cms_physician_provider_registry')->select('hosp_afl_ibn_1 as hospitals')->whereNotNull('hosp_afl_ibn_1');
        $hospitals2 = DB::table('cms_physician_provider_registry')->select('hosp_afl_ibn_2')->whereNotNull('hosp_afl_ibn_2');
        $hospitals3 = DB::table('cms_physician_provider_registry')->select('hosp_afl_ibn_3')->whereNotNull('hosp_afl_ibn_3');


        $hospitals = $hospitals1->union($hospitals2)->union($hospitals3)->pluck('hospitals');
        return $hospitals;
    }

    public function getProviderFullNames(){
        //Get full provider names
        $providerFullName = DB::table('cms_physician_provider_registry')->select('id')->selectRaw('CONCAT_WS(" ",frst_nm,mid_nm,lst_nm,suff) AS full_name')->orderBy('id')->get();
        return $providerFullName;
    }


}
