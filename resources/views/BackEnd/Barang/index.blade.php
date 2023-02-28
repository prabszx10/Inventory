@extends('main')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Data Barang</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Barang Yang Tersedia</span>
                </h3>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-light-primary" onclick="$('#kt_modal_create_app').modal('show')">
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
                    <table class="table align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="ps-4 rounded-start">Barang</th>
                                <th class="">Harga</th>
                                <th class="">Stock</th>
                                <th class="">Status</th>
                                <th class=" text-center rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <img src="assets/media/stock/600x400/img-26.jpg" class="" alt="" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Sant
                                                Extreanet Solution</a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">HTML, JS,
                                                ReactJS</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$2,790</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                                </td>
                                <td>
                                    <a href="#"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$2,790</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">Paid</span>
                                </td>
                                <td>
                                    <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">$520</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">Rejected</span>
                                </td>

                                <td class="text-center">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                    fill="currentColor" />
                                                <path opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                    fill="currentColor" />
                                                <path opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
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
						<input type="text" class="form-control  form-control-solid"
							name="barang_nama" placeholder="Nama Barang" value="" />
					</div>
	
					<div class="fv-row mb-5">
						<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
							<span class="required">Harga Barang</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
								title="Isikan Harga Barang"></i>
						</label>
						<input type="number" class="form-control  form-control-solid"
							name="barang_harga" placeholder="Harga Barang" value="" />
					</div>
	
					<div class="fv-row mb-5 row">
						<div class="col-8">
							<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
								<span class="required">Stock Barang</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
									title="Isikan Nama Barang"></i>
							</label>
							<input type="number" class="form-control  form-control-solid"
								name="barang_stock" placeholder="Stock Barang" value="" />
						</div>
						<div class="col-4">
							<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
								<span class="required">Satuan Barang</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
									title="Isikan Nama Barang"></i>
							</label>
							<input type="text" class="form-control  form-control-solid"
								name="barang_satuan" placeholder="Satuan Barang" value="" />
						</div>
					</div>
	
					<div class="fv-row mb-5">
						<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
							<span class="required">Keterangan</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
								title="Isikan Harga Barang"></i>
						</label>
						<textarea type="text" class="form-control  form-control-solid"
							name="barang_keterangan" placeholder="" value=""></textarea>
					</div>
					<button type="submit" class="btn btn-lg btn-primary" style="width: 100%">Simpan Data
						<span class="svg-icon svg-icon-3 ms-1 me-0">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
								<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
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
