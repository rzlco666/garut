<?php
//Inisialisasi nilai variabel awal
$jumlah = null;
$bln_laporan = "";
foreach ($grafik_wisata as $item) {
    $jum = $item->jumlah;
    $jumlah .= "$jum" . ", ";

    $jur = $item->bulan;
    $bln_laporan .= "'$jur'" . ", ";
}
?>

<script>
    var balance_chart = document.getElementById("test-chart").getContext('2d');

    var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
    balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

    var myChart = new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: [<?= $bln_laporan; ?>],
            datasets: [{
                label: 'Jumlah',
                data: [<?= $jumlah; ?>],
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });
</script>

<?php
//Inisialisasi nilai variabel awal
$jumlahh = null;
$bln_laporann = "";
foreach ($grafik_event as $item) {
    $jumm = $item->jumlah;
    $jumlahh .= "$jumm" . ", ";

    $jurr = $item->bulan;
    $bln_laporann .= "'$jurr'" . ", ";
}
?>

<script>
    var sales_chart = document.getElementById("sales-chart").getContext('2d');

    var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
    balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

    var myChart = new Chart(sales_chart, {
        type: 'line',
        data: {
            labels: [<?= $bln_laporann; ?>],
            datasets: [{
                label: 'Jumlah',
                data: [<?= $jumlahh; ?>],
                borderWidth: 2,
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });
</script>

<?php
//Inisialisasi nilai variabel awal
$jumlahhh = null;
$jumlahha = null;
$bln_laporannn = "";
foreach ($grafik_perbandingan as $item) {
    $jummm = $item->jumlah_wisata;
    $jumlahh .= "$jummm" . ", ";
    $jummma = $item->jumlah_event;
    $jumlahha .= "$jummma" . ", ";

    $jurrr = $item->bulan;
    $bln_laporannn .= "'$jurrr'" . ", ";
}
?>

<script>
    var ctx = document.getElementById("myChartt").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?= $bln_laporannn;?>'Testing'],
            datasets: [{
                    label: 'Wisata',
                    data: [<?= $jumlahh;?>10000],
                    borderWidth: 2,
                    backgroundColor: 'rgba(63,82,227,.8)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                },
                {
                    label: 'Event',
                    data: [<?= $jumlahha;?>20000],
                    borderWidth: 2,
                    backgroundColor: 'rgba(254,86,83,.7)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                }
            ]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        // display: false,
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 100000,
                        callback: function(value, index, values) {
                            return 'Rp ' + value;
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        tickMarkLength: 15,
                    }
                }]
            },
        }
    });
</script>