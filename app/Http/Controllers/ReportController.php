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
    public function total(){
        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
        $datArray = $json_file->data;
        $ary =[];
        $r = [];
                    foreach ($datArray as $key) {
                            array_push($ary, $key->type);
                             }                        
                    $valor = array_count_values($ary);
                    foreach($valor as $item){
                            array_push($r, $item);
                        
                    }
                    return array_sum($r);
    }

    public function transfers(){
        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
        $datArray = $json_file->data;
        $ary =[];
        $r = [];
        $numeros = [];
        $percent = [];
                    foreach ($datArray as $key) {
                            array_push($ary, $key->type);
                             }                        
                    $valor = array_count_values($ary);
                    
                    $max = max($valor);
                    
                            array_search(max($valor), $valor);
                            dd($max);
                    $total = $this->total();
                    $soma =array_sum($numeros);
                    
                        $percentagem = ($soma/$total)*100;
                        array_push($percent, $percentagem);
                    
                    
                    // return $r;
    }

    public function bancos_menos_usados(){
        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
        $datArray = $json_file->data;
        $ary =[];
        $r = [];
                    foreach ($datArray as $key) {
                            array_push($ary, $key->type);
                             }                        
                    $valor = array_count_values($ary);
                    $max = min($valor);
                    foreach($valor as $item){
                        if($item == $max){
                            $a = array_search($item, $valor);
                            array_push($r, $a);
                        }
                    }

                    return $r;
    }

    private function getMonthData($id){
        $Arraycount = [];
        $ArrayArr = [];

        foreach ($id as $key => $value) {
            $Arraycount[(int) $key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($Arraycount[$i])) {
                $ArrayArr[$i] = $Arraycount[$i];
            } else {
                $ArrayArr[$i] = 0;
            }
        }

        $data = array_values($ArrayArr);

        return $data;
    }

    public function transferrs($id){
        // $memberByMonth = Member::select('created_at')
        //                 ->whereYear('created_at', $id)
        //                 ->select('created_at')
        //                 ->get()
        //                 ->groupBy(function ($date) {
        //                     return Carbon::parse($date->created_at)->format('m');
        //                 });
                        $string = file_get_contents("assets/json/local.json");   
        $json_file = json_decode($string);
                    $datArray = $json_file->data;
                    $ary = [];
                    foreach ($datArray as $key) {
                        
                        // $v= json_decode($key->status);
                         array_push($ary, $key->dateCreated);
                        
                    }

        $user = $this->getMonthData($ary);

        dd($user);

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
