<?php

namespace App\Http\Controllers;

use App\Models\PenerimaZakat;
use Illuminate\Http\Request;

class PenerimaZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimazakats = PenerimaZakat::all();
        return view('penerimazakat.index',[
            'penerimazakats'=> $penerimazakats
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerimazakat.create');
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
           
            'user_id'  => 'required',
            'alamat'=> 'required', 
            'jenis_bantuan'=> 'required',
            'status'=> 'required',
            'pendapatan'=> 'required',
            'barang_keperluan'=> 'required',
        ]);
 
        $penerimazakat = new PenerimaZakat;
        $penerimazakat ->user_id= $request->user_id;
        $penerimazakat ->alamat= $request->alamat;
        $penerimazakat ->jenis_bantuan= $request->jenis_bantuan;
        $penerimazakat ->status= $request->status;
        $penerimazakat ->pendapatan= $request->pendapatan;
        $penerimazakat ->barang_keperluan= $request->barang_keperluan;
        
        
        $penerimazakat->save(); 
        return redirect('/penerimazakats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenerimaZakat  $penerimaZakat
     * @return \Illuminate\Http\Response
     */
    public function show(PenerimaZakat $penerimaZakat)
    {
        return view('penerimazakat.show', [
            'penerimazakat'=> $penerimazakat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenerimaZakat  $penerimaZakat
     * @return \Illuminate\Http\Response
     */
    public function edit(PenerimaZakat $penerimaZakat)
    {
        return view('penerimazakat.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenerimaZakat  $penerimaZakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenerimaZakat $penerimaZakat)
    {
        $penerimazakat ->user_id= $request->user_id;
        $penerimazakat ->alamat= $request->alamat;
        $penerimazakat ->jenis_bantuan= $request->jenis_bantuan;
        $penerimazakat ->status= $request->status;
        $penerimazakat ->pendapatan= $request->pendapatan;
        $penerimazakat ->barang_keperluan= $request->barang_keperluan;
        $penerimazakat->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenerimaZakat  $penerimaZakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenerimaZakat $penerimaZakat)
    {
        //
    }
}
