<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     * 
     * 
     * 
     */
    public function posts()
    {
        $data = $request->all();
        $cliente = Client::create([
            'name'             => $data['name'],
            'email'              => $data['email'],
            'company'             => $data['company'],
            'phone'                => $data['phone'],
            'mobilePhone'                 => isset($data['mobilePhone']) ? $data['mobilePhone'] : 0,
            'address'               => $data['address'],
            'addressNumber'               => $data['addressNumber'],
            'complement'            => $data['complement'],
            'province'              => $data['province'],
            'postalCode'            => $data['postalCode'],
            'cpfCnpj'       =>  $data['cpfCnpj'],
            'personType'         => isset($data['personType']) ? $data['personType'] : 0,
            'additionalEmails'         => isset($data['additionalEmails']) ? $data['additionalEmails'] : 0,
            'externalReference'               => $data['externalReference'],
            'observations'               => isset($data['observations']) ? $data['observations'] : 0,
            'city'              => isset($data['city']) ? $data['city'] : 0,
            'state'            => $data['state'],
            'country'  => isset($data['country']) ? $data['country'] : null,
            'foreignCustomer'               => $data['foreignCustomer'],    //FIXME: adding the first user on the
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
