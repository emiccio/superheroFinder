<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HerosImport;
use Maatwebsite\Excel\HeadingRowImport;

class HerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seed()
    {
        Hero::truncate();

        $expectedHeaders  = ["id","name","fullname","strength","speed","durability","power","combat","race","height0","height1","weight0","weight1","eyecolor","haircolor","publisher"];

        $headingsFile = (new HeadingRowImport())->toArray(storage_path('superheros.csv'));

        if($expectedHeaders != $headingsFile[0][0]){
            return response()->json([
                "success" => false,
                "errors" => __('heros.invalidFormat'),
            ], 400);
        }
        
        Excel::import(new HerosImport, storage_path('superheros.csv'));

        return response()->json([
            "success" => true,
            "message" => __('heros.intialData')
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function searching(Request $hero)
    {
        $searchFields = $hero->all();
        try {
            //code...
            $superheros = Hero::where( function ($q) use ($searchFields) {
                                    foreach($searchFields as $key => $field) {
                                        $q->where($key, 'like', '%' .strtolower($field) . '%');
                                    } 
                                })
                                ->paginate(7);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "errors" => __('heros.invalidFields')
            ], 400);
        }

        return response()->json([
            "success" => true,
            "message" => __('heros.herosFound') . $superheros->count(),
            "data" => [ 'superheros' => $superheros ]
        ], 200);
    }

}
