
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Three Column Portfolio
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Three Column Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
              <?php foreach ($catalog as $item) {?>
                <div class="col-md-4 img-portfolio">
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
