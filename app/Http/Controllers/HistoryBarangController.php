<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HistoryBarang;
use App\Models\Barang;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;

class HistoryBarangController extends Controller
{
    public function index(){
        return view('BackEnd.PengolahanBarang.index');
    }

    public function select(Request $request){
        try {
            $data = $request->all();
            if(!isset($data['history_barang_status'])){
                $operation = HistoryBarang::all();
            } else{
                if(isset($data['history_barang_barang_id'])){
                    $operation = HistoryBarang::where('history_barang_barang_id',$data['history_barang_barang_id'])->where('history_barang_status',$data['history_barang_status'])->get();
                } else{
                    $operation = HistoryBarang::where('history_barang_status',$data['history_barang_status'])->get();

                }
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

    public function selectFilter(Request $request){
        try {
            $data = $request->all();

            $where = array();
            foreach($data as $key =>$value){
                if(isset($value)){
                    if($key == 'tanggal_awal'){
                        $condition = ['history_barang_tanggal','>=',$value];
                    } else if($key == 'tanggal_akhir'){
                        $condition = ['history_barang_tanggal','<=',$value];
                    } else{
                        $condition = [$key,$value];
                    }
                    array_push($where,$condition);
                }
            }
            $operation = HistoryBarang::with('barang')->where($where)->get();

            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(),true);
        }
    }

    public function Export(Request $request){
        try {
            $data = $request->all();
            $where = array();
            foreach($data as $key =>$value){
                if(isset($value)){
                    if($key == 'tanggal_awal'){
                        $condition = ['history_barang_tanggal','>=',$value];
                    } else if($key == 'tanggal_akhir'){
                        $condition = ['history_barang_tanggal','<=',$value];
                    } else{
                        $condition = [$key,$value];
                    }
                    array_push($where,$condition);
                }
            }

            $history_barang = HistoryBarang::with('barang')->where($where)->get();
            return Excel::download(new BarangExport($history_barang->toArray()), 'Barang.xlsx');
        } catch (\Exception $e) {
            return $this->response($e->getMessage(),true);
        }
    }
}
