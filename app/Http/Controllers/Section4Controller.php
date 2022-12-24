<?php

namespace App\Http\Controllers;

use App\Models\Section4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Section4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = DB::table('section4s')->find(1);

        return view('admin.dashboard.konfigurasi.konfigurasi_section_4', [
            'section' => $section,
        ]);
    }

    public function section()
    {
        $section = DB::table('section4s')->latest()->first();
        return view('website.beranda', [
            'section' => $section,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.konfigurasi.konfigurasi_section_4');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'diskripsi' => 'required',
            'tautan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('gambar')) {
            
            $attributes['image'] = $request->file('gambar')->store('images');
            return $attributes;
        }
        
        // Section4::create($attributes);
        // // $request->session()->flash('success', 'Update berhasil !');
        // return redirect('/konfigurasi-section')->with('success', ' berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section4  $section4
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section4  $section4
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dashboard.konfigurasi.konfigurasi_section_4', [
            'section' => Section4::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section4  $section4
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'editortiny' => 'required',
        //     'tautan' => 'required',
        //     'gambar' => 'required|image|mimes:jpeg,png,jpg',
        // ]);

        // $section = Section4::find($id);

        // $section->diskripsi = $request->editortiny;
        // $section->tautan = $request->tautan;
        // // $section->gambar = $request->gambar;
        // if ($image = $request->file('gambar')) {
        //     $destinationPath = 'img/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $section['image'] = "$profileImage";
        // } else {
        //     unset($section['image']);
        // }
        // $section->save();

        // $request->session()->flash('success', 'Update berhasil !');
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section4  $section4
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section4 $section4)
    {
        //
    }
}
