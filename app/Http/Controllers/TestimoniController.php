<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.testimoni.testimoni_page', [
            'testimoni' => Testimoni::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.testimoni.testimoni_add');
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
            'name' => 'required',
            'jabatan' => 'required',
            'testimoni' => 'required',
            
        ]);

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        Testimoni::create($validateData);

        return redirect('/testimoni')->with('success', 'Testimoni berhasil di tambahkan');
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
        $data_testimoni = Testimoni::find($id);
        return view('admin.dashboard.testimoni.testimoni_detail', compact('data_testimoni', 'id'));
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
        $this->validate($request, [
            'name' => 'required',
            'jabatan' => 'required',
            'testimoni' => 'required',
        ]);

        $testimoni = Testimoni::find($id);

        $testimoni->name = $request->name;
        $testimoni->jabatan = $request->jabatan;
        $testimoni->testimoni = $request->testimoni;
        $testimoni->save();

        $request->session()->flash('success', 'Update berhasil !');

        return redirect('/testimoni');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Testimoni = Testimoni::find($id);
        $Testimoni->delete();
        // User::destroy($user->id);
        return redirect('/testimoni')->with('success', 'Testimoni berhasil dihapus!');
    }

    public function approve_testimoni($id)
    {

        Testimoni::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

            return redirect('/testimoni')->with('success', 'Testimoni berhasil di publish');
    }

    public function unapprove_testimoni($id)
    {

        Testimoni::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

            return redirect('/testimoni')->with('success', 'Testimoni berhasil menjadi draft');
    }
}
