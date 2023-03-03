@extends('main')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-3">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8" style="border:none">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Filter Barang</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Barang Yang Tersedia</span>
                </h3>
            </div>
            <div class="card-body py-3">
                <div class="row">
                    <div class="col-4">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tanggal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Tanggal Filter"></i>
                        </label>
                        <input type="date" class="form-control  form-control-solid" name="history_barang_tanggal"
                            value="" />
                    </div>
                    <div class="col-4">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Barang</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Nama Barang"></i>
                        </label>
                        <select class="form-control  form-control-solid" name="history_barang_id" id="history_barang_id">
                            <option value="" selected>Semua Data</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tipe</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Nama Barang"></i>
                        </label>
                        <select class="form-control  form-control-solid" name="history_barang_status" id="history_barang_status">
                            <option value="" selected>Semua Data</option>
                            <option value="masuk">Barang Masuk</option>
                            <option value="keluar">Barang Keluar</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <button onclick="inittable()" type="button" class="btn btn-lg btn-primary" style="width: 100%">Filter Data
                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                        transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                    <path
                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table id="table_stock" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Stock</th>
                            </tr>
                        </thead>
                        <tbody id="list_table"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include('BackEnd.PengolahanBarang.js')
@endsection
