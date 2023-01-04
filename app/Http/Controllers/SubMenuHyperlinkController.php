<?php

namespace App\Http\Controllers;

use App\Models\MenuHyperlink;
use App\Models\MenuStatis;
use App\Models\SubMenuHyperlink;
use Illuminate\Http\Request;

class SubMenuHyperlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.menu.submenu_hyperlink', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'menus' => MenuStatis::oldest()->get(),
            'submenus' => SubMenuHyperlink::oldest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.menu.submenu_hyperlink_add', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'menus' => MenuStatis::oldest()->get(),
            'submenus' => SubMenuHyperlink::oldest()->get()
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
            'name' => 'required',
            'url' => 'required',
            'menu_id' => 'required'
        ]);

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        SubMenuHyperlink::create($validateData);

        return redirect('/manajemen-submenu-hyperlink')->with('success', 'Sub Menu berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMenuHyperlink  $subMenuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function show(SubMenuHyperlink $subMenuHyperlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMenuHyperlink  $subMenuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function edit(SubMenuHyperlink $subMenuHyperlink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenuHyperlink  $subMenuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMenuHyperlink $subMenuHyperlink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMenuHyperlink  $subMenuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenuHyperlink $subMenuHyperlink)
    {
        //
    }
}
