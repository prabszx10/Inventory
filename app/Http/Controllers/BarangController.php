<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    public function index(){
        return view('BackEnd.Barang.index');
    }

    public function select(){
        try {
            if(isset($_GET['id'])){
                $operation = Barang::where('barang_id',$_GET['id'])->where('barang_status',1)->get();
            } else{
                $operation = Barang::where('barang_status',1)->get();
            }
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(),true);
        }
    }

    public function insert(Request $request){
        try {
            $data = $request->all();
            $request->validate([
                'barang_nama'=> 'required',
                'barang_keterangan'=> 'required',
                'barang_satuan'=> 'required',
                'barang_harga'=> 'required',
            ]);
            
            $operation = Barang::create($data);
            return $this->responseCreate($operation);
        } catch (\Exception $e) {
            return $this->responseCreate($e->getMessage(),true);
        }
    }

    public function update(Request $request){
        try {
            $request->validate([
                'barang_nama'=> 'required',
                'barang_keterangan'=> 'required',
                'barang_satuan'=> 'required',
            ]);
            
            $data = $request->all();
            unset($data['_token']);
            $operation = Barang::where('barang_id',$data['barang_id'])->update($data);

            return $this->responseUpdate($operation);
        } catch (\Exception $e) {
            return $this->responseUpdate($e->getMessage(),true);
        }
    }

    public function delete(Request $request){
        try {            
            $data = $request->all();
            $data['barang_status'] = 0;
            $operation = Barang::where('barang_id',$data['barang_id'])->update($data);

            return $this->responseDelete($operation);
        } catch (\Exception $e) {
            return $this->responseDelete($e->getMessage());
        }
    }
}
