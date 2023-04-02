@extends('main')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-3">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8" style="border:none">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Filter Barang</span>
                    {{-- <span class="text-muted mt-1 fw-semibold fs-7">Barang Yang Tersedia</span> --}}
                </h3>
                <button onclick="exportExcel()" type="button" class="btn btn-lg btn-success">Export Data
                    <svg fill="#ffffff" width="24" height="24" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 493.525 493.525" xml:space="preserve">
                        <g id="XMLID_30_">
                            <path id="XMLID_32_" d="M430.557,79.556H218.44c21.622,12.688,40.255,29.729,54.859,49.906h157.258
                                c7.196,0,13.063,5.863,13.063,13.06v238.662c0,7.199-5.866,13.064-13.063,13.064H191.894c-7.198,0-13.062-5.865-13.062-13.064
                                V222.173c-6.027-3.1-12.33-5.715-18.845-7.732c-3.818,11.764-12.105,21.787-23.508,27.781c-2.39,1.252-4.987,2.014-7.554,2.844
                                v136.119c0,34.717,28.25,62.971,62.968,62.971h238.663c34.718,0,62.969-28.254,62.969-62.971V142.522
                                C493.525,107.806,465.275,79.556,430.557,79.556z" />
                            <path id="XMLID_31_" d="M129.037,175.989c51.419,1.234,96.388,28.283,122.25,68.865c2.371,3.705,6.434,5.848,10.657,5.848
                                c1.152,0,2.322-0.162,3.46-0.486c5.377-1.545,9.114-6.418,9.179-12.006c0-0.504,0-1.01,0-1.51
                                c0-81.148-64.853-147.023-145.527-148.957V64.155c0-5.492-3.038-10.512-7.879-13.078c-2.16-1.139-4.533-1.707-6.889-1.707
                                c-2.94,0-5.848,0.88-8.35,2.584L5.751,120.526C2.162,122.98,0.018,127.041,0,131.394c-0.017,4.338,2.113,8.418,5.687,10.902
                                l100.17,69.451c2.518,1.753,5.459,2.631,8.414,2.631c2.355,0,4.696-0.553,6.857-1.676c4.855-2.549,7.909-7.6,7.909-13.092V175.989z
                                " />
                        </g>
                    </svg>
                </button>
            </div>
            <div class="card-body py-3 mt-5">
                <div class="row">
                    <div class="col-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tanggal Awal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Tanggal Filter"></i>
                        </label>
                        <input type="date" class="form-control  form-control-solid" name="tanggal_awal" value="" />
                    </div>
                    <div class="col-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tanggal Akhir</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Tanggal Filter"></i>
                        </label>
                        <input type="date" class="form-control  form-control-solid" name="tanggal_akhir" value="" />
                    </div>
                    <div class="col-6 mt-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Barang</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Nama Barang"></i>
                        </label>
                        <select class="form-control select2" name="history_barang_id" id="history_barang_id">
                            <option value="" selected>Semua Barang</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tipe</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Nama Barang"></i>
                        </label>
                        <select class="form-control select2" name="history_barang_status" id="history_barang_status">
                            <option value="" selected>Semua Tipe</option>
                            <option value="masuk">Barang Masuk</option>
                            <option value="keluar">Barang Keluar</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <button onclick="inittable()" type="button" class="btn btn-lg btn-primary"
                            style="width: 100%">Filter Data
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
                    <table id="table_primary" class="display compact" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Stock</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
