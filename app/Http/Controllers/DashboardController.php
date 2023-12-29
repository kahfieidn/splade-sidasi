<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LaporIzin;
use App\Models\LaporIzinOss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function homepage(){
        return view('homepage.index');
    }


    //
    public function index()
    {
        $jumlah_lapor_izin_non_oss = LaporIzin::all()->where('user_id', Auth::id())->count();
        $get_jumlah_lapor_izin_oss = LaporIzinOss::all()->where('user_id', Auth::id())->pluck('jumlah_data');
        $jumlah_lapor_izin_oss = $get_jumlah_lapor_izin_oss->sum();
        $jumlah_user = User::all()->count();
        $username = Auth::user()->name;
        return view('dashboard', [
            'jumlah_lapor_izin_non_oss' => $jumlah_lapor_izin_non_oss,
            'jumlah_lapor_izin_oss' => $jumlah_lapor_izin_oss,
            'jumlah_user' => $jumlah_user,
            'username' => $username,
        ]);
    }
}
