<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\MenuHyperlink;
use App\Models\MenuStatis;
use App\Models\Pages;
use App\Models\SubMenu;
use App\Models\SubMenuHyperlink;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.faq.faq_page', [
            'faq' => Faq::latest()->paginate(5)
        ]);
    }

    public function website()
    {
        $website = DB::table('websites')->find(1);

        return view('website.faq.faq', [
            'menu' => MenuStatis::get(),
            'mainmenu' => Pages::get(),
            'submenu' => SubMenu::get(),
            'website' => $website,
            'link' => DB::table('link')->get(),
            'faq' => Faq::get(),
            'testimoni' => Testimoni::oldest(),
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
        $faq = Faq::all();
        return view('admin.dashboard.faq.faq_form', compact('faq'));
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
            'status' => 'required',
            'judul' => 'required',
            'text' => 'required',
        ]);

        // dd('Registrasi Berhasil');

        Faq::create($validateData);

        return redirect('/faq')->with('success', 'FAQ berhasil di tambahkan');
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
        $data_faq = Faq::find($id);
        return view('admin.dashboard.faq.form_update
        ', compact('data_faq', 'id'));
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
            'status' => 'required',
            'judul' => 'required',
            'text' => 'required',
        ]);

        $user = Faq::find($id);

        $user->judul = $request->judul;
        $user->text = $request->text;
        $user->save();

        // $request->session()->flash('success', 'Update berhasil !');

        return redirect('/faq')->with('success', 'Update berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = faq::find($id);
        $faq->delete();
        // User::destroy($user->id);
        return redirect('/faq')->with('success', 'FAQ berhasil dihapus!');
    }

    public function approve_faq($id)
    {

        Faq::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

            return redirect('/faq')->with('success', 'FAQ berhasil di publish');
    }

    public function unapprove_faq($id)
    {

        Faq::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

            return redirect('/faq')->with('success', 'FAQ berhasil menjadi draft');
    }
}
