<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
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
        $users = User::whereHas('roles', function($query) {
            $query->where('name', '!=' ,'super-admin');
        })->get();
        $units = Unit::get();

        return view('pages.superadmin.user', compact('users', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::get();
        return view('pages.superadmin.users.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        $validatedData = $request->validate([
            'nik' => 'required|digits_between:6,7|numeric',
            'name' => 'required|max:255|string',
            'email' => 'required|email:dns',
            'phone' => 'required|numeric|digits_between:11,12',
            'birthplace' => 'required|string',
            'dob' => 'required|date',
            'education' => 'required|string|in:SD/SMP,SMA/SMK,D3,S1,S2,S3|not_in:null',
            'unit_id' => 'required|numeric|not_in:null',
            'password' => 'required'
        ]);

        if ($request->tmt == null) {
            $validatedData['tmt'] = '0001-01-01';
        } else {
            $validatedData['tmt'] = $request->tmt;
        }

        // dd($validatedData);

        $user = User::create([
            'nik' => $validatedData['nik'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'birthplace' => $validatedData['birthplace'],
            'dob' => $validatedData['dob'],
            'education' => $validatedData['education'],
            'tmt' => $validatedData['tmt'],
            'unit_id' => $validatedData['unit_id'],
            'password' => Hash::make($validatedData['password']) 
        ]);

        $user->assignRole('user');

        if ($user) {
            return redirect(route('admin.manajemen.user'))->with('user_success', 'User telah berhasil ditambahkan 😆');
        }

        return redirect(route('admin.manajemen.user'))->with('user_failed', 'Oops, ada yang salah, tolong hubungi admin ya 😊');
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
        $user = User::where('id', $id)->get();
        $units = Unit::get();

        return view('pages.superadmin.users.edit', compact('user', 'units'));
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
        $validatedData = $request->validate([
            // 'nik' => 'digits_between:6,7|numeric|unique:users,nik,'.$user->nik,
            'name' => 'max:255|string',
            // 'email' => 'email:dns|unique:users,email,'.$user->email,
            'phone' => 'numeric|digits_between:11,12',
            'birthplace' => 'string',
            'dob' => 'date',
            'education' => 'string|in:SD/SMP,SMA/SMK,D3,S1,S2,S3|not_in:null',
            'tmt' => 'date',
            'unit_id' => 'numeric|not_in:null',
            // 'password' => 'string'
        ]);

        $user = User::where('id', $id)->update([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'birthplace' => $validatedData['birthplace'],
            'dob' => $validatedData['dob'],
            'education' => $validatedData['education'],
            'tmt' => $validatedData['tmt'],
            'unit_id' => $validatedData['unit_id'],
            'password' => Hash::make($request['password']),
        ]);

        if ($user) {
            return redirect(route('admin.manajemen.user'))->with('updated_user', 'User telah diperbaharui 😆');
        }

        return redirect(route('admin.manajemen.user'))->with('f_update_user', 'User gagal diperbaharui 😢');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();

        if ($user) {
            return redirect(route('admin.manajemen.user'))->with('deleted_user', 'User telah dihapus 😆');
        }

        return redirect(route('admin.manajemen.user'))->with('f_delete_user', 'User gagal dihapus 😢');
    }
}
