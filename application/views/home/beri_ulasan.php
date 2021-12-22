<style>
    .rating {
        float: left;
        border: none;
    }

    .rating:not(:checked)>input {
        position: absolute;
        top: -9999px;
        clip: rect(0, 0, 0, 0);
    }

    .rating:not(:checked)>label {
        float: right;
        width: 1em;
        padding: 0 .1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 200%;
        line-height: 1.2;
        color: #ddd;
    }

    .rating:not(:checked)>label:before {
        content: '★ ';
    }

    .rating>input:checked~label {
        color: #f70;
    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: gold;
    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        color: #ea0;
    }

    .rating>label:active {
        position: relative;
    }
</style>
<?php foreach ($transaksi as $d) { ?>
    <!-- Modal Ulasan -->
    <div class="modal fade" id="beriUlasan<?= $d->order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="beriUlasanLabel<?= $d->order_id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="beriUlasanLabel<?= $d->order_id; ?>">Beri Ulasan &mdash; <?= $d->order_id; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="text-align: left;" class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('home/rating_wisata'); ?>" method="post">
                        <div class="form-group">
                            <label for="rating" class="col-form-label">Rating</label>
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1">1 star</label>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_wisatawan" id="id_wisatawan" value="<?= $d->id_wisatawan; ?>">
                            <input type="hidden" name="id_wisata" id="id_wisata" value="<?= $d->id_wisata; ?>">
                            <input type="hidden" name="order_id" id="order_id" value="<?= $d->order_id; ?>">
                            <label for="feedback" class="col-form-label">Feedback</label>
                            <input type="text" class="form-control" name="feedback" id="feedback">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<?php } ?>