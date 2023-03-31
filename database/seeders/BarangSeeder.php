<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = array();
        for($i=0;$i<2;$i++){
            $uuid = Str::substr((Uuid::uuid4())->getHex(), 0, 16);
            array_push($id,$uuid);
        }

        foreach($id as $key => $val){
            DB::table('barangs')->insert([
                'barang_id' => $val,
                'barang_nama' => 'Barang Testing '.$key,
                'barang_harga' => '20000',
                'barang_satuan' => 'KG',
            ]);
        }
        

    }
}
