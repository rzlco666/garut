<!-- My Script -->
<script>
    let status; // Menampung status "tambah, edit dan hapus"
    let url; // Menampung url untuk save dan update
    let form_wisatawan = 'form-wisatawan';

    $(document).ready(function() {
        tampil_wisatawan();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_wisatawan() {
        $('#tabel-wisatawan').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            responsive: true,
            ajax: {
                url: "<?= base_url('DataWisatawan/get_wisatawan'); ?>",
                type: "POST",
                data: {},
            },
            columnDefs: [{
                    targets: [0, -1, -2],
                    orderable: false,
                },
                {
                    width: "1%",
                    targets: [0, -1, -2],
                },
            ],
        });
    }

    // Check berdasarkan status yang aktif dan set button dan url
    function check_status() {
        switch (status) {
            case 'tambah':
                $('#btn-proses').text('Save Changes');
                url = "<?= base_url('DataWisatawan/save_wisatawan'); ?>";
                break;
            case 'edit':
                $('#btn-proses').text('Update Changes');
                url = "<?= base_url('DataWisatawan/update_wisatawan'); ?>";
                break;
            case 'hapus':
                url = "<?= base_url('DataWisatawan/delete_wisatawan'); ?>";
                break;
        }
    }
    // Clear form
    function clear_form() {
        $('#' + form_wisatawan)[0].reset();
    }
    // Fungsi untuk menampilkan modal tambah data
    function tambah() {
        status = 'tambah';
        clear_form();
        $('#modal-wisatawan').modal('show')
            .find('.modal-title').text('Tambah Data');
    }
    // Fungsi untuk menampilkan modal edit data
    function edit(id_wisatawan) {
        status = 'edit';
        $('#modal-wisatawan').modal('show')
            .find('.modal-title').text('Edit Data');
        clear_form();
        $.ajax({
            url: "<?= base_url('DataWisatawan/edit_wisatawan'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_wisatawan: id_wisatawan,
            },
            success: function(x) {
                if (x.status == true) {
                    $('#id_wisatawan').val(x.data.id_wisatawan);
                    $('#nama').val(x.data.nama);
                    $('#username').val(x.data.username);
                    $('#email').val(x.data.email);
                    $('#alamat').val(x.data.alamat);
                    $('#no_hp').val(x.data.no_hp);
                }
            }
        });
    }
    // Fungsi untuk proses simpan dan update data siswa
    function proses() {
        check_status();

        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: $('#' + form_wisatawan).serialize(),
            success: function(x) {
                if (x.status == true) {
                    $('#modal-wisatawan').modal('hide');
                    $('#notifikasi').html('');
                    $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
              ${x.message}
            </div>`);
                    tampil_wisatawan();
                    $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                        $("#notif").slideUp(500);
                    });
                }
            }
        });
    }
    // Fungsi untuk proses hapus data siswa
    function hapus(id_wisatawan) {
        if (confirm('Yakin ?')) {
            status = 'hapus';

            check_status();

            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: {
                    id_wisatawan: id_wisatawan
                },
                success: function(x) {
                    if (x.status == true) {
                        $('#notifikasi').html('');
                        $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
                ${x.message}
              </div>`);
                        tampil_wisatawan();
                        $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                            $("#notif").slideUp(500);
                        });
                    }
                }
            });
        }
    }
</script>