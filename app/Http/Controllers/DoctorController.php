<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): View
    // {
    //     // $data = Doctor::all(); // SELECT * FROM / memanggil semua data
    //     // $data = Doctor::latest()->get(['uuid', 'name', 'email', 'phone']); // untuk memanggil field yang perlu
    //     // paginasi
    //     $data = Doctor::latest()->select(['uuid', 'name', 'email', 'phone'])->paginate(8); // untuk memanggil field yang perlu
    //     // dd($data); // sama seperti var_dump/print_r

    //     return view('doctor.index', [
    //         'doctors' => $data
    //     ]);
    // }

    public function index(Request $request): View
    {
        // Inisialisasi query untuk mengambil data dokter
        $query = Doctor::query();

        // Cek apakah input 'search' diisi
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Pencarian menggunakan LIKE pada kolom 'name' atau 'email'
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        // Jalankan query dengan paginasi
        $doctors = $query->latest()->select(['uuid', 'name', 'email', 'phone'])->paginate(8);

        // Kirim data ke view
        return view('doctor.index', [
            'doctors' => $doctors,
            'search' => $request->search, // Mengirimkan kembali nilai pencarian ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->only(['name', 'email', 'phone', 'gender']);

        // $data['uuid'] = Str::uuid();
        // Doctor::create($data);

        // return redirect('/doctor');

        $data = $request->only(['name', 'email', 'phone', 'gender']);

        try {
            $data['uuid'] = Str::uuid();
            Doctor::create($data);
            return redirect('/doctor')->with('success', 'Doctor created successfully');
        } catch (\Exception $error) {
            return redirect('/doctor/create')->with('error', $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Doctor::where('uuid', $id)->firstOrFail(); //firstOrFail() bisa juga pakai first() aja tapi gunakan if
        // if (!$data) {
        //     abort(404);
        //     return redirect('/doctor');
        // }

        return view('doctor.show', [
            'doctor' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('doctor.edit', [
            'doctor' => Doctor::where('uuid', $id)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Doctor::where('uuid', $id)->firstOrFail();
            $data->update($request->only(['name', 'email', 'phone', 'gender']));
            return redirect('/doctor')->with('success', 'Doctor updated successfully');
        } catch (\Exception $error) {
            return redirect('doctor/' . $id . '/edit')->with('error', $error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Doctor::where('uuid', $id)->firstOrFail();
            $data->delete();
            return redirect('/doctor')->with('success', 'Doctor deleted successfully');
        } catch (\Exception $error) {
            return redirect('/doctor')->with('error', $error->getMessage());
        }
    }
}
