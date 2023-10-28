<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RumahSakit;

class HomeController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        $rumahSakit = RumahSakit::all();
        return view('pages/home', ['pasien'=>$pasien , 'rumahSakit'=>$rumahSakit]);
    }
}
