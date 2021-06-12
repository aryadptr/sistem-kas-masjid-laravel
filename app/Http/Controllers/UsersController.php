<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('backend.users.index');    
    }
    
    public function getData(){
        return Datatables::of(User::all())->make(true);
    }

    public function store(Request $request) {
        $data=array(
        'name' => $request->post('name'),
        'email' => $request->post('email'),
        'phone'=> $request->post('phone'),
        'level'=> $request->post('level'),
        'password'=> bcrypt($request->post('password')),
        );
        if($request->input('id')==''){
        DB::table('users')->insert($data);
        }else{
        DB::table('users')->where('id','=',$request->post('id'))->update($data);
        }
        return redirect()->route('users.index');
    }

    public function edit(Request $request) {
        $data = User::findOrFail($request->get('id'));
        echo json_encode($data);
    }
    public function destroy($id){
        DB::table('users')->where('id', '=', $id)->delete();
    }
}
