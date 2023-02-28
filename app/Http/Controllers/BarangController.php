<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class BarangController extends Controller
{
    public function index(){
        return view('BackEnd.Barang.index');
    }

    public function select(){
        try {
            $operation = Barang::where('barang_status',1)->get();
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(),true);
        }
    }

    public function insert(Request $request){
        try {
            $data = $request->all();
            // print_r($data);exit;
            $request->validate([
                'barang_nama'=> 'required',
                'barang_keterangan'=> 'required',
                'barang_stock'=> 'required',
                'barang_satuan'=> 'required',
                'barang_harga'=> 'required',
            ]);
            
            $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random());
            $data['barang_id'] = md5($uuid->toString());
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
                'barang_stock'=> 'required',
                'barang_satuan'=> 'required',
            ]);
            
            $data = $request->all();
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
