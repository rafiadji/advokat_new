<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap bg-light">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="card my-5 shadow-sm">
                        <div class="card-body p-5">

                            <h4 class="ls4 center">Kronologi Perkara</h4>

                            <div class="form-widget" data-alert-type="false">

                                <form class="mb-0" id="template-wedding" name="template-wedding" action="<?php echo site_url('client/kronologisubmit') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_calon_klien" value="<?php echo $calon_klien->id_calon_klien?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-12 bottommargin-sm">
                                                    <label for="template-wedding-first-name">Tuliskan Kronologi Perkara Anda<small class="text-danger">*</small></label>
                                                    <textarea name="kronologi" cols="30" rows="10" class="form-control">Tuliskan Kronologi disini</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" id="template-wedding-submit" name="template-wedding-submit" class="btn btn-secondary btn-block btn-lg">SIMPAN</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <a href="#myModal1" data-lightbox="inline" class="template-wedding-success-modal d-none"></a>
                            <div class="modal1 mfp-hide" id="myModal1">
                                <div class="block mx-auto" style="background-color: #FFF; max-width: 600px;">
                                    <div class="clearfix" style="padding: 50px;">
                                        <i class="icon-smile1 color display-4 mb-2"></i>
                                        <h3 class="mb-3">Terima Kasih</h3>
                                        <h5 class="lead font-weight-semibold ls1 text-uppercase my-4">Data Anda telah tersimpan.</h5>
                                        <p class="font-weight-normal mb-0">Terima kasih telah mempercayai kami</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->