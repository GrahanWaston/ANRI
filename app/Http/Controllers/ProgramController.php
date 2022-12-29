<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Jenjang;
use App\Models\MenuStatis;
use App\Models\Pages;
use App\Models\Program;
use App\Models\SubMenu;
use App\Models\Website;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.program_diklat.program_diklat', [
            'program' => Program::latest()->get()
        ]);
    }

    public function getEvent()
    {
        $events = array();
        $bookings = Program::all();
        foreach ($bookings as $booking) {
            # code...
            if ($booking->status == 'published') {
                # code...
                $events[] = [
                    'start' => $booking->start_date,
                    'end' => $booking->end_date,
                    'title' => $booking->kode_diklat,
                ];
            }
        }
        // return $events;

        return view('website.diklat.kalender_diklat', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'events' => $events,
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.program_diklat.program_diklat_add',  [
            'jenis' => Jenis::latest()->paginate(),
            'jenjang' => Jenjang::latest()->paginate(),
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
            'kode_diklat' => 'required',
            'jenis_id' => 'required',
            'jenjang_id' => 'required',
            'nama_diklat' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'tempat_diklat' => 'required',
            'biaya' => 'required',
            'durasi' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|file|mimes:pdf,docx',
            'status' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $validateData['file'] = $request->file('file')->store('files');
        }

        Program::create($validateData);

        return redirect('/program-diklat')->with('success', 'Program Diklat berhasil di tambahkan');
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
        return view('admin.dashboard.program_diklat.program_diklat_update',  [
            'jenis' => Jenis::latest()->paginate(),
            'jenjang' => Jenjang::latest()->paginate(),
            'data_program' => Program::find($id)
        ]);
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
        $validateData = $request->validate([
            'kode_diklat' => 'required',
            'jenis_id' => 'required',
            'jenjang_id' => 'required',
            'nama_diklat' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'tempat_diklat' => 'required',
            'biaya' => 'required',
            'durasi' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|file|mimes:pdf,docx',
        ]);

        if ($request->hasFile('file')) {
            $validateData['file'] = $request->file('file')->store('files');
        }

        Program::where('id', $id)->update($validateData);

        return redirect('/program-diklat')->with('success', 'Program Diklat berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        // User::destroy($user->id);
        return redirect('/program-diklat')->with('success', 'Program Diklat berhasil dihapus!');
    }

    public function approve_program($id)
    {

        Program::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

        return redirect('/program-diklat')->with('success', 'Program diklat berhasil di publish');
    }

    public function unapprove_program($id)
    {

        Program::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

        return redirect('/program-diklat')->with('success', 'Program diklat berhasil menjadi draft');
    }
}
