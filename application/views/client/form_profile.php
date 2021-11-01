<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap bg-light">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="card my-5 shadow-sm">
                        <div class="card-body p-5">

                            <h4 class="ls4 center">Profil Calon Klien</h4>

                            <div class="form-widget" data-alert-type="false">

                                <form class="mb-0" id="template-wedding" name="template-wedding" action="<?php echo site_url('client/submitProfil') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_calon_klien" value="<?php echo $calon_klien->id_calon_klien?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-first-name">Nama<small class="text-danger">*</small></label>
                                                    <input type="text" id="template-wedding-first-name" name="nama" value="" class="form-control required" placeholder="Nama Lengkap Anda" />
                                                </div>
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Tanggal Lahir</label>
                                                    <input type="date" id="template-wedding-last-name" name="tgl_lahir" value="" class="form-control" placeholder="" />
                                                </div >
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Jenis Kelamin</label>
                                                    <select class="form-control" name="jk">
                                                        <option value="P">Perempuan</option>
                                                        <option value="L">Laki-laki</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Email</label>
                                                    <input type="email" id="template-wedding-first-name" name="email" value="" class="form-control required" placeholder="Email Anda" />
                                                </div>
                                                <div class="col-md-12 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Alamat</label>
                                                    <input type="text" id="template-wedding-first-name" name="alamat" value="" class="form-control required" placeholder="Alamat Lengkap Anda" />
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