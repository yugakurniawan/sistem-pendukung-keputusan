<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
// use Validator;
use Illuminate\Support\Facades\Validator;
use \App\Helper\Alert;
use \App\Model\Warga;
use \App\User;
use Illuminate\Http\Request;

class wargaController extends Controller
{
    //
    public function index()
    {
        # code...

        return Datatables::of(Warga::all())
                ->setRowId(function(Warga $warga){
                    return $warga->id;
                })->addColumn('aksi','admin.mahasiswa.action-button')
                ->rawColumns(['aksi'])
                ->make(true);
         }

    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
            "id"=> "required|numeric|exists:warga,id"
        ]);
        $response = ['ok'=>true];
        if($validator->fails()){
            $response['ok'] = false;
            $response['msg'] = "Id tidak valid";
        }else{
            Warga::find($request->input('id'))->delete();
            $response['msg'] = "berhasil menghapus data";
        }
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        # code...
        $res = ['stored'=>true];
        $validator = Validator::make($request->all(),[
            "nama" => "required|min:3",
            'usia' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required',
            'pendapatan' => 'required|integer',
            'status_tinggal' => 'required',
            'tanggungan' => 'required|numeric'
        ]);
        if($validator->fails()){
            $res['msg'] = Alert::errorList($validator->errors());
            $res['stored'] = false;
        }else{
            $warga = new Warga();
            $warga->nama = $request->input("nama");
            $warga->usia = $request->input('usia');
            $warga->status_pernikahan = $request->input('status_pernikahan');
            $warga->pekerjaan = $request->input('pekerjaan');
            $warga->pendapatan = $request->input('pendapatan');
            $warga->status_tinggal = $request->input('status_tinggal');
            $warga->tanggungan = $request->input('tanggungan');
            $warga->save();
            $res['msg'] = Alert::success("Berhasil Menambahkan Data");
        }

        return response()->json($res, 200);
    }
    public function update(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(),[
            "name" => "required|min:3",
            'email' => 'required|email|max:60',
            'role' => 'required'
        ]);

        $response = ["stored"=>true];
        
        if($validator->fails()){
            $response['stored'] = false;
            $response['msg']    = Alert::errorList($validator->errors());
        }else{
            $user = User::find($request->input('id'));
            if($user){

                
                $user->name = $request->input("name");
                $user->email = $request->input('email');
                $user->save();
                $user->role()->sync($request->input('role'));
                $response['msg'] = Alert::success("Berhasil Memperbarui Data Portofolio");
            }else{
                $response['stored'] = false;
                $response['msg']    = Alert::errorList("Data tidak ditemukan");
            }
        }
        return response()->json($response, 200);
    }
}
