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
//     public function curlPost()
//     {
//   $data1 = [
//       'sub_domain' => 'value_1',
//   ];

//   $curl = curl_init();

//   curl_setopt_array($curl, array(
//       CURLOPT_URL => "https://www.asaas.com/api/v3/customers",
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => "",
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 30000,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => "POST",
//       CURLOPT_POSTFIELDS => json_encode($data1),
//       CURLOPT_HTTPHEADER => array(
//           // Set here required headers
//           "x-api-key: faf6182de3d6b455577053e405a3a97241f53e756aed99195d27987bd51ebc58",
//       ),
//   ));

//   $response = curl_exec($curl);
//   $err = curl_error($curl);

//   curl_close($curl);
//   return view('pages.user.report');

//   if ($err) {
//       echo "cURL Error #:" . $err;
//   } else {
//       print_r(json_decode($response));
//   }
// }

    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.report');
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

    public function testeLogin(){
//    try{4
    //     $token = "faf6182de3d6b455577053e405a3a97241f53e756aed99195d27987bd51ebc58";
    //     $client = new GuzzleHttp\Client(['base_uri' => 'https://www.asaas.com/api/'], ['verify' => false, 'debug' => true]);
    //     $headers = [
    //         'Authorization' => 'Bearer '.$token,        
    //         'accept'        => 'application/json',
    //         'Content-Type' => 'application/json',
    //     ];
        
    //     $response = $client->request('GET', 'v3/payments?',['debug' => true],  [
    //         'debug' => fopen('php://stderr', 'w'),
    //     ],
    //         [
    //         'headers' => $headers,
    //     ]);
    // } catch ( \GuzzleHttp\Exception\ClientException $exception ) {
    //     echo $exception->getResponse();
    // }
        // dd($response);

        // $response = $client->request('GET', '/api/v3/customers?', [
        //     'headers'=> [
        //         'Authorization' => 'key='.$token,
        //         'Content-Type' => 'application/json'
        // ]]);
        // dd($response->getHeader('content-type')[0]);
        // dd($res->getStatusCode());
        // $promise = $client->sendAsync($response);
        // $response = $client->send($response, ['timeout' => 60]);
        // $code = $response->getReasonPhrase();
        // dd($response); 
        // $response = $client->get();
        // $response = $client->request('GET', '/api/v3/customers?api_token='.$token);
        $response = Http::withHeaders([
            'accept' => 'application/json'
        ])->withToken('1ff9fbe92da3292a9d9e7ff26e4b8401067e77d55d9d035fc942a6f9350b2f62')->get('https://www.asaas.com/api/v3/customers?')->status();
        
        // $response->addHeader('Authorization', "1ff9fbe92da3292a9d9e7ff26e4b8401067e77d55d9d035fc942a6f9350b2f62");
        dd($response['servers']);
        
 
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
