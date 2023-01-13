<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Jenjang;
use App\Models\MenuHyperlink;
use App\Models\MenuStatis;
use App\Models\Pages;
use App\Models\Program;
use App\Models\SubMenu;
use App\Models\SubMenuHyperlink;
use App\Models\Website;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $program = Program::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($program)->addIndexColumn()
                ->addColumn('checkbox', function ($publication) {
                    return '<input type="checkbox" name="id" data-id="' . $publication->id . '">';
                })
                ->addColumn('action', function ($publication) {
                    if (auth()->user()->role == "admin") {
                        if ($publication->status == "draft") {
                            return '
                            <div class="btn-group">
                                <a href="' . route('publikasi-file.edit', $publication->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $publication->id . '" href="#!" class="btn btn-light m-1 h3 text-success approval"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $publication->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                            </div>
                            ';
                        } else {
                            return '
                            <div class="btn-group">
                                <a href="' . route('publikasi-file.edit', $publication->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $publication->id . '" href="#!" class="btn btn-light m-1 h3 text-danger unapproval"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $publication->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                            </div>
                            ';
                        }
                    } else {
                        return '
                        <div class="btn-group">
                            <a href="' . route('publikasi-file.edit', $publication->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                            <a id="' . $publication->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                        </div>
                        ';
                    }
                })
                ->rawColumns(['checkbox', 'action'])->make(true);
        }
        return view('admin.dashboard.program_diklat.program_diklat');
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
            'jenis' => Jenis::get(),
            'jenjang' => Jenjang::get(),
            'menus' => Pages::get(),
            'website' => Website::find(1),
            'link' => DB::table('link')->get(),
            'menu_hyperlink' => MenuHyperlink::latest()->get(),
            'submenu_hyperlink' => SubMenuHyperlink::latest()->get(),
        ]);
    }

    public function search_program(Request $request)
    {
        $search = $request->get('keywords');
        $jenis = $request->get('jenis');
        $jenjang = $request->get('jenjang');
        $events = array();
        $bookings = Program::Where('nama_diklat', 'like', '%' . $search . '%')
            ->Where('jenis_id', 'like', '%' . $jenis . '%')
            ->Where('jenjang_id', 'like', '%' . $jenjang . '%')
            ->get();

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

        return view('website.diklat.kalender_diklat_search', [
            'menu' => MenuStatis::get(),
            'submenu' => SubMenu::get(),
            'mainmenu' => Pages::get(),
            'events' => $events,
            'menus' => Pages::get(),
            'jenis' => Jenis::get(),
            'jenjang' => Jenjang::get(),
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
            // 'file' => 'required|file|mimes:pdf,docx',
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
    public function destroy(Request $request ,$id)
    {
        try {
            if ($request->has('data')) {
                Program::whereIn('id', $request->data)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Dihapus'
                ]);
            }
            $publication = Program::find($id);
            $publication->delete();
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Menghapus Data'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function approve_program(Request $request ,$id)
    {
        if ($request->has('data')) {
            Program::whereIn('id', $request->data)->update(['status' => 'published']);
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }
        Program::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil Publish Data'
        ]);
    }

    public function unapprove_program(Request $request ,$id)
    {
        if ($request->has('data')) {
            Program::whereIn('id', $request->data)->update(['status' => 'draft']);
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }
        Program::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil draft Data'
        ]);
    }
}
