<style>
    tr.noBorder td {
        border: 0;
    }

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
<!-- Base typography-->
<section class="section section-sm section-first bg-default text-left">
    <div class="container">
        <div class="row row-40 flex-lg-row-reverse justify-content-xl-between">
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($ulasan as $d) { ?>
                            <form enctype="multipart/form-data" action="<?php echo base_url('Home/update_ulasan'); ?>" method="post">
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
                                    <label for="feedback" class="col-form-label">Feedback</label>
                                    <input type="hidden" value="<?= $d->id_rating_wisata; ?>" name="id_rating_wisata" id="id_rating_wisata">
                                    <input type="text" class="form-control" value="<?= $d->feedback; ?>" name="feedback" id="feedback">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-none d-xl-block">
                <div class="offset-left-xl-45">
                    <div class="card">
                        <?php foreach ($profile as $i) : ?>
                            <img class="card-img-top" src="<?= base_url('public/upload/image/wisatawan/'); ?><?= $i['foto']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $i['nama']; ?></h5>
                                <p class="card-text">
                                <table>
                                    <tr>
                                        <td><a class="icon fa fa-user" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><a class="icon fa fa-envelope" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><a class="icon fa fa-phone" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['no_hp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><a class="icon fa fa-home" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['alamat']; ?></td>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        <?php endforeach; ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('Home/transaksi_wisata'); ?>" class="card-link">Transaksi Wisata</a></li>
                            <li class="list-group-item"><a href="<?= base_url('Home/profile'); ?>" class="card-link">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>