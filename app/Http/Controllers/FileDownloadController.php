<?php

namespace App\Http\Controllers;

use App\Models\FileDownload;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FileDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get all SDM from Model
        $files = FileDownload::with('category')->latest()->get();
        if ($request->ajax()) {
            return DataTables::of($files)->addIndexColumn()
                ->addColumn('checkbox', function ($file) {
                    return '<input type="checkbox" name="id" data-id="' . $file->id . '">';
                })
                ->addColumn('action', function ($file) {
                    if (auth()->user()->role == "admin") {
                        if ($file->status == "draft") {
                            return '
                            <div class="btn-group">
                                <a href="' . route('publikasi-file.edit', $file->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $file->id . '" href="#!" class="btn btn-light m-1 h3 text-success approval"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $file->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                            </div>
                            ';
                        } else {
                            return '
                            <div class="btn-group">
                                <a href="' . route('publikasi-file.edit', $file->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $file->id . '" href="#!" class="btn btn-light m-1 h3 text-danger unapproval"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                <a id="' . $file->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                            </div>
                            ';
                        }
                    } else {
                        return '
                        <div class="btn-group">
                            <a href="' . route('publikasi-file.edit', $file->id) . '" class="btn btn-light m-1 h3 text-primary"><i class="fas fa-file-signature" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                            <a id="' . $file->id . '" href="#!" class="btn btn-light m-1 h3 text-danger delete"><i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></a>
                        </div>
                        ';
                    }
                })
                ->rawColumns(['checkbox', 'action'])->make(true);
        }
        //passing SDM to view
        return view('admin.dashboard.publikasi.fileDownload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.publikasi.fileDownloadAdd');
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
            'title' => 'required',
            'category_id' => 'required',
            'year' => 'required',
            'file' => 'required|file|mimes:pdf',
            'status' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $validateData['file'] = $request->file('file')->store('files');
        }
        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        FileDownload::create($validateData);

        return redirect('/publikasi-file')->with('success', 'Publikasi File berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileDownload  $fileDownload
     * @return \Illuminate\Http\Response
     */
    public function show(FileDownload $fileDownload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileDownload  $fileDownload
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dashboard.publikasi.fileDownloadForm', [
            'data_file' => FileDownload::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileDownload  $fileDownload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'year' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $validateData['file'] = $request->file('file')->store('files');
        }

        // dd($validateData);  
        // return redirect($validateData);

        FileDownload::where('id', $id)->update($validateData);

        return redirect('/publikasi-file')->with('success', 'Publikasi File berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileDownload  $fileDownload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            if ($request->has('data')) {
                FileDownload::whereIn('id', $request->data)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Dihapus'
                ]);
            }
            $file = FileDownload::find($id);
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

    public function approve_file(Request $request, $id)
    {
        if ($request->has('data')) {
            FileDownload::whereIn('id', $request->data)->update(['status' => 'published']);
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }
        FileDownload::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil Publish Data'
        ]);
    }

    public function unapprove_file(Request $request, $id)
    {
        if ($request->has('data')) {
            FileDownload::whereIn('id', $request->data)->update(['status' => 'draft']);
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }
        FileDownload::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil Edit Data'
        ]);
    }
}
