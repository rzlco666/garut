<!-- My Script -->
<script>
    $(document).ready(function() {
        tampil_wisata();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_wisata() {
        $('#tabel-wisata').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            bDestroy: true,
            responsive: true,
        });
    }
</script>