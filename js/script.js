$(function() {
    $('.tombolTambahData').on('click', function() {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Simpan');
    });

    $('.tampilModalUbah').on('click', function() {
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-body form').attr('action', 'http://localhost/ci-app/mahasiswa/ubah');
        $('.modal-footer button[type=submit]').html('Ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url         : 'http://localhost/ci-app/mahasiswa/getubah',
            data        : {id : id},
            method      : 'post',
            dataType    : 'json',
            success     : function(data) {
                            console.log(data); //show json data in console
                            $('#id').val(data.id);
                            $('#nama').val(data.nama);
                            $('#nim').val(data.nim);
                            $('#email').val(data.email);
                            $('#jurusan').val(data.jurusan);
            }
        });
    });
});