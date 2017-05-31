
    <!-- Popup Image -->
    <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
           <img src="" class="enlargeImageModalSource" style="width: 100%;">
         </div>
       </div>
      </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">בית</a></li>
                    <?php if($order->name_he) { ?><li><a href="<?php echo base_url();?>catalog/getSpeciesInOrder/<?php echo $order->id;?>"><?php echo $order->name_he;?></a></li><?php } ?>
                    <?php if($family->name_he) { ?><li><a href="<?php echo base_url();?>catalog/getSpeciesListInFamily/<?php echo $family->id;?>"><?php echo $family->name_he;?></a></li><?php } ?>
                    <?php if($genus->name_he) { ?><li><a href="<?php echo base_url();?>catalog/getSpeciesListInGenus/<?php echo $genus->id;?>"><?php echo $genus->name_he;?></a></li><?php } ?>
                    <li class="active"><?php echo $species[0]->name_he;?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        <div class="row">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active" style="width:33%;"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">מידע מדעי</a></li>
            <li role="presentation" style="width:33%;"><a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">תמונות</a></li>
            <li role="presentation" style="width:33%;"><a href="#slider" aria-controls="slider" role="tab" data-toggle="tab">סלידר</a></li>
          </ul>
          <div class="col-md-12">
            <h1 class="page-header"><?php echo $species[0]->name_he;?>
                <small> - <?php echo $species[0]->name_hu;?></small>
                <small> - <?php echo $species[0]->name_lat;?></small>
                <?php if($logged_in){ ?>
                <small> - <a target="_blank" href="<?php echo base_url();?>admin/species_management/edit/<?php echo $species[0]->id;?>">ערוך</a></small>
                <?php } ?>
            </h1>
          </div>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="info">
              <h2></h2>
              <div class="col-md-5">
                <div class="table-responsive">
                  <table class = "table table-bordered"  style="width:100%">
                    <tr>
                      <th class="info"></th>
                      <th class="info" style="text-align:right">עברית</td>
                      <th class="info" style="text-align:left">Latin</td>
                      <th class="info" style="text-align:left">Magyar</td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right">סדרה</th>
                      <td><?php echo $order->name_he;?></td>
                      <td style="text-align:left"><?php echo $order->name_lat;?></td>
                      <td style="text-align:left"><?php echo $order->name_hu;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right">משפחה</th>
                      <td><?php echo $family->name_he;?></td>
                      <td style="text-align:left"><?php echo $family->name_lat;?></td>
                      <td style="text-align:left"><?php echo $family->name_hu;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right">סוג</th>
                      <td><?php echo $genus->name_he;?></td>
                      <td style="text-align:left"><?php echo $genus->name_lat;?></td>
                      <td style="text-align:left"><?php echo $genus->name_hu;?></td>
                    </tr>
                  </table>
                </div>
              <div>
                  <?php if(!empty($species[0]->description)) { ?>
                  <h4 style="background-color:#d9edf7">תיאור קצר</h4>
                  <p><?php echo $species[0]->description;?></p>
                  <?php } ?>
                  <p><a class="btn btn-info" href="javascript:history.back()">חזור</a></p>
              </div>
              </div>
              <div class="col-md-7">
                <img class="img-rounded img-species" style="cursor: zoom-in;" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species[0]->picture;?>" alt="">
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="pictures">
              <div class="row">
                  <?php// var_dump($pictures[2]->filename); exit; ?>
                  <?php if(!empty($pictures)) { ?>
                  <div class="col-md-12">
                  <?php foreach ($pictures as $picture) {?>
                    <div class="col-md-4 img-portfolio">
                      <img class="img-responsive img-hover img-rounded img-thumbnail" style="cursor: zoom-in;" src="<?php echo base_url();?>assets/img/media/upload/small/<?php echo $picture->filename;?>" alt="">
                    </div>
                  <?php } ?>
                  </div>
                  <?php } ?>
              </div>
              <!-- /.row -->
            </div>
            <div role="tabpanel" class="tab-pane" id="slider">
              <div id="speciesCarousel" class="carousel slide">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                      <li data-target="#speciesCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#speciesCarousel" data-slide-to="1"></li>
                      <li data-target="#speciesCarousel" data-slide-to="2"></li>
                      <li data-target="#speciesCarousel" data-slide-to="3"></li>
                      <li data-target="#speciesCarousel" data-slide-to="4"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                      <div class="item active">
                          <div class="fill" style="background-image:url('<?php echo base_url();?>assets/img/media/upload/slider/IMG_1360-s.jpg');"></div>
                          <div class="carousel-caption">
                              <h2></h2>
                          </div>
                      </div>
                      <div class="item">
                          <div class="fill" style="background-image:url('<?php echo base_url();?>assets/img/media/upload/slider/IMG_9320-s.jpg');"></div>
                          <div class="carousel-caption">
                              <h2></h2>
                          </div>
                      </div>
                      <div class="item">
                          <div class="fill" style="background-image:url('<?php echo base_url();?>assets/img/media/upload/slider/IMG_0510-s.jpg');"></div>
                          <div class="carousel-caption">
                              <h2></h2>
                          </div>
                      </div>
                      <div class="item">
                          <div class="fill" style="background-image:url('<?php echo base_url();?>assets/img/media/upload/slider/IMG_9646-s.jpg');"></div>
                          <div class="carousel-caption">
                              <h2></h2>
                          </div>
                      </div>
                      <div class="item">
                          <div class="fill" style="background-image:url('<?php echo base_url();?>assets/img/media/upload/slider/suculents.jpg');"></div>
                          <div class="carousel-caption">
                              <h2></h2>
                          </div>
                      </div>
                  </div>

                  <!-- Controls -->
                  <a class="right carousel-control" href="#speciesCarousel" data-slide="prev">
                      <span class="icon-prev"></span>
                  </a>
                  <a class="left carousel-control" href="#speciesCarousel" data-slide="next">
                      <span class="icon-next"></span>
                  </a>
              </div>
          </div>

        </div>

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
