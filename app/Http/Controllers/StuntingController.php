<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStuntingRequest;
use App\Http\Requests\UpdateStuntingRequest;
use App\Models\Gejala;
use App\Models\Stunting;
use Illuminate\Http\Request;

class StuntingController extends Controller
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
        $stuntings = Stunting::orderBy('kode')->paginate(10);
        if(!empty(request()->query->get('search'))){
            $stuntings = Stunting::whereLike('nama', "%".request()->query->get('search') . "%")->orderBy('kode')->paginate(10);
        }
        return view('stunting.index', compact('stuntings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mencari kode terakhir
        $kodes = Stunting::get()->pluck('kode');
        $angka_pertama = (int) !$kodes->isEmpty() ? 1 : 0;
        $angka_terakhir = (int) substr($kodes->max(), 1);
        $urutan_ideal = collect(range($angka_pertama, $angka_terakhir))->map(fn($angka) => 'S' . str_pad($angka, 3, '0', STR_PAD_LEFT));
        $last_kode = !$kodes->isEmpty() ? $urutan_ideal->diff($kodes)->values()->first() ?? str_increment($kodes->sort()->last()) : str_increment($urutan_ideal[0]);

        return view('stunting.create', compact('last_kode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStuntingRequest $request)
    {
        Stunting::create($request->validated());
        return redirect(route('stuntings.index'))->with('success', "Stunting <strong>{$request['nama']}</strong> berhasil di tambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(Stunting $stunting)
    {
        $gejalas = $stunting->gejalas()->paginate(10);
        return view('stunting.show', ['stunting' => $stunting->load('gejalas'), 'gejalas' => $gejalas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stunting $stunting)
    {
        return view('stunting.edit', compact('stunting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStuntingRequest $request, Stunting $stunting)
    {
        $stunting->update($request->validated());
        return redirect(route('stuntings.index'))->with('success', "Stunting <strong>{$request['nama']}</strong> berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stunting $stunting)
    {
        $stunting->delete();
        return redirect(route('stuntings.index'))->with('success', "Stunting <strong>{$stunting->nama}</strong> berhasil di hapus");
    }
}
