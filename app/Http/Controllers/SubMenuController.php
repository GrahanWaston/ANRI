<?php

namespace App\Http\Controllers;

use App\Models\MenuStatis;
use App\Models\SubMenu;
use App\Models\SubMenuDinamis;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.menu.submenu_index', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'menus' => MenuStatis::oldest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'submenus' =>SubMenu::oldest()->with('menus')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.menu.submenu_dinamis_add', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'static_adds' => MenuStatis::oldest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'static_submenu' =>SubMenu::latest()->with('menus')->get()
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
            // 'judul' => 'required',
            'body' => 'required',
            'status' => 'required',
            'name' => 'required',
            'url' => 'required',
            'menu_id' => 'required'
        ]);

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        SubMenu::create($validateData);

        return redirect('/manajemen-sub-menu')->with('success', 'Sub Menu berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submenus = SubMenu::find($id);
        return view('admin.dashboard.menu.submenu_update', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'menus' => MenuStatis::oldest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'submenus' => $submenus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'menu_id' => 'required',
            'body' => 'required'
        ]);

        SubMenu::where('id', $id)->update($validateData);

        return redirect('/manajemen-sub-menu')->with('success', 'SubMenu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = SubMenu::find($id);
        $menu->delete();
        // User::destroy($user->id);
        return redirect('/manajemen-sub-menu')->with('success', 'Sub Menu berhasil dihapus!');
    }
}
