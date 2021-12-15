<!-- My Script -->
<script>

    $(document).ready(function() {
        tampil_wisata();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_wisata() {
        $('#tabel-wisata').DataTable({
            bDestroy: true,
            responsive: true,
        });
    }

</script>