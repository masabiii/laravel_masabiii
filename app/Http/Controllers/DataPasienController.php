<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RumahSakit;
use App\Models\Pasien;

class DataPasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        $pasien = Pasien::with('rumahSakit')->get();
        $rumahSakit = DB::table('rumah_sakits')->get();
        return view('pages/dataPasien', ['pasien' => $pasien, 'rumahSakit' => $rumahSakit]);
    }

    public function apiRumahSakit()
    {
        $rumahSakit = RumahSakit::all();
        return response()->json($rumahSakit);
    }

    public function tambahPasien()
    {
        $rumahSakit = RumahSakit::all(); 
        return view('pages/tambahPasien', ['rumahSakit' => $rumahSakit]); 
    }

    public function simpanPasien(Request $request)
    {
        $pasien = new Pasien([
            'nama_pasien' => $request->get('nama_pasien'),
            'alamat' => $request->get('alamat'),
            'no_telepon' => $request->get('no_telepon'),
            'id_rumahSakit' => $request->get('id_rumahSakit'),
        ]);

        $pasien->save();

        return redirect('dataPasien')->with('success', 'Data Pasien Berhasil Ditambahkan');
    }

    public function editPasien($id)
    {
        $pasien = Pasien::find($id);
        $rumahSakit = DB::table('rumah_sakits')->get();
        return view('pages/editPasien', ['pasien' => $pasien, 'rumahSakit' => $rumahSakit]);

    }

    public function updatePasien(Request $request, $id)
    {
        $pasien = Pasien::findorfail($id);
        $pasien->update($request->all());
        return redirect('dataPasien')->with('success', 'Data Pasien Berhasil Diedit');
    }

    public function hapusPasien($id)
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['success' => false]);
        }

        $pasien->delete();

        // return response()->json(['success' => true]);
        return redirect('dataPasien');
    }


}
