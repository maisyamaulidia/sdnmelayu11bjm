<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskul = Ekskul::all();
        return view('admin.ekskul.index', compact('ekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'waktu_kegiatan' => 'required',
            'pembina' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('ekskul', 'public');
        }

        Ekskul::create($data);

        return redirect()->route('admin.ekskul.index')->with('success', 'Data berhasil ditambahkan');
    }
}
