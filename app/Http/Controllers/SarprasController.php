<?php

namespace App\Http\Controllers;

use App\Models\ProfilInstansi;
use App\Models\Sarpras;
use Illuminate\Http\Request;

class SarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.sarpras.sarpras_page', [
            'sarpras' => Sarpras::latest()->get()
        ]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.sarpras.sarpras_detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('img');
        }

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        Sarpras::create($validateData);

        return redirect('/sarana-prasarana')->with('success', 'Sarana dan Prasarana berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sarpras  $sarpras
     * @return \Illuminate\Http\Response
     */
    public function show(Sarpras $sarpras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sarpras  $sarpras
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_sarpras = Sarpras::find($id);
        return view('admin.dashboard.sarpras.sarpras_update', compact('data_sarpras', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sarpras  $sarpras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('img');
            // return $validateData;
        }

        // dd($validateData);  
        // return redirect($validateData);

        Sarpras::where('id', $id)->update($validateData);

        return redirect('/sarana-prasarana')->with('success', 'Sarana Prasarana berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sarpras  $sarpras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sarpras = Sarpras::find($id);
        $sarpras->delete();
        // User::destroy($user->id);
        return redirect('/sarana-prasarana')->with('success', 'Sarana Prasarana berhasil dihapus!');
    }
}
