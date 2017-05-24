
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Two Column Portfolio
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Two Column Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
          <!-- Projects Row -->
          <div class="row">
                <?php foreach ($catalog as $item) {?>
                  <div class="col-md-6 img-portfolio">
                      <a href="<?php echo base_url();?>index.php/catalog/getItem/<?php echo $item->id;?>">
                          <img class="img-responsive img-hover" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $item->picture;?>" alt="">
                      </a>
                      <h3>
                          <a href="<?php echo base_url();?>index.php/catalog/getItem/<?php echo $item->id;?>"><?php echo $item->title;?></a>
                      </h3>
                      <p><?php echo $item->description;?></p>
                  </div>
                <?php } ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.row -->


        <hr>
