<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var urlPath ={
        select: "{{ route('history_barang.selectFilter') }}",
        selectBarang: "{{ route('barang.select') }}",
        export: "{{ route('history_barang.export') }}",
    }

    $(document).ready(function () {
		$('#table_stock').DataTable();
	});	

    inittable()
    getDataBarang()

    function inittable(){
        var status = $('[name=history_barang_status]').val();
        var tanggal_awal = $('[name=tanggal_awal]').val();
        var tanggal_akhir = $('[name=tanggal_akhir]').val();
        var id = $('[name=history_barang_id]').val()

        $.ajax({
            url: urlPath.select,
            type: 'POST',
            data: {
                tanggal_awal: tanggal_awal,
                tanggal_akhir: tanggal_akhir,
                history_barang_status: status,
                history_barang_barang_id: id
            },
            success: function(response){
                if(response.status == true){
                    table.clear(); 
                    var array = []
                    $.each( response.data, function( k, v ){
                        if(v.history_barang_status == 'masuk'){
                            var badge = 'bg-success'
                        } else{
                            var badge = 'bg-danger'
                        }

                        var date = moment(v.history_barang_tanggal);
                        var formattedDate = date.format("DD - MM - YYYY");
                        let html_status = ` <span class="badge ${badge}">${v.history_barang_status.toUpperCase()}</span>`
                        let berat = `${v.history_barang_stock} ${v.barang.barang_satuan}`

                        let push_array = [v.barang.barang_nama,formattedDate,html_status,berat]
                        array.push(push_array);
                    });

                    table.rows.add(array).draw(); 
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

    function exportExcel(){
    // Define the data to send
    var form_data = {
        history_barang_status: $('[name=history_barang_status]').val(),
        tanggal_awal: $('[name=tanggal_awal]').val(),
        tanggal_akhir: $('[name=tanggal_akhir]').val(),
        history_barang_id: $('[name=history_barang_id]').val()
    };

    // Open a new window or tab
    var win = window.open(urlPath.export, '_blank');

    // Construct a form to submit the data
    var form = $('<form method="post" target="_blank" action="' + urlPath.export + '"></form>');
    for (var key in form_data) {
        form.append($('<input type="hidden" name="' + key + '" value="' + form_data[key] + '">'));
    }
    form.appendTo(win.document.body);

    // Submit the form to download the file
    form.submit();
    }
</script>