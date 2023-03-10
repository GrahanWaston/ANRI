<?php

namespace App\Http\Controllers;

use App\Models\HumanResource;
use App\Models\Jabatan;
use App\Models\MenuHyperlink;
use App\Models\MenuStatis;
use App\Models\Pages;
use App\Models\ProfilInstansi;
use App\Models\SubMenu;
use App\Models\SubMenuHyperlink;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.profil_instansi.profil_page', [
            'profil' => ProfilInstansi::latest()->paginate()
        ]);
    }

    public function sejarah()
    {
        $website = Website::find(1);
        return view('website.profil.sejarah', [
            'menu' => MenuStatis::get(),
            'mainmenu' => Pages::get(),
            'submenu' => SubMenu::get(),
            'sejarah' => ProfilInstansi::find(1),
            'website' => $website,
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function visi_misi()
    {
        $website = Website::find(1);
        return view('website.profil.visi_misi', [
            'menu' => MenuStatis::get(),
            'mainmenu' => Pages::get(),
            'submenu' => SubMenu::get(),
            'visi_misi' => ProfilInstansi::find(2),
            'website' => $website,
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function tugas_fungsi()
    {
        $website = Website::find(1);
        return view('website.profil.tugas_fungsi', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'tugas_fungsi' => ProfilInstansi::find(3),
            'website' => $website,
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function struktur_organisasi()
    {
        $website = Website::find(1);
        return view('website.profil.struktur_organisasi', [
            'menu' => MenuStatis::get(),
            'mainmenu' => Pages::get(),
            'submenu' => SubMenu::get(),
            'struktur_organisasi' => ProfilInstansi::find(4),
            'website' => $website,
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function sumber_daya_manusia()
    {
        $website = Website::find(1);
        return view('website.profil.sumber_daya_manusia', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'sumber_daya_manusia' => ProfilInstansi::find(5),
            'website' => $website,
            'pejabat' => HumanResource::get(),
            'jabatan' => Jabatan::get(),
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function maklumat_layanan()
    {
        $website = Website::find(1);
        return view('website.profil.maklumat_layanan', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'maklumat_layanan' => ProfilInstansi::find(6),
            'website' => $website,
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilInstansi  $profilInstansi
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilInstansi $profilInstansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilInstansi  $profilInstansi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_profil = ProfilInstansi::find($id);
        return view('admin.dashboard.profil_instansi.profil_form', compact('data_profil', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilInstansi  $profilInstansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'deskripsi' => 'required',
        ]);

        // dd($validateData);
        // return redirect($validateData);

        ProfilInstansi::where('id', $id)->update($validateData);

        return redirect('/profil-instansi')->with('success', 'Profil Instansi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilInstansi  $profilInstansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilInstansi $profilInstansi)
    {
        //
    }
}
