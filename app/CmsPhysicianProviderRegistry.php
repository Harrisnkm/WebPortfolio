<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CmsPhysicianProviderRegistry extends Model
{


    //General Get Providers
    public function getProviders(){

        $providers = DB::table('cms_physician_provider_registry')->limit(5)->get();
        return $providers;
    }


    public function getProvidersFiltered($searchFilters){


        $subquery = DB::table('cms_physician_provider_registry')->selectRaw('*')->selectRaw('NPI as providerNPI')->selectRaw('CONCAT_WS(",",hosp_afl_ibn_1,hosp_afl_ibn_2,hosp_afl_ibn_3,hosp_afl_ibn_4) AS hospitals')->selectRaw('CONCAT(frst_nm," ",lst_nm) as full_name');

        $query = DB::table( DB::raw("({$subquery->toSql()}) as a"))->mergeBindings($subquery);

        //dynamically add queries based on search filters
        foreach($searchFilters as $filterKey => $filterValue){
            if($filterValue !== null){
                switch($filterKey) {
                    case 'provider_id':
                        $query = $this->getProvidersByID($query, $filterValue);
                        break;
                    case 'zip':
                        $query = $this->getProvidersByZip($query, $filterValue);
                        break;
                    case 'specialty':
                        $query = $this->getProvidersBySpecialty($query, $filterValue);
                        break;
                    case 'hospital':
                        $query = $this->getProvidersByHospital($query, $filterValue);
                        break;
                }
            }
        }

        $query = $query->leftJoin('cms_physician_individual_mips_score','a.NPI','=','cms_physician_individual_mips_score.NPI');

           return $query->get();

    }

    public function getProviderProfilebyNPI($npi){

        $subquery = DB::table('cms_physician_provider_registry')->selectRaw('*')->selectRaw('NPI as providerNPI')->selectRaw('Ind_PAC_ID as providerPECOS')->selectRaw('CONCAT_WS(",",hosp_afl_ibn_1,hosp_afl_ibn_2,hosp_afl_ibn_3,hosp_afl_ibn_4) AS hospitals')->selectRaw('CONCAT(frst_nm," ",lst_nm) as full_name')->where('NPI',$npi);

        $query = DB::table( DB::raw("({$subquery->toSql()}) as a"))->mergeBindings($subquery);


        $query = $query->leftJoin('cms_physician_individual_mips_score','a.NPI','=','cms_physician_individual_mips_score.NPI');


        $providerData =  $query->get();

        $specialtyProcedures = DB::table('cms_physician_clinicial_utilization')->where('NPI', $npi)->get();

       $result = collect(['providerData' => $providerData, 'specialtyProcedures' => $specialtyProcedures]);

       return $result;

    }


    //Get providers by zip code
    public function getProvidersByZip($query, $zip){
        $providersByZip = $query->where('zip', 'like', $zip.'%');
        return $providersByZip;
    }

    //Get providers by specialty
    public function getProvidersBySpecialty($query, $specialty){
        $providersBySpecialty = $query->where(function ($innerQuery) use ($specialty) {
            $innerQuery->where('Sec_spec_all', 'like', '%'.$specialty.'%')
                    ->orWhere('Pri_spec', $specialty);
            });
        return $providersBySpecialty;
    }

    public function getProvidersByHospital($query, $hospital){
        $providersByHospital = $query->where('hospitals', 'like', '%'.$hospital.'%');
            return $providersByHospital;
    }

    public function getProvidersByID($query, $id){
        $providerByID = $query->where('id', $id);
            return $providerByID;

    }


}
