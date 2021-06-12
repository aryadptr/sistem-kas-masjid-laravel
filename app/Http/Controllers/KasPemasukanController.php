<?php

namespace App\Http\Controllers;

use App\KasPemasukan;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class KasPemasukanController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.kas_masuk.index');    
    }
    
    public function getData(){
        return Datatables::of(KasPemasukan::all())->make(true);
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
        DB::table('kas_pemasukan')->insert($data);
        }else{
        DB::table('kas_pemasukan')->where('id','=',$request->post('id'))->update($data);
        }
        return redirect()->route('kas-pemasukan.index');
    }

    public function edit(Request $request) {
        // $data = DB::table('kas_pemasukan')->where('id_kas_pemasukan')->get();
        $data = KasPemasukan::find($request->get('id'));
        echo json_encode($data);
    }
    
    public function destroy($id){
        DB::table('kas_pemasukan')->where('id', '=', $id)->delete();
    }
}
