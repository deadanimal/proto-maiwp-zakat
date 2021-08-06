<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::all();

        // $data_basir = Merchant::all();

        return view('merchant.index',[
            'merchants'=> $merchants,
            // 'data_basir'=> $data_basir,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'merchant_id'  => 'required',
            'user_id'=> 'required',
            'merchant_name'=> 'required', 
            'lokasi'=> 'required',
            'kuantiti'=> 'required',
            'jumlah'=> 'required',
            'status'=> 'required',
        ]);
 
        $merchant = new Merchant;
        $merchant ->merchant_id= $request->merchant_id;
        $merchant ->user_id= $request->user_id;
        $merchant ->merchant_name= $request->merchant_name;
        $merchant ->lokasi= $request->lokasi;
        $merchant ->kuantiti= $request->kuantiti;
        $merchant ->jumlah= $request->jumlah;
        $merchant ->status= $request->status;
        

        $merchant->save(); 
        return redirect('/merchants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {     
        
        return view('merchant.show', [
            'merchant'=> $merchant,
            // 'data_basir'=> $data_basir,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        return view('merchant.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant)
    {
        $merchant ->merchant_id= $request->merchant_id;
        $merchant ->user_id= $request->user_id;
        $merchant ->merchant_name= $request->merchant_name;
        $merchant ->lokasi= $request->lokasi;
        $merchant ->kuantiti= $request->kuantiti;
        $merchant ->jumlah= $request->jumlah;
        $merchant ->status= $request->status;
        
        $merchant->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
