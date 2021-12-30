<!-- My Script -->
<script>
    $(document).ready(function() {
        tampil_event();
    });

    // Fungsi untuk menampilkan data siswa
    function tampil_event() {
        $('#tabel-event').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            bDestroy: true,
            responsive: true,
        });
    }
</script>