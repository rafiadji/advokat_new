<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap bg-light">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="card my-5 shadow-sm">
                        <div class="card-body p-5">

                            <h4 class="ls4 center">Profile</h4>

                            <div class="form-widget" data-alert-type="false">

                                <form class="mb-0" id="template-wedding" name="template-wedding" action="include/form.php" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-first-name">First Name<small class="text-danger">*</small></label>
                                                    <input type="text" id="template-wedding-first-name" name="template-wedding-first-name" value="" class="form-control required" placeholder="Enter your First Name" />
                                                </div>
                                                <div class="col-md-6 bottommargin-sm">
                                                    <label for="template-wedding-last-name">Last Name</label>
                                                    <input type="text" id="template-wedding-last-name" name="template-wedding-last-name" value="" class="form-control" placeholder="Enter your Last Name" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 bottommargin-sm">
                                            <label for="template-wedding-attending" class="mb-3">are you be attending?<small class="text-danger">*</small></label><br>
                                            <div class="btn-group btn-group-toggle nav" data-toggle="buttons">
                                                <a href="#attending-tab-1" class="btn btn-outline-success flex-fill" data-toggle="tab">
                                                    <input type="radio" name="template-wedding-attending" id="template-wedding-attending-yes" class="required" value="Yes">Yes
                                                </a>
                                                <a href="#attending-tab-2" class="btn btn-outline-danger flex-fill" data-toggle="tab">
                                                    <input type="radio" name="template-wedding-attending" id="template-wedding-attending-no" class="required" value="No">No
                                                </a>
                                                <a href="#attending-tab-3" class="btn btn-outline-info flex-fill" data-toggle="tab">
                                                    <input type="radio" name="template-wedding-attending" id="template-wedding-attending-may be" class="required" value="May be">May be
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" id="template-wedding-submit" name="template-wedding-submit" class="btn btn-secondary btn-block btn-lg">RSVP</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <a href="#myModal1" data-lightbox="inline" class="template-wedding-success-modal d-none"></a>
                            <div class="modal1 mfp-hide" id="myModal1">
                                <div class="block mx-auto" style="background-color: #FFF; max-width: 600px;">
                                    <div class="clearfix" style="padding: 50px;">
                                        <i class="icon-smile1 color display-4 mb-2"></i>
                                        <h3 class="mb-3">Thank You.</h3>
                                        <h5 class="lead font-weight-semibold ls1 text-uppercase my-4">Your RSVP has been Confirmed.</h5>
                                        <p class="font-weight-normal mb-0">Thank you very much for attending our Wedding. If you need any other information from me then Please let me contact to <a href="mailto:no.reply@semicolonweb.com"><u>no.reply@semicolonweb.com</u></a></p>
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