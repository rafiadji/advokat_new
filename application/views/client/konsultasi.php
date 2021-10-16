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
							    <i class="icon-warning-sign"></i><strong>Warning!</strong> <?php echo $konsultasi->tanggal_konsul?> Better check yourself, you're not looking too good.
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
		interfaceConfigOverwrite: {}
	}
	var api = new JitsiMeetExternalAPI(domain, options);
</script>