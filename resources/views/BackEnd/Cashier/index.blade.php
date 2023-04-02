@extends('main')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8" style="border:none">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Perhitungan Cashier</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Barang Yang Tersedia</span>
                </h3>
            </div>
            <div class="card-body py-3">
                <div class="row">
                    <div class="col-4">
                        <div class="card_custom">
                            <label for="history_barang_id">Nama Barang</label>
                                <form action="javascript:addBarang()">
                                    <select class="form-control select2" id="input_id">
                                        <option value="" selected disabled>Pilih Barang</option>
                                    </select>
                                    <label class="mt-3" for="qty">Jumlah Barang</label>
                                    <input type="number" class="form-control" id="input_qty" placeholder="Masukan Jumlah Barang">
    
                                    <button type="submit" class="btn btn-lg btn-primary mt-4"
                                    style="width: 100%">Submit Data</button>
                                </form>
                        </div>

                    </div>
                    <div class="col-8">
                        <div class="card_custom">
                            <div class="d-flex justify-content-between">
                                <h2>Total Pembelian: <b id="total_harga" style="color:rgba(106,207,146,1)">RP 0</b></h2>
                                <button type="button" class="btn btn-primary" onclick="onPembayaran()">Pembayaran</button>
                            </div>
                            <h2>Nominal Diterima: <b id="total_harga" style="color:rgba(106,207,146,1)">RP 0</b></h2>
                            <h2>Nominal Kembalian: <b id="total_harga" style="color:rgba(106,207,146,1)">RP 0</b></h2>

                        </div>
                       <div class="card_custom mt-3">
                        <h4>List Barang</h4>
                        <form action=""> 
                            <div class="table-responsive mt-3">
                                <table id="table_primary" class="display compact" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Bahan</th>
                                            <th class="text-center">Jumlah Bahan</th>
                                            <th class="text-center">Harga Satuan</th>
                                            <th class="text-center">Harga Total</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </form>
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pembayaran_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Pembayaran</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="row">
                    <div class="col-6">
                        <label class="" for="pembeli">Nama Pembeli</label>
                <input type="text" name="" id="pembeli" class="form-control" placeholder="Nama Optional">
                
                    </div>
                    <div class="col-6">
                        <label class="" for="diterima">Nominal Diterima</label>
                <input type="number" name="" id="diterima" class="form-control" placeholder="Masukan Nominal" onchange="onKembalian()">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include('BackEnd.Cashier.js')
@endsection
