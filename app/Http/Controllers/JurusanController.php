<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('mahasiswa.jurusan.index', ['jurusans' => jurusan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('mahasiswa.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // menghubungkan Kebijakan yang hanya boleh menambah data
        $this->authorize('create', Jurusan::class);

        $validate = $request->validate([
            'nama_jurusan' => 'required',
            'nama_dekan' => 'required',
            'jumlah_mahasiswa' => 'required|min:10|integer',
        ]);

        Jurusan::create($validate);
        return redirect()->route('home')->with('message', "Jurusan {$request->nama_jurusan} berhasil di tambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan): Response
    {
        return response()->view('mahasiswa.jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return response()->view('mahasiswa.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validate = $request->validate([
            'nama_jurusan' => 'required',
            'nama_dekan' => 'required',
            'jumlah_mahasiswa' => 'required|min:10|integer',
        ]);

        $jurusan->update($validate);
        return redirect('/mahasiswa/jurusan/' . $jurusan->id)->with('message', "Jurusan {$request->nama_jurusan} berhasil di update!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan): Response
    {
        $jurusan->delete();
        return redirect()->route('home')->with('message', "Jurusan {$jurusan->nama_jurusan} berhasil di hapus");
    }
}