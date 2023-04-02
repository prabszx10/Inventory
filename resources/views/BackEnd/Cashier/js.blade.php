<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    var urlPath ={
        select: "{{ route('barang.select') }}",
    }

    getDataBarang()

    function getDataBarang(){
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            success: function(response){
                if(response.status == true){
                    $.each( response.data, function( k, v ){
                        $('#input_id').append(`
                            <option value="${v.barang_id}">${v.barang_nama} (${v.barang_satuan})</option>
                        `)
                    });
                } 
            }
        })
    }

    var number = 0
    function addBarang(){
        var id = $('#input_id').val();
        var qty = $('#input_qty').val();
        $.ajax({
            url: urlPath.select,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response){
                const data = response.data
                if(response.status == true){
                    number++;
                    let jumlah = qty+' '+data.barang_satuan;
                    let satuan = currencyFormat(data.barang_harga*1);
                    let total = currencyFormat(data.barang_harga*qty);

                    var push ={
                        'id':data.barang_id,
                        'qty': qty,
                        'harga': data.barang_harga
                    }

                    var jsonString = JSON.stringify(push);
                    var encode = btoa(jsonString)
                    console.log(encode)
                    var input_field = `<input type="hidden" value="${encode}" name="barang_list[]" >`
                    var nama = data.barang_nama+input_field

                    let deleteData = `<div onclick=onDelete('${number}')><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></div>`

                    let array = [number,nama,jumlah,satuan,total,deleteData]
                    table.row.add(array).draw(); 
                    countTotalHarga()
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
                table.row('#row_'+id).remove().draw();
                countTotalHarga()
            }
        })
    }

    function currencyFormat(nominal){
        var currency = nominal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });
        return currency;
    }

    function countTotalHarga(){
        var counter = 0
        
        $('input[name="barang_list[]"]').map(function(){
            var decode = JSON.parse(atob($(this).val()));
            console.log(decode)
            counter = (decode.qty*decode.harga)+counter;
            return counter;
        }).get();

        $('#total_harga').html(currencyFormat(counter))
    }

    function onPembayaran(){
        $('#pembayaran_modal').modal('show')
    }
</script>