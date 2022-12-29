<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.slideshow.slideshow_page', [
            'slideshow' => Slideshow::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.slideshow.slideshow_add');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'tautan' => 'required',
            'image_dekstop' => 'required|image|mimes:jpeg,png,jpg',
            'image_mobile' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        if ($request->hasFile('image_dekstop') && $request->hasFile('image_mobile')) {
            $validateData['image_dekstop'] = $request->file('image_dekstop')->store('img');
            $validateData['image_mobile'] = $request->file('image_mobile')->store('img');
            // return $validateData;
        }
        
        // dd('Registrasi Berhasil');  
        // return redirect($validateData);

        Slideshow::create($validateData);

        return redirect('/slideshow')->with('success', 'Slideshow berhasil di tambahkan');
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
        $data_slideshow = Slideshow::find($id);
        return view('admin.dashboard.slideshow.slideshow_update', compact('data_slideshow', 'id'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'tautan' => 'required',
            'image_dekstop' => 'image|mimes:jpeg,png,jpg',
            'image_mobile' => 'image|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);

        if ($request->hasFile('image_dekstop') && $request->hasFile('image_mobile')) {
            // if ($request->oldImageDekstop && $request->oldImageMobile) {
               
            //     Storage::delete($request->oldImageDektsop);
            //     Storage::delete($request->oldImageMobile);
            // }
            $validateData['image_dekstop'] = $request->file('image_dekstop')->store('img');
            $validateData['image_mobile'] = $request->file('image_mobile')->store('img');
            // return $validateData;
        }
        
        // dd($validateData);  
        // return redirect($validateData);

        Slideshow::where('id', $id)->update($validateData);

        return redirect('/slideshow')->with('success', 'Slideshow berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideshow = Slideshow::find($id);
        $slideshow->delete();
        // User::destroy($user->id);
        return redirect('/slideshow')->with('success', 'Slideshow berhasil dihapus!');
    }

    public function approve_slideshow($id)
    {

        Slideshow::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

            return redirect('/slideshow')->with('success', 'Slideshow berhasil di publish');
    }

    public function unapprove_slideshow($id)
    {

        Slideshow::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

            return redirect('/slideshow')->with('success', 'Slideshow berhasil menjadi draft');
    }
}
