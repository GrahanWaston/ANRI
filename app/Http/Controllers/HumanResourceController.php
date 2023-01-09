<?php

namespace App\Http\Controllers;

use App\Models\HumanResource;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class HumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all SDM from Model
        $SDM = HumanResource::latest()->paginate(10);

        //passing SDM to view
        return view('admin.dashboard.profil_SDM.profil_pejabat', compact('SDM'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.profil_SDM.profil_pejabat_add', [
            'jabatan' => Jabatan::get(),
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
        $validateData = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('img');
        }

        HumanResource::create($validateData);

        return redirect(route('SDM.index'))->with('success', 'Pejabat berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function show(HumanResource $humanResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dashboard.profil_SDM.profil_pejabat_form', [
            'jabatan' => Jabatan::get(),
            'data_pejabat' => HumanResource::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'keterangan' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('img');
        }

        HumanResource::where('id', $id)->update($validateData);

        return redirect(route('SDM.index'))->with('success', 'Pejabat berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pejabat = HumanResource::find($id);
        $pejabat->delete();
        // User::destroy($user->id);
        return redirect(route('SDM.index'))->with('success', 'Pejabat berhasil dihapus!');
    }
}
