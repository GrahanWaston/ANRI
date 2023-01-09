<?php

namespace App\Http\Controllers;

use App\Models\FileDownload;
use Illuminate\Http\Request;

class FileDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all SDM from Model
        $file = FileDownload::latest()->paginate(5);

        //passing SDM to view
        return view('admin.dashboard.publikasi.fileDownload', compact('file'));
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
    public function destroy($id)
    {
        $fileDownload = FileDownload::find($id);
        $fileDownload->delete();
        // User::destroy($user->id);
        return redirect('/publikasi-file')->with('success', 'File berhasil dihapus!');
    }

    public function approve_file($id)
    {

        FileDownload::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

        return redirect('/publikasi-file')->with('success', 'Publikasi File berhasil di publish');
    }

    public function unapprove_file($id)
    {

        FileDownload::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

        return redirect('/publikasi-file')->with('success', 'Publikasi File berhasil menjadi draft');
    }
}
