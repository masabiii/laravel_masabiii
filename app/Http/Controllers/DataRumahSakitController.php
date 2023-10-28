<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RumahSakit;

class DataRumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakit = DB::table('rumah_sakits')->get();
        return view('pages/dataRumahSakit', ['rumahSakit' => $rumahSakit]);
    }

    public function tambahRumahSakit()
    {
        return view('pages/tambahRumahSakit');
    }

    public function simpanRumahSakit(Request $request)
    {
        $r = new RumahSakit;
        $r->nama_rumahsakit = $request->nama_rumahSakit;
        $r->alamat = $request->alamat;
        $r->email = $request->email;
        $r->telepon = $request->telepon;
        $r->save();
        return redirect('dataRumahSakit')->with('success', 'Rumah Sakit Berhasil Ditambahkan');
    }

    public function editRumahSakit($id)
    {
        $rumahSakit = RumahSakit::find($id);
        return view('pages/editRumahSakit', ['rumahSakit' => $rumahSakit]);
    }

    public function updateRumahSakit(Request $request, $id)
    {
        $rumahSakit = RumahSakit::findorfail($id);
        $rumahSakit->update($request->all());
        return redirect('dataRumahSakit')->with('success', 'Data Rumah Sakit Berhasil Diedit');
    }

    public function hapusRumahSakit($id)
    {
        $rumahSakit = RumahSakit::find($id);

        if (!$rumahSakit) {
            return response()->json(['success' => false]);
        }

        $rumahSakit->delete();

        return redirect('dataRumahSakit');
    }
}
