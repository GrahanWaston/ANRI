<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all SDM from Model
        $publication = Publication::latest()->get();

        //passing SDM to view
        return view('admin.dashboard.publikasi.publikasi_page', compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.publikasi.publikasi_form');
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
            'body' => 'required',
            'status' => 'required',
            'image_main' => 'required|image|mimes:jpeg,png,jpg',
            'image_album' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $validateData['slug'] = Str::slug($validateData['title']);

        if ($request->hasFile('image_main') && $request->hasFile('image_album')) {
            $validateData['image_main'] = $request->file('image_main')->store('img');
            $validateData['image_album'] = $request->file('image_album')->store('img');
        }

        Publication::create($validateData);

        return redirect('/publikasi')->with('success', 'Publikasi berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dashboard.publikasi.publikasi_update', [
            'category' => Category::get(),
            'data_publication' => Publication::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        $validateData['slug'] = Str::slug($validateData['title']);

        if ($request->hasFile('image_main') || $request->hasFile('image_album')) {
            $validateData['image_main'] = $request->file('image_main')->store('img');
            // $validateData['image_album'] = $request->file('image_album')->store('img');
        }

        Publication::where('id', $id)->update($validateData);

        return redirect('/publikasi')->with('success', 'Publikasi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publikasi = Publication::find($id);
        $publikasi->delete();
        // User::destroy($user->id);
        return redirect('/publikasi')->with('success', 'Publikasi berhasil dihapus!');
    }

    public function approve_publikasi($id)
    {

        Publication::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

            return redirect('/publikasi')->with('success', 'Publikasi berhasil di publish');
    }

    public function unapprove_publikasi($id)
    {

        Publication::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

            return redirect('/publikasi')->with('success', 'Publikasi berhasil menjadi draft');
    }
}
