<?php

namespace App\Http\Controllers;

use App\Models\Fail;
use Illuminate\Http\Request;

class FailController extends Controller
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
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $fileModel = new Fail;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/zakat/' . $filePath;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function show(Fail $fail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function edit(Fail $fail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fail $fail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fail $fail)
    {
        //
    }
}
