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
        return $providers->getProvidersBySpecialty($specialty);

    }

    public function zip($zip){
        $providers = new CmsPhysicianProviderRegistry();
        return $providers->getProvidersByZip($zip);
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
        $providers = new CmsPhysicianProviderRegistry();
        return $providers->getAffiliatedProviders($pecosid);

    }

    public function getAffiliatedHospitals($hospital){
        $hospitalProviders = new CmsPhysicianProviderRegistry();
        return $hospitalProviders->getAffiliatedHospitals($hospital);


    }


    public function getSpecialties(){
        $specialties = new CmsPhysicianProviderRegistry();
        return $specialties->getSpecialties();

    }


    public function getHospitals(){
        $hospitals = new CmsPhysicianProviderRegistry();
        return $hospitals->getHospitals();

    }

    public function getProviderFullNames(){
        $providerFullName = new CmsPhysicianProviderRegistry();
        return $providerFullName->getProviderFullNames();
    }


}
