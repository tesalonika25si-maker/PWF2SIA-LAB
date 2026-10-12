<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan; // Pastikan Model Pelanggan di-import
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Menampilkan daftar pelanggan.
     */
    public function index()
    {
        // Mengambil semua data pelanggan dari database
        $pelanggan = Pelanggan::all();

        // Mengirim data ke view index (resources/views/pelanggan/index.blade.php)
        return view('admin.pelanggan.create');
    }

    /**
     * Menampilkan form untuk menambah pelanggan baru.
     */
    public function create()
    {
        // Menampilkan view form tambah (resources/views/pelanggan/create.blade.php)
        return view('pelanggan.create');
    }

    /**
     * Menyimpan data pelanggan baru ke database.
     */
    public function store(Request $request)
    {
    //dd($request->all());

		$data['first_name'] = $request->first_name;
		$data['last_name'] = $request->last_name;
		$data['birthday'] = $request->birthday;
		$data['gender'] = $request->gender;
		$data['email'] = $request->email;
		$data['phone'] = $request->phone;

		Pelanggan::create($data);

		return redirect()->route('pelanggan.index')->with('success','Penambahan Data Berhasil!');

}

    /**
     * Menampilkan detail pelanggan tertentu.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Menampilkan form untuk mengedit pelanggan.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Memperbarui data pelanggan di database.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'birthday'   => 'nullable|date',
        'gender'     => 'nullable|string',
        'email'      => 'required|email|unique:pelanggan,email,' . $id . ',pelanggan_id', // <-- Sesuaikan tabel dan primary key
        'phone'      => 'nullable|string|max:20',
    ]);

    $pelanggan = Pelanggan::findOrFail($id);
    $pelanggan->update($request->all());

    return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui!');
}
    /**
     * Menghapus data pelanggan dari database.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
