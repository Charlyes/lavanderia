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
            $nova = 'yes';
            $token = env('TOKEN');
            $teste = Http::withHeaders([
                'accept' => 'application/json',
                'access_token' => $token
            ])->get('https://www.asaas.com/api/v3/transfers?');
            // foreach($response as $item){
            //     $var = $item->totalCount;
            //   }
            $ler=json_decode($teste);
                $response= $ler->totalCount;

            // $status = $this->transfers_status();
    
            return view('pages.user.report', compact('response'));
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

    // public function transfers(){

    //     $token = env('TOKEN');
    //     $response = Http::withHeaders([
    //         'accept' => 'application/json',
    //         'access_token' => $token
            
    //     ])->get('https://www.asaas.com/api/v3/customers?');
    //     // $response=$response['totalCount'];
    //     dd(json_decode($response));
    //     }

        public function transfers(){
            $json_str = '{"empregados": '.
                '[{"nome":"Jason Jones", "idade":38, "sexo": "M", "dependentes": ["Sedna Jones", "Ian Jones"]},'.
                '{"nome":"Ada Pascalina", "idade":35, "sexo": "F"},'.
                '{"nome":"Delphino da Silva", "idade":26, "sexo": "M"}'.
                '],
                "data": "15/12/2012"}';
    $novo = '{
        "object": "list",
        "hasMore": false,
        "totalCount": 2,
        "limit": 10,
        "offset": 0,
        "data": [
            {
                "object": "transfer",
                "id": "777eb7c8-b1a2-4356-8fd8-a1b0644b5282",
                "dateCreated": "2019-05-02",
                "status": "PENDING",
                "effectiveDate": null,
                "type": "BANK_ACCOUNT",
                "value": 1000,
                "netValue": 1000,
                "transferFee": 0,
                "scheduleDate": "2019-05-02",
                "authorized": true,
                "failReason": null,
                "bankAccount": {
                    "bank": {
                        "code": "001",
                        "name": "Banco do Brasil"
                    },
                    "accountName": "Conta Banco do Brasil",
                    "ownerName": "Marcelo Almeida",
                    "cpfCnpj": "52233424611",
                    "agency": "1263",
                    "agencyDigit": "3",
                    "account": "9999991",
                    "accountDigit": "1"
                },
                "transactionReceiptUrl": null
            },
            {
                "object": "transfer",
                "id": "9e7d8639-350f-45c0-8bc3-d4ddc5f4ebac",
                "dateCreated": "2019-05-02",
                "status": "DONE",
                "effectiveDate": "2019-05-02",
                "type": "ASAAS_ACCOUNT",
                "value": 1000,
                "transferFee": 0,
                "scheduleDate": "2019-05-02",
                "authorized": true,
                "failReason": null,
                "walletId": "0021c712-d963-4d86-a59d-031e7ac51a2e",
                "account": {
                    "name": "João Almeida",
                    "cpfCnpj": "45234767051"
                    "agency": "0001",
                    "account": "2087",
                    "accountDigit": "2"
                },
                "transactionReceiptUrl": "https://www.asaas.com/comprovantes/8595088807941204"
            }
        ]
    }';
            $token = env('TOKEN');
            $teste = Http::withHeaders([
                'accept' => 'application/json',
                'access_token' => $token
                
            ])->get('https://www.asaas.com/api/v3/transfers?')->json();
            // if(empty($response['data'])==true){
            //     $response='0';
            //     return $response;

            // }
            // else{
                // $response =$novo["data"];
                // $response = json_decode($novo);
                // $response = json_decode($novo);
                // $response = $ler->data;
                dd($novo);
            // }
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
