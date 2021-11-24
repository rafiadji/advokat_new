<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap bg-light">
        <div class="col-lg-12 col-md-12">
            <div class="card my-5 shadow-sm">
                <div class="card-body p-5">

                    <h4 class="ls4 center">Data Konsultasi</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal Konsultasi</th>
                                <th>Jam Konsultasi</th>
                                <th>Room Konsul</th>
                                <th>Pengacara</th>
                                <th>Kronologi</th>
                                <th>Catatan Konsultasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list_konsul as $list) :?>
                            <tr>
                                <td><?php echo $list->tanggal_konsul?></td>
                                <td><?php echo $list->jam_konsul?></td>
                                <td><?php echo $list->room_konsul?></td>
                                <td><?php echo $list->namaadvo?></td>
                                <td><?php echo $list->kronologi?></td>
                                <td><?php echo $list->catatan?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="<?php echo site_url('client/kronologisubmit') ?>" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="card my-5 shadow-sm">
                        <div class="card-body p-5">

                            <h4 class="ls4 center">Kronologi Perkara</h4>

                            <div class="form-widget" data-alert-type="false">
                                
                                <input type="hidden" name="id_calon_klien" value="<?php echo $this->session->userdata('id_calon_klien');?>">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12 bottommargin-sm">
                                                <label for="template-wedding-first-name">Tuliskan Kronologi Perkara Anda<small class="text-danger">*</small></label>
                                                <textarea name="kronologi" cols="30" rows="10" class="form-control" placeholder="Tuliskan Kronologi disini"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-secondary btn-block btn-lg">SIMPAN</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</section><!-- #content end -->