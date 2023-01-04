<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.user.manajemen_user', [
            'total_user' => User::count(),
            'user' => User::oldest()->get()
        ]);
    }


    public function changePassword()
    {
        return view('admin.dashboard.password.change_password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'password_lama' => 'required|min:8|max:10',
            'password_baru' => 'required|min:8|max:10',
        ]);


        #Match The Old Password
        if (!Hash::check($request->password_lama, auth()->user()->password)) {
            return back()->with("error", "Password lama tidak cocok!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect()->back()->with("success", "Password berhasil di update!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = User::all();
        return view('admin.dashboard.user.manajemen_user_add
        ', compact('data_user'));
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
            'name' => 'required',
            'username' => 'required|min:3|max:50',
            'role' => 'required',
            'password' => 'required|min:8|max:10',
            'status' => 'required'
        ]);

        // dd('Registrasi Berhasil');

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/manajemen-user')->with('success', 'User berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user = User::find($id);
        return view('admin.dashboard.user.manajemen_user_form
        ', compact('data_user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        // $request->session()->flash();

        return redirect('/manajemen-user')->with('success', 'Update berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete()->flash('success', 'Delete berhasil !');

        return redirect('/manajemen-user');
    }
}
