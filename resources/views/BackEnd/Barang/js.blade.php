<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    
    var urlPath ={
        insert: "{{ route('barang.insert') }}",
        update: "{{ route('barang.update') }}",
        select: "{{ route('barang.select') }}",
        delete: "{{ route('barang.delete') }}",
        insertHistory: "{{ route('history_barang.insert') }}",
        selectHistory: "{{ route('history_barang.select') }}",
    }
    inittable()

    function onsave(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formData')[0];
                const form = new FormData(formElement);

                urlSave = $('[name=barang_id]').val()  == ''? urlPath.insert:urlPath.update;
                $.ajax({
                    url: urlSave,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            inittable()
                            swal("Success !", response.message, "success");
                            onRefresh()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function inittable(){
        $.ajax({
                    url: urlPath.select,
                    type: 'GET',
                    success: function(response){
                        console.log(response)
                        if(response.status == true){
                            $('#list_table').html('')
                            $.each( response.data, function( k, v ){
                                $('#list_table').append(`
                                    <tr>
                                        <td>${v.barang_nama}</td>
                                        <td>${v.barang_harga}</td>
                                        <td>${v.barang_stock}</td>
                                        <td class="text-center">
														<a href="javascript:onStock('masuk','${v.barang_id}','${v.barang_nama}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
																	<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="javascript:onEdit('${v.barang_id}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
															<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
														<a href="javascript:onDelete('${v.barang_id}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
													</td>
                                    </tr>
                                `)
                            });
                        } 
                    }
        })
    }

    function onEdit(id){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response){
                if(response.status == true){
                    $('#form_modal').modal('show')
                    $.each( response.data[0], function( k, v ){
                        $('[name='+k+']').val(v)
                    });
                } 
            }
        })
    }

    function onDelete(id){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menghapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                $.ajax({
                    url: urlPath.delete,
                    data: {
                        barang_id:id
                    },
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            inittable()
                            swal("Success !", response.message, "success");
                            onRefresh()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function onStock(type,id,nama){
        $('.stock_modal_nama').html(nama)
        $('#row_button').html(`
            <button type="button" class="btn col-6" onclick="onStockTable('masuk','${id}')" id="btn-masuk">Stock Barang Masuk</button>
            <button type="button" class="btn col-6" onclick="onStockTable('keluar','${id}')" id="btn-keluar">Stock Barang Keluar</button>
        `)
        $('[name=history_barang_barang_id]').val(id);
        onStockTable(type,id)
        $('#stock_modal').modal('show')
    }

    function onStockTable(type,id){
        $("#btn-masuk").removeClass("btn-primary");
        $("#btn-keluar").removeClass("btn-secondary");
        $("#btn-keluar").removeClass("btn-primary");
        $("#btn-masuk").removeClass("btn-secondary");

        if(type == 'masuk'){
            $("#btn-masuk").addClass("btn-primary");
            $("#btn-keluar").addClass("btn-secondary");
            var badge = 'bg-success'
        } else{
            $("#btn-keluar").addClass("btn-primary");
            $("#btn-masuk").addClass("btn-secondary");
            var badge = 'bg-danger'
        }
        
        $.ajax({
            url: urlPath.selectHistory,
            type: 'POST',
            data: {
                history_barang_barang_id: id,
                history_barang_status: type
            },
            success: function(response){
                if(response.status == true){
                    $('#list_stock').html('')
                    $.each( response.data, function( k, v ){
                        var date = moment(v.history_barang_tanggal);
                        var formattedDate = date.format("dddd, DD MMMM YYYY");
                        $('#list_stock').append(`
                            <tr>
                                <td class="text-center">${v.history_barang_tanggal}</td>
                                <td class="text-center"><span class="badge ${badge}">${v.history_barang_status.toUpperCase()}</span></td>
                                <td class="text-center">${v.history_barang_stock}</td>
                        `)
                    });
                } 
            }
        })
    }

    function onSaveStock(){
        swal({
            title: "Peringatan",
            text: "Apakah Anda Yakin Untuk Menyimpan Data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((response) => {
            if (response) {
                const formElement = $('#formDataModal')[0];
                const form = new FormData(formElement);
                var type = $('#history_barang_status').val();
                var id = $('#history_barang_barang_id').val();

                $.ajax({
                    url: urlPath.insertHistory,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            swal("Success !", response.message, "success");
                            onStockTable(type,id)
                            onRefresh()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function onHide(hide,show){
        $('#'+hide).modal('hide')
        $('#'+show).modal('show')
    }

    function onRefresh(){
        onClear()
        inittable()
        $('#form_modal').modal('hide')
        $('#stock_add_modal').modal('hide')
    }

    function onClear(){
        $('#formData')[0].reset();
        $('#formDataModal')[0].reset();
    }
</script>