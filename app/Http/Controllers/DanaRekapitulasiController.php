<?php

namespace App\Http\Controllers;

use App\DanaPemasukan;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class DanaRekapitulasiController extends Controller
{
    public function index(){
        return view('backend.dana_sosial_rekapitulasi.index');    
    }
    
    public function getData(){
        return Datatables::of(DB::table('dana_sosial_pemasukan')
        ->join('users', 'users.id', '=', 'dana_sosial_pemasukan.id_users')
        ->join('dana_sosial_pengeluaran' , 'users.id', '=', 'dana_sosial_pengeluaran.id_user' )
        ->select('dana_sosial_pemasukan.sumber', 'dana_sosial_pemasukan.jumlah','dana_sosial_pemasukan.tanggal',
        'dana_sosial_pengeluaran.keperluan','dana_sosial_pengeluaran.jumlah','dana_sosial_pengeluaran.tanggal')->get())->make(true);
    }
}
