<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $users = User::all();

        return view('backend.user.index', compact('users'));
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
        $data = $request->all();

        $users = new User;
        $users->nip = $data['nip'];
        $users->name = $data['name'];
        $users->username = $data['username'];
        $users->email = $data['email'];
        $users->password = $data['password'];
        $users->password = Hash::make($data['password']);
        $users->level = $data['level'];
       
        // ddd($users);
        $users->save();
        return redirect()->route('user.index')->with('alert', 'Successfully add user');
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
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
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
        $user = User::find($id);

        $validatedData = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $user->update($validatedData);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change($id)
    {
        $user = User::find($id);

        return view('backend.user.change', compact('user'));
    }
    public function dochange(Request $request, $id)
    {
        $user = User::find($id);

        $pass = $request->validate([
            'password' => 'required',
        ]);

        $user->update($pass);

        return redirect()->route('user.index');
    }

    public function nonaktif($id)
    {
        $data = User::find($id);
        User::where('id','=', $id)->update([
            'status' => 0 #Non-aktif Sukses
        ]);
        return redirect()->route('user.index');
    }

    public function aktif($id)
    {
        $data = User::find($id);
        User::where('id','=', $id)->update([
            'status' => 1 #Aktif Sukses
        ]);
        return redirect()->route('user.index');
    }
}
