@extends('main')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8" style="border:none">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Data Barang</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Barang Yang Tersedia</span>
                </h3>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-light-primary" onclick="$('#form_modal').modal('show');onClear()">
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Tambah Data</a>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="table_primary" class="display compact" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="form_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Data</h2>
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
                <form action="javascript:onsave()" id="formData" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="barang_id" placeholder="" value="" />
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Nama Barang</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Nama Barang"></i>
                        </label>
                        <input type="text" class="form-control  form-control-solid" name="barang_nama"
                            placeholder="Nama Barang" value="" />
                    </div>

                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Harga Barang</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Harga Barang"></i>
                        </label>
                        <input type="number" class="form-control  form-control-solid" name="barang_harga"
                            placeholder="Harga Barang" value="" />
                    </div>

                    <div class="fv-row mb-5 row">
                        <div class="col-12">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">Satuan Barang</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Isikan Nama Barang"></i>
                            </label>
                            <input type="text" class="form-control  form-control-solid" name="barang_satuan"
                                placeholder="Satuan Barang" value="" />
                        </div>
                    </div>

                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Keterangan</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Harga Barang"></i>
                        </label>
                        <textarea type="text" class="form-control  form-control-solid" name="barang_keterangan"
                            placeholder="" value=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary" style="width: 100%">Simpan Data
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
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stock_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>History <span class="stock_modal_nama"></span></h2>
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
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" style="width:49%">
                      <button class="nav-link active" id="tab_masuk" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="width:100%" onclick="onStockTable('masuk')">Stock Barang Masuk</button>
                    </li>
                    <li class="nav-item" role="presentation" style="width:49%">
                      <button class="nav-link" id="tab_keluar" data-bs-toggle="pill"  data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="width:100%" onclick="onStockTable('keluar')">Stock Barang Keluar</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive mt-3">
                            <table id="table_secondary" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Stock</th>
                                    </tr>
                                </thead>
                                <tbody id="list_stock"></tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                 <button type="button" class="btn btn-primary col-12" onclick="onHide('form_modal','stock_add_modal')">
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                        </svg>
                    </span>
                    Tambah History</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stock_add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah History <span class="stock_modal_nama"></span></h2>
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
                <form action="javascript:onSaveStock()" id="formDataModal" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="history_barang_barang_id" placeholder="" value="" />
                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tanggal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Nama Barang"></i>
                        </label>
                        <input type="date" class="form-control  form-control-solid" name="history_barang_tanggal"
                            value="" />
                    </div>

                    <div class="fv-row mb-5">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Stock Barang</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Isikan Harga Barang"></i>
                        </label>
                        <input type="number" class="form-control  form-control-solid" name="history_barang_stock"
                            placeholder="Stock Barang" value="" />
                    </div>

                    <div class="fv-row mb-5 row">
                        <div class="col-12">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">Status Barang</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Isikan Nama Barang"></i>
                            </label>
                            <select class="form-control" name="history_barang_status" id="history_barang_status">
                                <option value="" selected>Semua Tipe</option>
                                <option value="masuk">Barang Masuk</option>
                                <option value="keluar">Barang Keluar</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary" style="width: 100%">Simpan Data
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include('BackEnd.Barang.js')
@endsection
