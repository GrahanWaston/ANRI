<?php

namespace App\Http\Controllers;

use App\Models\MenuStatis;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MenuStatisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return SubMenu::with('menus')->latest()->get();
        return view('admin.dashboard.menu.menu_index', [
            // 'dynamic_adds' => MenuDinamis::latest()->get(),
            'static_adds' => MenuStatis::oldest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'static_submenu' => SubMenu::oldest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.menu.menu_add');
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
            'status' => 'required'
        ]);

        MenuStatis::create($validateData);
        // return $validateData;

        return redirect('/manajemen-menu')->with('success', 'Sub Menu berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuStatis  $menuStatis
     * @return \Illuminate\Http\Response
     */
    public function show(MenuStatis $menuStatis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuStatis  $menuStatis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submenu = SubMenu::findOrFail($id);
        return view('admin.dashboard.menu.submenu_dinamis_update',  [
            'submenus' => $submenu,
            'static_adds' => MenuStatis::latest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'static_submenu' => SubMenu::oldest()->get()
        ]);
    }

    public function edit_submenu($id)
    {
        $submenu = SubMenu::findOrFail($id);
        return view('admin.dashboard.menu.submenu_hyperlink_update',  [
            'submenu' => $submenu,
            'static_adds' => MenuStatis::latest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'static_submenu' => SubMenu::oldest()->get()
        ]);
    }

    public function edit_menu($id)
    {
        $menu = MenuStatis::findOrFail($id);
        return view('admin.dashboard.menu.menu_hyperlink_update',  [
            'menu' => $menu,
            'static_adds' => MenuStatis::latest()->get(),
            // 'dynamic_submenu' =>SubMenuDinamis::latest()->get(),
            'static_submenu' => SubMenu::oldest()->get()
        ]);
    }

    public function update_submenu(Request $request, $id)
    {
        $validateData = $request->validate([
            // 'judul' => 'required',
            'name' => 'required',
            'url' => 'required',
        ]);

        SubMenu::where('id', $id)->update($validateData);

        return redirect('/manajemen-menu')->with('successs', 'Sub Menu berhasil di update');
    }

    public function update_menu(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        MenuStatis::where('id', $id)->update($validateData);

        return redirect('/manajemen-menu')->with('successs', 'Menu berhasil di update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuStatis  $menuStatis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            // 'judul' => 'required',
            'body' => 'required',
            'status' => 'required',
            'name' => 'required',
            'url' => 'required',
            'menu_id' => 'required'
        ]);

        SubMenu::where('id', $id)->update($validateData);

        return redirect('/manajemen-menu')->with('success', 'Sub Menu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuStatis  $menuStatis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = MenuStatis::find($id);
        $menu->delete();
        // User::destroy($user->id);
        return redirect('/manajemen-menu')->with('successss', 'Menu Navbar berhasil dihapus!');
    }

    public function destroy_submenu($id)
    {
        $menu = SubMenu::find($id);
        $menu->delete();
        // User::destroy($user->id);
        return redirect('/manajemen-menu')->with('success', 'Sub Menu berhasil dihapus!');
    }
}
