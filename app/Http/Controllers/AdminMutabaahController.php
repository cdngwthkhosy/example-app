<?php

namespace App\Http\Controllers;

use App\Models\Mutabaah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function GuzzleHttp\Promise\all;

class AdminMutabaahController extends Controller
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

        return view('pages.superadmin.mutabaah', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $mutabaahData = Mutabaah::where('user_id', $request->user)->whereBetween('tanggal_isi', [$startDate, $endDate])->with('user')->get();

        // $userData = User::where('id', $request->user)->get();

        if (request()->cari_data) {
            $startDate = new Carbon($request->cari_data);
            $endDate = new Carbon($request->cari_data);

            $startDate = $startDate->startOfMonth();
            $endDate = $endDate->endOfMonth();

            $mutabaahData = Mutabaah::where('user_id', 2)->whereBetween('tanggal_isi', [$startDate, $endDate])->with('user')->get();
        }

        return view('pages.superadmin.mutabaah.show', compact('mutabaahData'));
    }

    public function filter(Request $request)
    {
        return view('pages.superadmin.mutabaah.show', compact('mutabaahData', 'userData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
