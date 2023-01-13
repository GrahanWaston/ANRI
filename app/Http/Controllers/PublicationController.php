<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get all SDM from Model
        $publications = Publication::with('category')->latest()->get();
        if ($request->ajax()) {
            return DataTables::of($publications)->addIndexColumn()
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

        //passing SDM to view
        return view('admin.dashboard.publikasi.publikasi_page');
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
    public function destroy(Request $request, $id)
    {
        try {
            if ($request->has('data')) {
                Publication::whereIn('id', $request->data)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Dihapus'
                ]);
            }
            $publication = Publication::find($id);
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

    public function approve_publikasi(Request $request, $id)
    {
        if ($request->has('data')) {
            Publication::whereIn('id', $request->data)->update(['status' => 'published']);
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }
        Publication::where('id', $id)
            ->where('status', 'draft')
            ->update(['status' => 'published']);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil Publish Data'
        ]);
    }

    public function unapprove_publikasi(Request $request, $id)
    {
        if ($request->has('data')) {
            Publication::whereIn('id', $request->data)->update(['status' => 'draft']);
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }
        Publication::where('id', $id)
            ->where('status', 'published')
            ->update(['status' => 'draft']);

        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil draft Data'
        ]);
    }
}
