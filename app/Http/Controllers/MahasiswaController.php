<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
   
    /**
     * Display the specified resource.
     */
    public function show(string $param1)
     {
        return "Data Mahasiswa: ".$param1;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1) 
     {
        if($param1 == 'detail'){
            return view('halaman-mahasiswa-detail');
        }
     }

    /**
     * Update the specified resource in storage.
     */
    
}
