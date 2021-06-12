<?php

namespace App\Http\Controllers;

use App\DanaSosialPengeluaran;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class DanaPengeluaranController extends Controller
{
    public function index(){
        return view('backend.dana_sosial_keluar.index');    
    }
    
    public function getData(){
        return Datatables::of(DanaSosialPengeluaran::all())->make(true);
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
        DB::table('dana_sosial_pengeluaran')->insert($data);
        }else{
        DB::table('dana_sosial_pengeluaran')->where('id','=',$request->post('id'))->update($data);
        }
        return redirect()->route('dana-pengeluaran.index');
    }

    public function edit(Request $request) {
        $data = DanaSosialPengeluaran::find($request->get('id'));
        echo json_encode($data);
    }
    
    public function destroy($id){
        DB::table('dana_sosial_pengeluaran')->where('id', '=', $id)->delete();
    }
}
