<?php

namespace App\Http\Controllers;

use App\DanaSosialPemasukan;
use App\DanaSosialPengeluaran;
use App\User;
use App\Users;
use Auth;
use DB;
use PDF;
use Illuminate\Http\Request;

class LaporanDanaSosialController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('backend.cetak_laporan.dana');
    }

    public function laporanDanaSosial($tanggal_awal, $tanggal_akhir){
        $danamasuk = DanaSosialPemasukan::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        $danakeluar = DanaSosialPengeluaran::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        return view('backend.cetak_laporan.data-dana-sosial', compact('danamasuk', 'danakeluar'));
    }
}
