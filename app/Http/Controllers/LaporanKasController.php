<?php

namespace App\Http\Controllers;

use App\KasPemasukan;
use App\KasPengeluaran;
use App\User;
use App\Users;
use Auth;
use DB;
use PDF;
use Illuminate\Http\Request;

class LaporanKasController extends Controller
{
    public function index(){
        return view('backend.cetak_laporan.kas');
    }

    public function laporanKas($tanggal_awal, $tanggal_akhir){
        $kasmasuk = KasPemasukan::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        $kaskeluar = KasPengeluaran::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        return view('backend.cetak_laporan.data-kas', compact('kasmasuk', 'kaskeluar', 'pdf'));
    }
}
