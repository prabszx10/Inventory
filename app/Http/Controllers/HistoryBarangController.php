<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HistoryBarang;
use App\Models\Barang;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class HistoryBarangController extends Controller
{
    public function select(Request $request){
        try {
            $data = $request->all();
            if(!isset($data['history_barang_status'])){
                $operation = HistoryBarang::all();
            } else{
                $operation = HistoryBarang::where('history_barang_status',$data['history_barang_status'])->get();
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
                'history_barang_barang_id'=> 'required',
                'history_barang_stock'=> 'required',
                'history_barang_status'=> 'required',
            ]);
            
            $check_barang = Barang::where('barang_id',$data['history_barang_barang_id'])->first();
            if($check_barang){
                $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random());
                $data['history_barang_id'] = md5($uuid->toString());
                $data['history_barang_barang_id'] = $check_barang['barang_id'];
                if($data['history_barang_status'] == 'masuk'){
                    $barang['barang_stock'] = $check_barang['barang_stock'] + $data['history_barang_stock'];
                } else{
                    $barang['barang_stock'] = $check_barang['barang_stock'] - $data['history_barang_stock'];
                }

                DB::transaction(function () use($data,$barang) {
                    $history_barang = HistoryBarang::create($data);
                    $barang_stock = Barang::where('barang_id', $data['history_barang_barang_id'])->update($barang);               
                });

                $operation['success'] = true;
                return $this->responseCreate($operation);             
            } else{
                return $this->responseCreate('Barang Tidak Tersedia',true);
            }
        } catch (\Exception $e) {
            return $this->responseCreate($e->getMessage(),true);
        }
    }

    public function delete(Request $request){
        try {
            $data = $request->all();

            $history_barang = HistoryBarang::where('history_barang_id', $data['history_barang_id'])->first();
            $barang_find = Barang::where('barang_id', $history_barang['history_barang_barang_id'])->first();
            $barang['barang_stock'] = $barang_find['barang_stock'] - $history_barang['history_barang_stock'];

            DB::transaction(function () use($data,$barang,$barang_find) {
                $delete = HistoryBarang::where('history_barang_id', $data['history_barang_id'])->delete();
                $barang_stock = Barang::where('barang_id', $barang_find['barang_id'])->update($barang);               
            });

            $operation['success'] = true;
            return $this->responseDelete($operation);  
        } catch (\Exception $e) {
            return $this->responseDelete($e->getMessage(),true);
        }
    }
}
