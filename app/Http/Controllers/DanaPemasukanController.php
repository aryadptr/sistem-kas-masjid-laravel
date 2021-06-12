<?php

namespace App\Http\Controllers;

use App\DanaSosialPemasukan;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class DanaPemasukanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.dana_sosial_masuk.index');    
    }
    
    public function getData(){
        return Datatables::of(DanaSosialPemasukan::all())->make(true);
    }

    public function store(Request $request) {
        $data=array(
        'id_users' => Auth::id(),
        'sumber' => $request->post('sumber'),
        'jumlah' => $request->post('jumlah'),
        'tanggal'=> $request->post('tanggal'),
        'keterangan'=> $request->post('keterangan'),
        );
        if($request->input('id')==''){
        DB::table('dana_sosial_pemasukan')->insert($data);
        }else{
        DB::table('dana_sosial_pemasukan')->where('id','=',$request->post('id'))->update($data);
        }
        return redirect()->route('dana-pemasukan.index');
    }

    public function edit(Request $request) {
        // $data = DB::table('kas_pemasukan')->where('id_kas_pemasukan')->get();
        $data = DanaSosialPemasukan::find($request->get('id'));
        echo json_encode($data);
    }
    
    public function destroy($id){
        DB::table('dana_sosial_pemasukan')->where('id', '=', $id)->delete();
    }
}
