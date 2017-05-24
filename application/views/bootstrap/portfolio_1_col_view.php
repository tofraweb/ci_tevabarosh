
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">One Column Portfolio
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">One Column Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->

            <?php foreach ($catalog as $item) {?>
              <div class="row">
                <div class="col-md-7">
                  <a href="<?php echo base_url();?>index.php/catalog/getItem/<?php echo $item->id;?>">
                      <img class="img-responsive img-hover" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $item->picture;?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                    <h3><?php echo $item->title;?></h3>
                    <h4><?php echo $item->title_lat;?></h4>
                    <h4><?php echo $item->title_hun;?></h4>
                    <p><?php echo $item->description;?></p>
                    <a class="btn btn-primary" href="<?php echo base_url();?>index.php/catalog/getItem/<?php echo $item->id;?>">קרא עוד</i></a>
                </div>
              </div>
              <hr>
            <?php } ?>

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>
