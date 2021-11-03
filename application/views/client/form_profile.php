<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap bg-light">

        <div class="container">
        <form class="mb-0" id="template-wedding" name="template-wedding" action="<?php echo site_url('client/submitProfil') ?>" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="card my-5 shadow-sm">
                        <div class="card-body p-5">

                            <h4 class="ls4 center">Profil Calon Klien</h4>

                            <div class="form-widget" data-alert-type="false">

                                
                                <input type="hidden" name="id_calon_klien" value="<?php echo $info->id_calon_klien?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-first-name">Nama<small class="text-danger">*</small></label>
                                                    <input type="text" id="template-wedding-first-name" name="nama" value="<?php echo $info->nama?>" class="form-control required" placeholder="Nama Lengkap Anda" />
                                                </div>
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Tanggal Lahir</label>
                                                    <input type="date" id="template-wedding-last-name" name="tgl_lahir" value="<?php echo $info->tgl_lahir?>" class="form-control" placeholder="" />
                                                </div >
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Jenis Kelamin</label>
                                                    <select class="form-control" name="jk">
                                                        <option value="P" <?php if($info->jk == "P"):echo "selected";endif;?>>Perempuan</option>
                                                        <option value="L" <?php if($info->jk == "L"):echo "selected";endif;?>>Laki-laki</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Email</label>
                                                    <input type="email" id="template-wedding-first-name" name="email" value="<?php echo $info->email?>" class="form-control required" placeholder="Email Anda" />
                                                </div>
                                                <div class="col-md-12 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Alamat</label>
                                                    <input type="text" id="template-wedding-first-name" name="alamat" value="<?php echo $info->alamat?>" class="form-control required" placeholder="Alamat Lengkap Anda" />
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" id="template-wedding-submit" name="template-wedding-submit" class="btn btn-secondary btn-block btn-lg">SIMPAN</button>
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