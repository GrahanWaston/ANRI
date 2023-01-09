<?php

namespace App\Http\Controllers;

use App\Models\FileDownload;
use App\Models\Jenis;
use App\Models\Layanan;
use App\Models\MenuHyperlink;
use App\Models\MenuStatis;
use App\Models\Pages;
use App\Models\Program;
use App\Models\Publication;
use App\Models\Sarpras;
use App\Models\Section4;
use App\Models\Slideshow;
use App\Models\SubMenu;
use App\Models\SubMenuHyperlink;
use App\Models\Testimoni;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::find(1);

        return view('admin.dashboard.konfigurasi.konfigurasi_situs', [
            'website' => $website,
            'link' => DB::table('link')->get()
        ]);
    }

    public function website_kontak()
    {
        $website = Website::find(1);

        return view('website.kontak.kontak_kami', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'website' => $website,
            'link' => DB::table('link',)->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function website_sarpras()
    {
        $sarpras = Sarpras::get();

        return view('website.sarpras.sarpras', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'sarpras' => $sarpras,
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menus' => Pages::get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function view_menu($n_m)
    {
        // return ;
        $pages = Pages::where('nama_menu', $n_m)->get()->first();
        $sarpras = Sarpras::get();

        return view('website.menu.view_menu', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'pages' => $pages,
            'mainmenu' => Pages::get(),
            'sarpras' => $sarpras,
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function view_submenu($url)
    {
        // return ;
        // $pages = Pages::where('nama_menu', $n_m)->get()->first();
        $submenu = SubMenu::where('url', $url)->get()->first();
        $sarpras = Sarpras::get();

        return view('website.menu.view_submenu', [
            'menu' => MenuStatis::get(),
            'submenus' => $submenu,
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'sarpras' => $sarpras,
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function program_diklat()
    {
        return view('website.diklat.program_diklat', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'programs' => Program::latest()->paginate(),
            'mainmenu' => Pages::get(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function program_detail($kode_diklat)
    {
        // return $program = Program::where('kode_diklat', $kode_diklat)->get()->first();
        return view('website.diklat.program_detail', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'programs_diklat' => Program::latest()->paginate(),
            'programs' => Program::where('kode_diklat', $kode_diklat)->get()->first(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function berita_detail($slug)
    {
        return view('website.publikasi.detail_berita', [
            'publikasi' => Publication::where('slug', $slug)->get()->first(),
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'news' => Publication::where('category_id', 1)->get(),
            'info' => Publication::where('category_id', 2)->get(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function infografis_detail($slug)
    {
        return view('website.publikasi.detail_infografis', [
            'publikasi' => Publication::where('slug', $slug)->get()->first(),
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            // 'news' => Publication::where('category_id', 1)->get(),
            'info' => Publication::where('category_id', 2)->get(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function kalender()
    {
        // return $program = Program::where('kode_diklat', $kode_diklat)->get()->first();
        return view('website.diklat.kalender_diklat', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'programs_diklat' => Program::latest()->paginate(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function artikel()
    {
        // return $program = Program::where('kode_diklat', $kode_diklat)->get()->first();
        return view('website.publikasi.article', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'publications' => Publication::latest()->paginate(),
            'articles' => FileDownload::where('category_id', 3)->paginate(5),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function berita()
    {
        // return $program = Program::where('kode_diklat', $kode_diklat)->get()->first();
        return view('website.publikasi.berita', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'publications' => Publication::latest()->paginate(3),
            'news' => Publication::where('category_id', 1)->paginate(3),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function infografis()
    {
        // return $program = Program::where('kode_diklat', $kode_diklat)->get()->first();
        return view('website.publikasi.infografis', [
            'menu' => MenuStatis::get(),
            'mainmenu' => Pages::get(),
            'submenu' => SubMenu::get(),
            'publications' => Publication::latest()->paginate(),
            'infografis' => Publication::where('category_id', 2)->paginate(3),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function pengumuman()
    {
        // return $program = Program::where('kode_diklat', $kode_diklat)->get()->first();
        return view('website.publikasi.pengumuman', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'publications' => Publication::latest()->paginate(),
            'pengumuman' => FileDownload::where('category_id', 4)->get(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function menu_navbar()
    {
        $menus = Pages::latest();
        $sarpras = Sarpras::get();

        return view('website.header_footer', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'sarpras' => $sarpras,
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menus' => $menus,
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function website_beranda()
    {

        $website = Website::find(1);
        return view('website.beranda', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'website' => $website,
            'mainmenu' => Pages::get(),
            'section' => Section4::latest()->first(),
            'link' => DB::table('link')->get(),
            'testimoni' => Testimoni::get(),
            'slideshow' => Slideshow::all(),
            'service' => Layanan::all(),
            'menus' => Pages::get(),
            'program' => Program::latest()->get(),
            'berita' => Publication::latest()->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('keywords');
        $publikasi = Publication::where('title', 'like', '%' . $search . '%')->latest()->paginate(3, ['*'], 'publikasi')->withquerystring();
        $file = FileDownload::where('title', 'like', '%' . $search . '%')->paginate(3, ['*'], 'file')->withquerystring();
        $program = Program::where('nama_diklat', 'like', '%' . $search . '%')->paginate(3, ['*'], 'program')->withquerystring();

        return view('website.search', [
            'publikasi' => $publikasi,
            'file' => $file,
            'program' => $program,
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function search_berita(Request $request)
    {
        $search = $request->get('keywords');
        $publikasi = Publication::where('category_id', 1 )->Where('title', 'like', '%' . $search . '%')->paginate(3, ['*'], 'publikasi')->withquerystring();

        return view('website.publikasi.berita_search', [
            'publikasi' => $publikasi,
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function search_infografis(Request $request)
    {
        $search = $request->get('keywords');
        $publikasi = Publication::where('category_id', 2 )->Where('title', 'like', '%' . $search . '%')->paginate(3, ['*'], 'publikasi')->withquerystring();

        return view('website.publikasi.infografis_search', [
            'publikasi' => $publikasi,
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function search_artikel(Request $request)
    {
        $search = $request->get('keywords');
        $year = $request->get('tahun');
        $publikasi = FileDownload::where('category_id', 3 )
                                  ->Where('title', 'like', '%' . $search . '%')
                                  ->Where('year', 'like', '%' . $year . '%' )
                                  ->paginate(3, ['*'], 'publikasi')->withquerystring();

        return view('website.publikasi.article_search', [
            'publikasi' => $publikasi,
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'articles' => FileDownload::where('category_id', 3)->paginate(5),
            'mainmenu' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function search_pengumuman(Request $request)
    {
        $search = $request->get('keywords');
        $year = $request->get('tahun');
        $publikasi = FileDownload::where('category_id', 4 )
                                  ->Where('title', 'like', '%' . $search . '%')
                                  ->Where('year', 'like', '%' . $year . '%' )
                                  ->paginate(3, ['*'], 'publikasi')->withquerystring();

        return view('website.publikasi.pengumuman_search', [
            'publikasi' => $publikasi,
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'pengumuman' => FileDownload::where('category_id', 4)->get(),
            'mainmenu' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
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
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dashboard.konfigurasi.konfigurasi_situs', [
            'website' => Website::find($id),
            'link' => DB::table('link')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_website' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
            'no_whatsapp' => 'required',
            'email_pertama' => 'required',
            'email_kedua' => 'required',
            'maps' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'url_youtube' => 'required',

        ]);

        $website = Website::find($id);

        $website->nama_website = $request->nama_website;
        $website->alamat = $request->alamat;
        $website->no_telfon = $request->no_telfon;
        $website->no_whatsapp = $request->no_whatsapp;
        $website->email_pertama = $request->email_pertama;
        $website->email_kedua = $request->email_kedua;
        $website->maps = $request->maps;
        $website->facebook = $request->facebook;
        $website->twitter = $request->twitter;
        $website->instagram = $request->instagram;
        $website->youtube = $request->youtube;
        $website->url_youtube = $request->url_youtube;
        $website->save();

        // $request->session()->flash('success', 'Update berhasil !');

        return redirect()->back()->with('success', 'Update berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
