<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = DB::table('website')->find(1);
 
        return view('admin.dashboard.konfigurasi.konfigurasi_situs', [
            'website' => $website,
            'link' => DB::table('link')->get()
        ]);
    }

    public function website()
    {
        $website = DB::table('website')->find(1);
 
        return view('website.kontak.kontak_kami', [
            'website' => $website,
            'link' => DB::table('link')->get()
        ]);
        
    }

    public function website_yt()
    {
        $website = DB::table('website')->find(1);
 
        return view('website.beranda', [
            'website' => $website,
            'link' => DB::table('link')->get()
        ]);
        
    }

    // public function website_quick()
    // {
    //     $links = DB::table('link')->get();
    //     // $website = DB::table('website')->find(1);
 
    //     return view('website.header_footer', [
    //         'links' => $links
    //     ]);
        
    // }

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
