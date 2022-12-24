<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenisJenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.program_diklat.jenis_jenjang', [
            'jenis' => Jenis::latest()->paginate(5),
            'jenjang' => Jenjang::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.dashboard.publikasi.publikasi_form');
    }

    public function create_jenis()
    {
        return view('admin.dashboard.program_diklat.jenis_add');
    }

    public function create_jenjang()
    {
        return view('admin.dashboard.program_diklat.jenjang_add',  [
            'jenis' => Jenis::latest()->paginate()
        ]);
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

    public function store_jenis(Request $request)
    {
        $validateData = $request->validate([
            'nama_jenis' => 'required',
        ]);

        Jenis::create($validateData);

        return redirect('/jenis-jenjang')->with('successs', 'Jenis berhasil di tambahkan');
    }

    public function store_jenjang(Request $request)
    {
        $validateData = $request->validate([
            'jenis_id' => 'required',
            'jenjang' => 'required',
        ]);

        Jenjang::create($validateData);

        return redirect('/jenis-jenjang')->with('success', 'Jenjang berhasil di tambahkan');
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

     public function edit_jenis($id)
     {
        $jenis = Jenis::findOrFail($id);
        return view('admin.dashboard.program_diklat.jenis_update',  [
            'jenis' => $jenis
        ]);
     }
     public function edit_jenjang($id)
     {
        $jenjang = Jenjang::find($id);
        return view('admin.dashboard.program_diklat.jenjang_update',  [
            'jenis' => Jenis::latest()->paginate(),
            'jenjang' => $jenjang
        ]);
     }

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

    public function update_jenis(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_jenis' => 'required',
        ]);

        Jenis::where('id', $id)->update($validateData);

        return redirect('/jenis-jenjang')->with('successs', 'Jenis berhasil di update');
    }

    public function update_jenjang(Request $request, $id)
    {
        $validateData = $request->validate([
            'jenis_id' => 'required',
            'jenjang' => 'required',
        ]);

        Jenjang::where('id', $id)->update($validateData);

        return redirect('/jenis-jenjang')->with('success', 'Jenjang berhasil di update');
    }

    public function approve_jenis($id)
    {

        Jenis::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

            return redirect('/jenis-jenjang')->with('successs', 'Jenis diklat berhasil di publish');
    }

    public function unapprove_jenis($id)
    {

        Jenis::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

            return redirect('/jenis-jenjang')->with('successs', 'Jenis diklat berhasil menjadi draft');
    }

    public function approve_jenjang($id)
    {

        Jenjang::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

            return redirect('/jenis-jenjang')->with('success', 'Jenjang diklat berhasil di publish');
    }

    public function unapprove_jenjang($id)
    {

        Jenjang::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

            return redirect('/jenis-jenjang')->with('success', 'Jenjang diklat berhasil menjadi draft');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_jenis($id)
    {
        $jenis = Jenis::find($id);
        $jenis->delete();
        // User::destroy($user->id);
        return redirect('/jenis-jenjang')->with('successs', 'Jenis berhasil dihapus!');
    }

    public function destroy_jenjang($id)
    {
        $jenjang = Jenjang::find($id);
        $jenjang->delete();
        // User::destroy($user->id);
        return redirect('/jenis-jenjang')->with('success', 'jenjang berhasil dihapus!');
    }
}
