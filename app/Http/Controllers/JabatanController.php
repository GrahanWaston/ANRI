<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jabatan = Jabatan::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($jabatan)->addIndexColumn()
                ->addColumn('checkbox', function ($job) {
                    return '<input type="checkbox" name="id" data-id="' . $job->id . '">';
                })
                ->addColumn('action', function ($job) {
                    if (auth()->user()->role == "admin") {
                        if ($job->status == "draft") {
                            return '
                            <div class="btn-group">
                                <a href="' . route('publikasi-file.edit', $job->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $job->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                            </div>
                            ';
                        } else {
                            return '
                            <div class="btn-group">
                                <a href="' . route('publikasi-file.edit', $job->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $job->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                            </div>
                            ';
                        }
                    } else {
                        return '
                        <div class="btn-group">
                            <a href="' . route('publikasi-file.edit', $job->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                            <a id="' . $job->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                        </div>
                        ';
                    }
                })
                ->rawColumns(['checkbox', 'action'])->make(true);
        }
        return view('admin.dashboard.profil_SDM.profil_jabatan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.profil_SDM.profil_jabatan_add');
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
            'jabatan' => 'required',
        ]);

        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        Jabatan::create($validateData);

        return redirect(route('jabatan.index'))->with('success', 'Jabatan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_jabatan = Jabatan::find($id);
        return view('admin.dashboard.profil_SDM.profil_jabatan_form', compact('data_jabatan', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'jabatan' => 'required',
        ]);

        Jabatan::where('id', $id)->update($validateData);

        return redirect(route('jabatan.index'))->with('success', 'Jabatan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            if ($request->has('data')) {
                Jabatan::whereIn('id', $request->data)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Dihapus'
                ]);
            }
            $file = Jabatan::find($id);
            $file->delete();
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
}
