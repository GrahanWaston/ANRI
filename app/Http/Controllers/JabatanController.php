<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::latest()->paginate(10);

        //passing posts to view
        return view('admin.dashboard.profil_SDM.profil_jabatan', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.profil_SDM.profil_jabatan_add');
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
            'jabatan' => 'required',
        ]);

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        Jabatan::create($validateData);

        return redirect(route('jabatan.index'))->with('success', 'Jabatan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_jabatan = Jabatan::find($id);
        return view('admin.dashboard.profil_SDM.profil_jabatan_form', compact('data_jabatan', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'jabatan' => 'required',
        ]);

        Jabatan::where('id', $id)->update($validateData);

        return redirect(route('jabatan.index'))->with('success', 'Jabatan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        // User::destroy($user->id);
        return redirect(route('jabatan.index'))->with('success', 'Jabatan berhasil dihapus!');
    }
}
