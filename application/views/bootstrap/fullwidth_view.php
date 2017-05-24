
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=סלייד 1');"></div>
                <div class="carousel-caption">
                    <img class="img-responsive img-hover" src="<?php echo base_url();?>assets/img/media/upload/IMG_1899898.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=סלייד 2');"></div>
                <div class="carousel-caption">
                    <h2>תמונה 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=סלייד 3');"></div>
                <div class="carousel-caption">
                    <h2>תמונה 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="right carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="left carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Full Width Page
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Full Width Page</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <p>Most of Start Bootstrap's unstyled templates can be directly integrated into the Modern Business template. You can view all of our unstyled templates on our website at <a href="http://startbootstrap.com/template-categories/unstyled">http://startbootstrap.com/template-categories/unstyled</a>.</p>

                <!-- image uploader -->
                <form action="<?php base_url() ?>index.php/upload/do_upload" method="POST" enctype="multipart/form-data" >
                Select File To Upload:<br />
                <input type="file" name="userfile" multiple="multiple"  />

                <input type="submit" name="submit" value="Upload" class="btn btn-success" />
                  </form>

                  <?php /*
                  if isset($uploaded_file) {
                      foreach ($uploaded_file as $name => $value){
                          echo $name->value."<br />";
                      }
                    }*/
                  ?>


  <!-- image uploader end -->

            </div>
        </div>
        <!-- /.row -->

        <hr>
