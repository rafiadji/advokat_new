<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap bg-light">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($konsultasi->tanggal_konsul > date('Y-m-d') || $konsultasi->tanggal_konsul < date('Y-m-d')):?>
                            <div class="alert alert-warning">
							    <i class="icon-warning-sign"></i>Oops! Konsultasi Anda di jadwalkan pada tanggal <strong><?php echo $konsultasi->tanggal_konsul?> di jam <?php echo $konsultasi->jam_konsul?></strong>. Mohon membuka laman ini pada jadwal yang telah di tentukan.
							</div>
                            <?php else:?>
                            <div class="meet embed-responsive embed-responsive-16by9"></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->
<script src="https://meet.jit.si/external_api.js"></script>
<script>
	var domain = "meet.jit.si";
	var options = {
		roomName: "<?php echo $konsultasi->room_konsul?>",
		parentNode: document.querySelector('.meet'),
		configOverwrite: {},
		interfaceConfigOverwrite: {},
		userInfo: {
			displayName: '<?php echo $this->session->userdata('nama')?>'
		}
	}
	var api = new JitsiMeetExternalAPI(domain, options);
</script>