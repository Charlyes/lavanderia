<?php

namespace App\Http\Controllers;

use App\Models\Report;
// use Illuminate\Http\Request;
use Auth;
use GuzzleHttp;
// use App\Http\Controllers\DateTime;
use \DateTime;
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
            
                $response = 0;
                $valor_maximo_transacionado = $this->valor_maximo_transacionado();
                $quantidade_autorizada = $this->quantidade_autorizada();
                $gettransfer = $this->gettransfer();
                $transacao_efectivacao = $this->transacao_efectivacao();
                $numero_de_recusas = $this->numero_de_recusas();
                $bancos_mais_usados = $this->bancos_mais_usados();
                $bancos_menos_usados = $this->bancos_menos_usados();
                $total_transacionado = $this->volume_transacionado();
                $response = $this->numero_de_transacoes();
            $labels = $this->labels();
            $dado = $this->data();
    
            return view('pages.user.report', compact('response', 'labels', 'dado','total_transacionado', 'bancos_mais_usados', 'bancos_menos_usados', 'numero_de_recusas', 'transacao_efectivacao','gettransfer','quantidade_autorizada','valor_maximo_transacionado'));
        //    }else{
        //     return view('pages.admin.home');
        // }
    }

    public function numero_de_transacoes(){
        $token = env('TOKEN');
            $teste = Http::withHeaders([
                'accept' => 'application/json',
                'access_token' => $token
            ])->get('https://www.asaas.com/api/v3/transfers?')->json();
            $response=  $teste['totalCount'];
           
               return $response;
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
        $token = env('TOKEN');
            $teste = Http::withHeaders([
                'accept' => 'application/json',
                'access_token' => $token
            ])->get('https://www.asaas.com/api/v3/transfers?')->json();
            $datArray = $teste['data'];
        $ary =[];
        if($datArray == []){
            return $s = 0;
        }else{
                    foreach ($datArray as $key) {
                        
                        // $v= json_decode($key->status);
                        if($key->status == 'DONE'){
                            array_push($ary, $key->value);
                            $s = array_sum($ary);
                            
                        }
                        
                    }
                    return $s;
                }      
    }

    public function numero_de_recusas(){
        $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var =0;
        }else{
                    foreach ($datArray as $key) {
                        $total++;
                        if($key->failReason != null){
                            array_push($ary, $key->failReason);
                        }
                             }                        
                    $valor = array_count_values($ary);
                    $quantidade = array_sum($valor);
                    // foreach($valor as $item){
                    //         array_push($r, $item);
                    $value = ($quantidade/$total)*100;
                        return round($value, 1);
                    // }
                    // return array_sum($r);
        }
    }

    public function transferis(){
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

    public function bancos_mais_usados(){
        
        $total_transacionado = $this->volume_transacionado();

        $ary =[];
        $r = [];
        $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = [];
        }else{
                    foreach ($datArray as $key) {
                            array_push($ary, $key->type);
                             }                        
                    $valor = array_count_values($ary);
                    
                    $min = max($valor);
                    foreach($valor as $item){
                        
                            $a = array_search($min, $valor);
                            
                            $sum = array_sum($valor);
                        
                    }
                    $percent = (max($valor)/$sum)*100;
                    array_push($r, $a);
                    $percent = round($percent, 1);
                    array_push($r, $percent);
                    return $r;
                }
    }

    public function bancos_menos_usados(){
        $total_transacionado = $this->volume_transacionado();
        $ary =[];
        $r = [];
        $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = [];
        }else{
                    foreach ($datArray as $key) {
                            array_push($ary, $key->type);
                             }                        
                    $valor = array_count_values($ary);
                    
                    $min = min($valor);
                    foreach($valor as $item){
                        
                            $a = array_search($min, $valor);
                            
                            $sum = array_sum($valor);
                        
                    }
                    $percent = (min($valor)/$sum)*100;
                    array_push($r, $a);
                    $percent = round($percent, 1);
                    array_push($r, $percent);
                    return $r;
                }
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

    public function gettransfer(){
        $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = [];
        }else{
                    $ary = [];
                    foreach ($datArray as $key) {
                       $var= new DateTime($key->dateCreated);
                      $rt=$var->format('m');
                    $ary[$rt][] = ['Banco' => $key->type];
                        }

        $user = $this->getMonthData($ary);

        return response()->json($user);
                    }

    }

    public function quantidade_autorizada(){
        
                    $ary = [];
                    $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = [];
        }else{
                    foreach ($datArray as $key) {
                        if($key->authorized == true){
                       $var= new DateTime($key->dateCreated);
                      $rt=$var->format('m');
                    $ary[$rt][] = ['Banco' => $key->authorized];
                        }
                        }

        $user = $this->getMonthData($ary);

        return response()->json($user);
                    }

    }


    public function transfers_status(){
        $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = [];
        }else{
                    $ary = [];
                    foreach ($datArray as $key) {
                        
                        // $v= json_decode($key->status);
                         array_push($ary, $key->status);
                        
                    }
                    
                    return $ary;
                }
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

        public function transacao_efectivacao(){
           
        $semAtraso = 0;
        $contaAtraso = 0;
        $total = 0;
        $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = [];
        }else{
        foreach($datArray as $val){
            $total++;
            // dd($val->effectiveDate);
            if((strtotime($val->effectiveDate)- strtotime($val->scheduleDate))/86400 == 0){
                $semAtraso++;
            }else{
                $contaAtraso++;
            }
        }
        $pega_atraso = ($semAtraso/$total)*100;
        $atraso =round($pega_atraso);
        $pega_atrasado= ($contaAtraso/$total)*100;
        $atrasado =round($pega_atrasado);
        return ([$atraso, $atrasado]);
    }

        }

        public function valor_maximo_transacionado(){
            $token = env('TOKEN');
        $teste = Http::withHeaders([
            'accept' => 'application/json',
            'access_token' => $token
        ])->get('https://www.asaas.com/api/v3/transfers?')->json();
        $datArray = $teste['data'];
        $ary =[];
        $r = [];
        $total = 0;
        if($datArray == []){
            return $var = 0;
        }else{
            foreach ($datArray as $key) {
                array_push($ary, $key->value);
                            //  }                        
                    // $valor = array_count_values($ary);
                    
                    $max = max($ary);
                    return $max;
               
            }
        }
            }
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
