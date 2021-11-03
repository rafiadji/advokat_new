<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap bg-light">

        <div class="container">
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