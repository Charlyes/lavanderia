<?php

namespace App\Http\Controllers;

use App\Models\Report;
// use Illuminate\Http\Request;
use Auth;
use GuzzleHttp;
// use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise;
use GuzzleHttp\RequestOptions;





class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        // $user = Auth::user();

        // if ($user->isAdmin()) {
            // $nova = 'yes';
            // $token = env('TOKEN');
            // $teste = Http::withHeaders([
            //     'accept' => 'application/json',
            //     'access_token' => $token
            // ])->get('https://www.asaas.com/api/v3/transfers?');
            // foreach($response as $item){
            //     $var = $item->totalCount;
            //   }
            // $ler=json_decode($teste);
            //     $response= $ler->totalCount;
                $response = 0;

            $total_transacionado = $this->volume_transacionado();
            $labels = $this->labels();
            $dado = $this->data();
    
            return view('pages.user.report', compact('response', 'labels', 'dado','total_transacionado'));
        //    }else{
        //     return view('pages.admin.home');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function volume_transacionado(){
        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
        $datArray = $json_file->data;
        $ary =[];
                    foreach ($datArray as $key) {
                        
                        // $v= json_decode($key->status);
                        if($key->status == 'DONE'){
                            array_push($ary, $key->value);
                            $s = array_sum($ary);
                            
                        }
                        
                    }
                    return $s;
    }

    public function transfers(){
        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
        $datArray = $json_file->data;
        $ary =[];
                    foreach ($datArray as $key) {
                        
                        // $v= json_decode($key->status);
                        
                            array_push($ary, $key->type);
                            
                    }                        
                    $valor = array_count_values($ary);
                    $m = array_search(max($valor), $valor);
                    dd($valor);
    }

    public function transfers_status(){
        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
                    // $token = env('TOKEN');
                    // $teste = Http::withHeaders([
                    //     'accept' => 'application/json',
                    //     'access_token' => $token
                        
                    // ])->get('https://www.asaas.com/api/v3/transfers?')->json();
                    $datArray = $json_file->data;
                    $ary = [];
                    foreach ($datArray as $key) {
                        
                        // $v= json_decode($key->status);
                         array_push($ary, $key->status);
                        
                    }
                    
                    return $ary;

    //     $token = env('TOKEN');
    //     $response = Http::withHeaders([
    //         'accept' => 'application/json',
    //         'access_token' => $token
            
    //     ])->get('https://www.asaas.com/api/v3/customers?');
    //     // $response=$response['totalCount'];
    //     dd(json_decode($response));
        }

        public function labels(){
            $status = $this->transfers_status();
            $conta= array_count_values($status);                
                return array_keys((array) $conta);
        }

        public function data(){
            $status = $this->transfers_status();
            $conta= array_count_values($status);                
                return array_values((array) $conta);
            
        }

//         public function transfers(){
//             $string = file_get_contents("assets/json/local.json");   
// $json_file = json_decode($string);
//             $token = env('TOKEN');
//             $teste = Http::withHeaders([
//                 'accept' => 'application/json',
//                 'access_token' => $token
                
//             ])->get('https://www.asaas.com/api/v3/transfers?')->json();
//             $datArray = $json_file->data;
//             $ary = [];
//             foreach ($datArray as $key) {
                
//                 // $v= json_decode($key->status);
//                  array_push($ary, $key->status);
                
//             }
//             dd($ary);
//             $delta = $ary;
            

            // if(empty($response['data'])==true){
            //     $response='0';
            //     return $response;

            // }
            // else{
                // $response =$novo["data"];
                // $response = json_decode($novo);
                // $response = json_decode($novo);
                // $response = $ler->data;
                // dd($novo);
            // }
            // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
