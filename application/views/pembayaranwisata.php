<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zQtZZRkH9k_rq429"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Contact Form-->
<section class="section section-sm section-last bg-default text-left">
    <div class="container">
        <article class="title-classic">
            <div class="title-classic-title">
                <h3>Pembayaran Wisata</h3>
            </div>
            <div class="title-classic-text">
                <p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
            </div>
        </article>
        <form class="rd-form rd-form-variant-2 rd-mailform" id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <div class="row row-14 gutters-14">
                <div class="col-md-12">
                    <div class="form-wrap">
                        <input class="form-input" id="nama" type="text" name="nama" data-constraints="@Required">
                        <label class="form-label" for="nama">Nama</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <select class="form-input" name="wisata" id="wisata">
                            <option value="Awit Sinar Alam Darajat">Awit Sinar Alam Darajat</option>
                            <option value="Karacak Valley">Karacak Valley</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <input class="form-input" id="bayar" type="number" name="bayar" data-constraints="@Required">
                        <label class="form-label" for="bayar">Jumlah Bayar</label>
                    </div>
                </div>
                <!-- <div class="col-12">
                    <div class="form-wrap">
                        <label class="form-label" for="contact-message-2">Message</label>
                        <textarea class="form-input textarea-lg" id="contact-message-2" name="message" data-constraints="@Required"></textarea>
                    </div>
                </div> -->
            </div>
            <button class="button button-primary button-pipaluk" id="pay-button">Bayar</button>
        </form>
    </div>
</section>
<section class="section section-sm section-last bg-default text-left">
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Nama</th>
                    <th>Wisata</th>
                    <th>Gross Amount</th>
                    <th>Payment Type</th>
                    <th>Bank</th>
                    <th>VA Number</th>
                    <th>Transcation Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($midtrans as $d) { ?>
                    <tr>
                        <td><?= $d->order_id; ?></td>
                        <td><?= $d->nama; ?></td>
                        <td><?= $d->wisata; ?></td>
                        <td><?= number_format($d->gross_amount, '0', '', '.'); ?></td>
                        <td><?= $d->payment_type; ?></td>
                        <td><?= $d->bank; ?></td>
                        <td><?= $d->va_number; ?></td>
                        <td><?= $d->transaction_time; ?></td>
                        <td>
                            <?php

                            if ($d->status_code == "200") {
                            ?>
                                <span class="badge bg-success">Lunas</span>
                            <?php
                            } else {
                            ?>
                                <span class="badge bg-warning">Pending</span>
                            <?php
                            }

                            ?>
                        </td>
                        <td>
                            <a href="<?= $d->pdf_url; ?>" target="_blank" class="btn btn-success">Download</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var nama = $("#nama").val();
        var wisata = $("#wisata").val();
        var bayar = $("#bayar").val();
        var harga = $("#harga").val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/snap/token',
            data: {
                nama: nama,
                wisata: wisata,
                bayar: bayar
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>