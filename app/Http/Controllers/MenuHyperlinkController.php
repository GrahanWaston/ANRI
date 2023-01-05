<?php

namespace App\Http\Controllers;

use App\Models\MenuHyperlink;
use App\Models\MenuStatis;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MenuHyperlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.menu.menu_hyperlink', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'menus' => MenuHyperlink::oldest()->get(),
            'submenus' => SubMenu::oldest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.menu.menu_hyperlink_add');
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
        ]);

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        MenuHyperlink::create($validateData);

        return redirect('/manajemen-menu-hyperlink')->with('success', 'Menu berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuHyperlink  $menuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function show(MenuHyperlink $menuHyperlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuHyperlink  $menuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = MenuHyperlink::find($id);
        return view('admin.dashboard.menu.menu_hyperlink_update', [
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuHyperlink  $menuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        MenuHyperlink::where('id', $id)->update($validateData);

        return redirect('/manajemen-menu-hyperlink')->with('success', 'Menu Hyperlink berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuHyperlink  $menuHyperlink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = MenuHyperlink::find($id);
        $menu->delete();
        // User::destroy($user->id);
        return redirect('/manajemen-menu-hyperlink')->with('success', 'Menu berhasil dihapus!');
    }
}
