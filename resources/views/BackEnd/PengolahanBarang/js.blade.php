<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var urlPath ={
        select: "{{ route('history_barang.selectFilter') }}",
        selectBarang: "{{ route('barang.select') }}",
    }

    $(document).ready(function () {
		$('#table_stock').DataTable();
	});	

    inittable()
    getDataBarang()

    function inittable(){
        var status = $('[name=history_barang_status]').val();
        var tanggal = $('[name=history_barang_tanggal]').val();
        var id = $('[name=history_barang_barang_id]').val()

        $.ajax({
            url: urlPath.select,
            type: 'POST',
            data: {
                history_barang_tanggal: tanggal,
                history_barang_status: status,
                history_barang_barang_id: id
            },
            success: function(response){
                if(response.status == true){
                    $('#list_table').html('')
                    $.each( response.data, function( k, v ){
                        if(v.history_barang_status == 'masuk'){
                            var badge = 'bg-success'
                        } else{
                            var badge = 'bg-danger'
                        }
                        $('#list_table').append(`
                            <tr>
                                <td class="text-center">${v.barang_nama}</td>
                                <td class="text-center">${v.history_barang_tanggal}</td>
                                <td class="text-center"><span class="badge ${badge}">${v.history_barang_status.toUpperCase()}</span></td>
                                <td class="text-center">${v.history_barang_stock} ${v.barang_satuan}</td>
                        `)
                    });
                } else{
                    $('#table_stock').DataTable().clear().draw();
                }
            }
        })
    }

    function getDataBarang(){
        $.ajax({
            url: urlPath.selectBarang,
            type: 'GET',
            success: function(response){
                if(response.status == true){
                    $.each( response.data, function( k, v ){
                        $('#history_barang_id').append(`
                            <option value="${v.barang_id}">${v.barang_nama}</option>
                        `)
                    });
                } 
            }
        })
    }
</script>