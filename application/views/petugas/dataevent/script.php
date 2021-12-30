<!-- My Script -->
<script>

    $(document).ready(function() {
        tampil_event();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_event() {
        $('#tabel-event').DataTable({
            bDestroy: true,
            responsive: true,
        });
    }

</script>