<?php

namespace App\Http\Controllers;

use App\Http\Requests\MutabaahRequest;
use App\Models\Mutabaah;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutabaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $url = "https://equran.id/api/surat";

        $response = $client->request('GET', $url, ['verify' => false]);
        $responseBody = json_decode($response->getBody());

        return view('pages.mutabaah.index', compact('responseBody'));
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
        $validatedData = $request->validate([
            'user_id' => 'numeric|not_in:0',
            'tanggal_isi' => 'date|required',
            'sholat_subuh' => 'required|in:0,1,2',
            'sholat_dzuhur' => 'required|in:0,1,2',
            'sholat_ashar' => 'required|in:0,1,2',
            'sholat_maghrib' => 'required|in:0,1,2',
            'sholat_isya' => 'required|in:0,1,2',
            'qobla_subuh' => 'required|in:0,1',
            'qobla_dzuhur' => 'required|in:0,1',
            'bada_dzuhur' => 'required|in:0,1',
            'bada_maghrib' => 'required|in:0,1',
            'bada_isya' => 'required|in:0,1',
            'tahajud' => 'required|in:0,1',
            'witir' => 'required|in:0,1',
            'dhuha' => 'required|in:0,1',
            'tarawih' => 'in:0,1',
            'shaum_sunnah' => 'required|in:0,1',
            'shaum_ramadhan' => 'in:0,1',
            'al_matsurat' => 'required|in:0,1',
            'infaq' => 'required|in:0,1',
            'baca_buku' => 'required|in:0,1',
            'kajian_keilmuan' => 'required|in:0,1',
            'tilawah_quran' => 'numeric|required|regex:/^[0-9]+$/',
            'tahfizh_quran' => 'required|in:0,1',
            'surah_terakhir' => 'required|not_in:null',
            'baca_terjemahan_quran' => 'required|in:0,1'
        ]);

        $dateNow = Carbon::now();


        if ($validatedData['tanggal_isi'] > $dateNow) {
            return redirect(route('user.evaluation.mutabaah'))->with('f_exceed_date_mutabaah', 'Oops, tanggal yang kamu isi melebihi tanggal sekarang: ' . $dateNow->isoFormat('dddd, D MMMM Y') . ' 😊');
        }
        // dd($dateOnDb);
        if (Mutabaah::whereHas('user', function ($query) {
            $query->where('id', Auth::user()->id);
        })->where('tanggal_isi', $validatedData['tanggal_isi'])->exists()) {
            return redirect(route('user.evaluation.mutabaah'))->with('f_date_mutabaah', 'Oops, tanggal yang kamu isi sudah ada 😊');
        }

        $mutabaah = Mutabaah::insert($validatedData);

        if ($mutabaah) {
            return redirect(route('dashboard'))->with('s_mutabaah', 'Data mutabaah kamu sudah masuk ke database 😁👍');
        }

        return redirect(route('dashboard'))->with('f_mutabaah', 'Oops, ada yang salah ketika input data, Tolong hubungi admin ya 😆');
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
        $mutabaahData = Mutabaah::where('user_id', Auth::user()->id)->whereBetween('tanggal_isi', [$startDate, $endDate])->get();

        if (request()->cari_data) {
            $startDate = new Carbon($request->cari_data);
            $endDate = new Carbon($request->cari_data);

            $startDate = $startDate->startOfMonth();
            $endDate = $endDate->endOfMonth();

            $mutabaahData = Mutabaah::where('user_id', Auth::user()->id)->whereBetween('tanggal_isi', [$startDate, $endDate])->get();
        }

        return view('pages.mutabaah.show', compact('mutabaahData'));
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
