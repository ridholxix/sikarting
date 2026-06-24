<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBobotRequest;
use App\Http\Requests\UpdateBobotRequest;
use App\Models\Bobot;
use App\Models\Gejala;
use App\Models\Stunting;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bobots = Bobot::with(['gejala','stunting'])->orderBy('kode')->paginate(15);
        return view('bobot.index', compact('bobots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gejalas = Gejala::orderBy('kode')->get();
        $stuntings = Stunting::orderBy('kode')->get();

        // Mencari kode terakhir
        $kodes = Bobot::get()->pluck('kode');
        $angka_pertama = (int) !$kodes->isEmpty() ? 1 : 0;
        $angka_terakhir = (int) substr($kodes->max(), 2);
        $urutan_ideal = collect(range($angka_pertama, $angka_terakhir))->map(fn($angka) => 'GS' . str_pad($angka, 3, '0', STR_PAD_LEFT));
        $last_kode = !$kodes->isEmpty() ? $urutan_ideal->diff($kodes)->values()->first() ?? str_increment($kodes->sort()->last()) : str_increment($urutan_ideal[0]);

        return view('bobot.create', [
            'gejalas' => $gejalas,
            'stuntings' => $stuntings,
            'last_kode' => $last_kode,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBobotRequest $request)
    {
        $validatedData = $request->validated();
        $gejala = Gejala::find($validatedData['gejala_id']);
        $stunting = Stunting::find($validatedData['stunting_id']);
        debug($validatedData);
        $gejala->stuntings()->attach($stunting, $validatedData);

        return redirect(route('bobots.index'))->with('success', "Data Probabilitas <strong>{$validatedData['kode']}</strong> di tambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(Bobot $bobot)
    {
        return view('bobot.show', [
            'bobot' => $bobot->load('gejala','stunting'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bobot $bobot)
    {
        return view('bobot.edit', [
            'bobot' => $bobot->load('gejala', 'stunting'),
            'gejalas' => Gejala::all(),
            'stuntings' => Stunting::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBobotRequest $request, Bobot $bobot)
    {
        $bobot = $bobot->load('gejala','stunting');
        $bobot->gejala->stuntings()->detach($bobot->stunting->id);

        $validatedData = $request->validated();

        $new_gejala = Gejala::find($validatedData['gejala_id']);
        $new_stunting = Stunting::find($validatedData['stunting_id']);

        $new_gejala->stuntings()->attach($new_stunting, $validatedData);

        return redirect(route('bobots.index'))->with('success', "Data Probabilitas <strong>{$validatedData['kode']}</strong> berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bobot $bobot)
    {
        $bobot->delete();
        return redirect(route('bobots.index'))->with('success', "Data probabilitas dengan kode <strong>{$bobot->kode}</strong> berhasil di hapus");
    }
}
