<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Auth;
use GuzzleHttp;
use Illuminate\Support\Facades\Http;


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

        // $response = Http::get('http://ik.actecn.com/public/api/logistica');
        // $response =Http::accept('application/json')->withToken('faf6182de3d6b455577053e405a3a97241f53e756aed99195d27987bd51ebc58')->get('https://www.asaas.com/api/v3/customers');
        // $response = $response->getBody()->getContents();
        
        

        //Resultado
      

        // $response = $response->getBody()->getContents();
        // $novo = json_decode($responsive);
        // $json = file_get_contents('php://temp'); 
        // $arr = json_decode($json);
        //Previsao da resposta
        // dd($response);
        
        $token = "faf6182de3d6b455577053e405a3a97241f53e756aed99195d27987bd51ebc58";
        $client = new GuzzleHttp\Client(['base_uri' => 'https://www.asaas.com/api/v3/customers']);
        // $headers = [
        //     'Authorization' => 'Bearer ' . $token,        
        //     'Accept'        => 'application/json',
        // ];
        // $response = $client->request('GET', 'customers?', [
        //     'headers' => $headers
        // ]);
        // $json = file_get_contents('php://temp');
        // $arr = json_decode($json);
        $response = $client->request('GET', '/customers?api_token='.$token);
            // $response =  $response->getBody();
            // $response = json_decode($response);
            //  $novo = json_decode($response);
        // $json = file_get_contents('php://temp'); 
        // $response = $this->json('GET', 'https://www.asaas.com/api/v3/customers', [
        //     'headers' => [
        //         'Authorization' => 'Bearer '. $token,
        //         'Accept' => 'application/json'
        //     ]
        // ]);

        // var_dump($response->getBody()->getContents());
        // dd($json);

            
        // dd($response->getStatusCode());
        dd($response->getResponse());
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
