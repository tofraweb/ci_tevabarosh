

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">בית</a></li>
                    <li class="active"><?php echo $order->name_he;?></li>
                    <li class="active"><?php echo $family->name_he;?></li>
                    <li class="active"><?php echo $genus->name_he;?></li>
                    <li class="active"><?php echo $species[0]->name_he;?></li>
                </ol>
                <h1 class="page-header"><?php echo $species[0]->name_he;?>
                    <small> - <?php echo $species[0]->name_lat;?></small>
                    <?php if($logged_in){ ?>
                    <small> - <a target="_blank" href="<?php echo base_url();?>admin/species_management/edit/<?php echo $species[0]->id;?>">ערוך</a></small>
                    <?php } ?>
                </h1>
            </div>
        </div>
        <!-- /.row -->


        <!-- Species Family Details Row -->
        <div class="row">
          <div class="col-md-12">
            <?php if(!empty($genus->name_he)) { ?>
            <div class="table-responsive">
              <table class = "table table-bordered">
                <tr>
                  <th class="info" style="text-align:right">סוג</td>
                  <th class="info" style="text-align:right">משפחה</td>
                  <th class="info"style="text-align:right">סדרה</td>
                </tr>
                <tr>
                  <td><?php echo $genus->name_he;?></td>
                  <td><?php echo $family->name_he;?></td>
                  <td><?php echo $order->name_he;?></td>
                </tr>
                <tr>
                  <td><?php echo $genus->name_lat;?></td>
                  <td><?php echo $family->name_lat;?></td>
                  <td><?php echo $order->name_lat;?></td>
                </tr>
              </table>
            </div>
            <?php } ?>
            <div class="table-responsive">
              <?php if(!empty($species[0]->name_hu)) { ?>
                <table class = "table table-bordered">
                  <tr>
                    <th class="info" style="text-align:right">שם בהונגרית</td>
                  </tr>
                  <tr>
                    <td><?php echo $species[0]->name_hu;?></td>
                  </tr>
                </table>
              <?php } ?>
              </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Species Row -->
        <div class="row">
            <?php if(!empty($species[0]->picture)) { ?>
            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species[0]->picture;?>" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <?php } ?>

            <div class="col-md-4">
                <?php if(!empty($species[0]->description)) { ?>
                <h3>תיאור קצר</h3>
                <p><?php echo $species[0]->description;?></p>
                <?php } ?>
                <p><a class="btn btn-info" href="javascript:history.back()">חזור</a></p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>
