<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGejalaRequest;
use App\Http\Requests\UpdateGejalaRequest;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class GejalaController extends Controller
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
        $gejalas = Gejala::orderBy('kode')->paginate(10);
        if(!empty(request()->query->get('search'))){
            $gejalas = Gejala::whereLike('nama', "%".request()->query->get('search') . "%")->orderBy('kode')->paginate(10);
        }
        return view('gejala.index', compact('gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mencari kode terakhir
        $kodes = Gejala::get()->pluck('kode');
        $angka_pertama = (int) !$kodes->isEmpty() ? 1 : 0;
        $angka_terakhir = (int) substr($kodes->max(), 1);
        $urutan_ideal = collect(range($angka_pertama, $angka_terakhir))->map(fn($angka) => 'G' . str_pad($angka, 3, '0', STR_PAD_LEFT));
        $last_kode = !$kodes->isEmpty() ? $urutan_ideal->diff($kodes)->values()->first() ?? str_increment($kodes->sort()->last()) : str_increment($urutan_ideal[0]);

        return view('gejala.create', compact('last_kode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGejalaRequest $request)
    {
        Gejala::create($request->validated());
        return redirect(route('gejalas.index'))->with('success', "Gejala <strong>{$request['nama']}</strong> berhasil di tambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        return view('gejala.show', compact('gejala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        return view('gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGejalaRequest $request, Gejala $gejala)
    {
        $gejala->update($request->validated());
        return redirect(route('gejalas.index'))->with('success', "Gejala <strong>{$request['nama']}</strong> berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect(route('gejalas.index'))->with('success', "Gejala <strong>{$gejala->nama}</strong> berhasil di delete");
    }
}
