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
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('Home/rating_wisata'); ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id_wisatawan" id="id_wisatawan" value="<?= $d->id_wisatawan; ?>">
                            <input type="hidden" name="id_wisata" id="id_wisata" value="<?= $d->id_wisata; ?>">
                            <input type="hidden" name="order_id" id="order_id" value="<?= $d->order_id; ?>">
                            <label for="feedback">Feedback</label>
                            <textarea id="feedback" name="feedback" cols="50" rows="8" maxlength="65525" required="required"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="accomodation_rating">Rating</label>
                            <span class="commentratingbox">
                                <select id="accomodation_rating" name="rating">
                                    <option value="1" name="rating">1</option>
                                    <option value="2" name="rating">2</option>
                                    <option value="3" name="rating">3</option>
                                    <option value="4" name="rating">4</option>
                                    <option value="5" name="rating">5</option>
                                </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button small left" style="background-color:#97a2a2 !important;color:#ffffff !important;border:1px solid #97a2a2 !important;margin-right:10px;margin-bottom:10px;" data-dismiss="modal">Close</button>
                    <button type="submit" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>