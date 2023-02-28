<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var urlPath ={
        insert: "{{ route('barang.insert') }}",
        select: "{{ route('barang.select') }}",
        delete: "{{ route('barang.delete') }}",
    }

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
                $.ajax({
                    url: urlPath.insert,
                    data: form,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(response){
                        if(response.status == true){
                            swal("Success !", response.message, "success");
                            onReset()
                        } else{
                            swal("Warning", response.message, "warning");
                        }
                    }
                })
            }
        }); 
    }

    function onReset(){
        $('#formData')[0].reset();
        $('#kt_modal_create_app').modal('hide')
    }
</script>