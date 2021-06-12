<?php

namespace App\Http\Controllers;

use App\KasPengeluaran;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class KasPengeluaranController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('backend.kas_keluar.index');    
    }
    
    public function getData(){
        return Datatables::of(KasPengeluaran::all())->make(true);
    }

    public function store(Request $request) {
        $data=array(
        'id_user' => Auth::id(),
        'keperluan' => $request->post('keperluan'),
        'jumlah' => $request->post('jumlah'),
        'tanggal'=> $request->post('tanggal'),
        'keterangan'=> $request->post('keterangan'),
        );
        if($request->input('id')==''){
        DB::table('kas_pengeluaran')->insert($data);
        }else{
        DB::table('kas_pengeluaran')->where('id','=',$request->post('id'))->update($data);
        }
        return redirect()->route('kas-pengeluaran.index');
    }

    public function edit(Request $request) {
        $data = KasPengeluaran::find($request->get('id'));
        echo json_encode($data);
    }
    
    public function destroy($id){
        DB::table('kas_pengeluaran')->where('id', '=', $id)->delete();
    }
}
