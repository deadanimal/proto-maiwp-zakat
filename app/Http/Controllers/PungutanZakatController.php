<?php

namespace App\Http\Controllers;

use App\Models\PungutanZakat;
use Illuminate\Http\Request;

class PungutanZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pungutanzakats = PungutanZakat::all();
        return view('pungutanzakat.index',[
            'pungutanzakats'=> $pungutanzakats
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pungutanzakat.create');
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
           
            'pegawai_id'  => 'required',
            'jumlah'=> 'required', 
            'tarikh'=> 'required',
            'jenis_pungutan'=> 'required',
        ]);
 
        $pungutanzakat = new PungutanZakat;
        $pungutanzakat ->pegawai_id= $request->pegawai_id;
        $pungutanzakat ->jumlah= $request->jumlah;
        $pungutanzakat ->tarikh= $request->tarikh;
        $pungutanzakat ->jenis_pungutan= $request->jenis_pungutan;
        
        $pungutanzakat->save(); 
        return redirect('/pungutanzakats'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PungutanZakat  $pungutanZakat
     * @return \Illuminate\Http\Response
     */
    public function show(PungutanZakat $pungutanZakat)
    {
        return view('pungutanzakat.show', [
            'pungutanzakat'=> $pungutanzakat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PungutanZakat  $pungutanZakat
     * @return \Illuminate\Http\Response
     */
    public function edit(PungutanZakat $pungutanZakat)
    {
        return view('pungutanzakat.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PungutanZakat  $pungutanZakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PungutanZakat $pungutanZakat)
    {
        $pungutanzakat ->pegawai_id= $request->pegawai_id;
        $pungutanzakat ->jumlah= $request->jumlah;
        $pungutanzakat ->tarikh= $request->tarikh;
        $pungutanzakat ->jenis_pungutan= $request->jenis_pungutan;
        $pungutanzakat->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PungutanZakat  $pungutanZakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PungutanZakat $pungutanZakat)
    {
        //
    }
}
