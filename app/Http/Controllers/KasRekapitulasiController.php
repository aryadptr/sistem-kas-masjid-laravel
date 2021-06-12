<?php

namespace App\Http\Controllers;

use App\KasPemasukan;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class KasRekapitulasiController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.kas_rekapitulasi.index');    
    }
    
    public function getData(){
        return Datatables::of(DB::table('kas_pemasukan')
        ->join('users', 'users.id', '=', 'kas_pemasukan.id_users')
        ->join('kas_pengeluaran' , 'users.id', '=', 'kas_pengeluaran.id_user' )
        ->select('kas_pemasukan.sumber', 'kas_pemasukan.jumlah','kas_pemasukan.tanggal',
        'kas_pengeluaran.keperluan','kas_pengeluaran.jumlah','kas_pengeluaran.tanggal')->get())->make(true);
    }
}
