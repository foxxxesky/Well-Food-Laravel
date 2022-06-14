<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view('home', ['pages' => 'Home']);
    }

    public function fetch_highprotein()
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => env('X_RapidAPI_Key'),
            'X-RapidAPI-Host' => env('X_RapidAPI_Host'),
        ])->get('https://edamam-recipe-search.p.rapidapi.com/search?q=High-Protein');
 
        return json_decode($response->body());
        // $datas = $response['hits'];
        
        // return view('welcome', compact('datas'));
    }
    
    public function fetch_lowcarb()
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => env('X_RapidAPI_Key'),
            'X-RapidAPI-Host' => env('X_RapidAPI_Host'),
        ])->get('https://edamam-recipe-search.p.rapidapi.com/search?q=Low-Carb');

        $datas = $response['hits'];
 
        // return json_decode($response->body());
        return view('welcome', compact('datas'));
    }

    public function test()
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => env('X_RapidAPI_Key'),
            'X-RapidAPI-Host' => env('X_RapidAPI_Host'),
        ])->get('https://edamam-recipe-search.p.rapidapi.com/search?q=Low-Carb')->json();
        
        // foreach ($response as $index => $data) {
        //     dd($data);
        // }

        // dd($response['hits'][0]['recipe']['label']);
        // dd($response['hits']);

        $datas = $response['hits'];
        // dd($data);
        
        return view('welcome', compact('datas'));
    }
}