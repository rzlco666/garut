<!-- My Script -->
<script>
    let status; // Menampung status "tambah, edit dan hapus"
    let url; // Menampung url untuk save dan update
    let form_wisata = 'form-wisata';

    $(document).ready(function() {
        tampil_wisata();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_wisata() {
        $('#tabel-wisata').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            responsive: true,
            ajax: {
                url: "<?= base_url('datawisata/get_wisata'); ?>",
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
                url = "<?= base_url('datawisata/save_wisata'); ?>";
                break;
            case 'edit':
                $('#btn-proses').text('Update Changes');
                url = "<?= base_url('datawisata/update_wisata'); ?>";
                break;
            case 'hapus':
                url = "<?= base_url('datawisata/delete_wisata'); ?>";
                break;
        }
    }
    // Clear form
    function clear_form() {
        $('#' + form_wisata)[0].reset();
    }
    // Fungsi untuk menampilkan modal tambah data
    function tambah() {
        status = 'tambah';
        clear_form();
        $('#modal-wisata').modal('show')
            .find('.modal-title').text('Tambah Data');
    }
    // Fungsi untuk menampilkan modal edit data
    function edit(id_wisata) {
        status = 'edit';
        $('#modal-wisata').modal('show')
            .find('.modal-title').text('Edit Data');
        clear_form();
        $.ajax({
            url: "<?= base_url('datawisata/edit_wisata'); ?>",
            type: "GET",
            dataType: "JSON",
            data: {
                id_wisata: id_wisata,
            },
            success: function(x) {
                if (x.status == true) {
                    $('#id_wisata').val(x.data.id_wisata);
                    $('#nama').val(x.data.nama);
                    $('#lokasi').val(x.data.lokasi);
                    $('#deskripsi').val(x.data.deskripsi);
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
            data: $('#' + form_wisata).serialize(),
            success: function(x) {
                if (x.status == true) {
                    $('#modal-wisata').modal('hide');
                    $('#notifikasi').html('');
                    $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
              ${x.message}
            </div>`);
                    tampil_wisata();
                    $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                        $("#notif").slideUp(500);
                    });
                }
            }
        });
    }
    // Fungsi untuk proses hapus data siswa
    function hapus(id_wisata) {
        if (confirm('Yakin ?')) {
            status = 'hapus';

            check_status();

            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: {
                    id_wisata: id_wisata
                },
                success: function(x) {
                    if (x.status == true) {
                        $('#notifikasi').html('');
                        $('#notifikasi').append(`<div class="alert alert-success" id="notif" role="alert">
                ${x.message}
              </div>`);
                        tampil_wisata();
                        $("#notif").fadeTo(2000, 500).slideUp(500, function() {
                            $("#notif").slideUp(500);
                        });
                    }
                }
            });
        }
    }
</script>