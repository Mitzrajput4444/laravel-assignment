<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ResourceForVideo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videoindex');
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('videoindex');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                    'vname' => 'required',
                    'des' => 'required',
                ],   
                [
                    'vname' => 'Name Must',
                ]);
                DB::table('video')->insert([
                    "videoName"=>$request->vname,
                    "videoDescription"=>$request->des,
                ]);
                 return redirect('/video')->with(["success"=>"Data Insert..."]);
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
