
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
          <div>
            <h2 class="page-header" style="background-color:#fff; margin:0px;"><?php echo $species[0]->name_he;?>
                <?php if(!$is_mobile) { ?><small> - <?php echo $species[0]->name_hu;?></small><?php } ?>
                <small><?php if(!$is_mobile) { ?> - <?php } ?><?php echo $species[0]->name_lat;?></small>
            </h2>
          </div>
        </div>
        <?php if(!$is_mobile) { ?>
        <!-- <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">בית</a></li>
                    <?php if($order->name_he) { ?><li><a href="<?php echo base_url();?>catalog/getSpeciesListInOrder/<?php echo $order->id;?>"><?php echo $order->name_he;?></a></li><?php } ?>
                    <?php if($family->name_he) { ?><li><a href="<?php echo base_url();?>catalog/getSpeciesListInFamily/<?php echo $family->id;?>"><?php echo $family->name_he;?></a></li><?php } ?>
                    <?php if($genus->name_he) { ?><li><a href="<?php echo base_url();?>catalog/getSpeciesListInGenus/<?php echo $genus->id;?>"><?php echo $genus->name_he;?></a></li><?php } ?>
                    <li class="active"><?php echo $species[0]->name_he;?></li>
                </ol>
            </div>
        </div> -->
        <?php } ?>
        <!-- /.row -->


        <div class="row">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" style="padding-right: 10px;" role="tablist">
            <li role="presentation" class="active" style="width:33%"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">מידע מדעי</a></li>
            <li role="presentation" style="width:33%"><a href="#properties" aria-controls="properties" role="tab" data-toggle="tab">מאפיינים</a></li>
            <li role="presentation" style="width:33%"><a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">תמונות</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="info">
              <div class="col-md-6">
                <div class="table-responsive">
                  <table class = "table table-bordered table-striped " style="width:100% !important">
                    <tr>
                      <th class="info" style="text-align:right">שם
                        <?php if($logged_in){ ?>
                          <small><a target="_blank" href="<?php echo base_url();?>admin/species_management/edit/<?php echo $species[0]->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></small>
                        <?php } ?>
                      </th>
                      <td style="text-align:center; color: #31b0d5"><b><?php echo $species[0]->name_he;?></b></td>
                      <td style="text-align:center; color: #31b0d5"><b><?php echo $species[0]->name_lat;?></b></td>
                      <?php if(!$is_mobile) { ?><td style="text-align:center; color: #31b0d5"><b><?php echo $species[0]->name_hu;?></b></td><?php } ?>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right">סוג</th>
                      <td style="text-align:center"><a href="<?php echo base_url();?>catalog/getSpeciesListInGenus/<?php echo $genus->id;?>"><?php echo $genus->name_he;?></a></td>
                      <td style="text-align:center"><?php echo $genus->name_lat;?></td>
                      <?php if(!$is_mobile) { ?><td style="text-align:center"><?php echo $genus->name_hu;?></td><?php } ?>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right">משפחה</th>
                      <td style="text-align:center"><a href="<?php echo base_url();?>catalog/getSpeciesListInFamily/<?php echo $family->id;?>"><?php echo $family->name_he;?></a></td>
                      <td style="text-align:center"><?php echo $family->name_lat;?></td>
                      <?php if(!$is_mobile) { ?><td style="text-align:center"><?php echo $family->name_hu;?></td><?php } ?>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right">סדרה</th>
                      <td style="text-align:center"><a href="<?php echo base_url();?>catalog/getSpeciesListInOrder/<?php echo $order->id;?>"><?php echo $order->name_he;?></a></td>
                      <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      <?php if(!$is_mobile) { ?><td style="text-align:center"><?php echo $order->name_hu;?></td><?php } ?>
                    </tr>
                  </table>
                </div>
                <p style="text-align:center; margin-top: 10px;"><a class="btn btn-info" href="javascript:history.back()">חזרה</a></p>
              <div>
                  <?php if(!empty($species[0]->description)) { ?>
                  <h4 style="background-color:#d9edf7">תיאור קצר</h4>
                  <p><?php echo $species[0]->description;?></p>
                  <?php } ?>
              </div>
              </div>
              <div class="col-md-6">
                <img class="img-rounded img-species" style="cursor: zoom-in;" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species[0]->picture;?>" alt="">
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="properties">
              <div class="row" >
                <?php if($category->type == 1) { ?>
                <div class="col-md-6">
                  <table class = "table table-bordered table-striped " style="width:100% !important">
                    <tr>
                      <th class="info" style="text-align:right; width:20%;">תנאי אור
                        <?php if($logged_in){
                            if($properties->id){ ?>
                          <small><a target="_blank" href="<?php echo base_url();?>admin/plant_properties_management/edit/<?php echo $properties->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></small>
                        <?php } else { ?>
                          <small><a target="_blank" href="<?php echo base_url();?>admin/plant_properties_management/add"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></small>
                        <?php } } ?>
                      </th>
                      <td style="text-align:center"><?php echo $properties->light_conditions;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right; width:20%;">השקיה</th>
                      <td style="text-align:center"><?php echo $properties->watering;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right; width:20%;">צבע פריחה</th>
                      <td style="text-align:center"><?php echo $properties->flower_color;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right; width:20%;">עונת פריחה</th>
                      <td style="text-align:center"><?php echo $properties->blooming_season;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right;width:20%;">שימוש</th>
                      <td style="text-align:center"><?php echo $properties->best_usage;?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class = "table table-bordered table-striped " style="width:100% !important">
                    <tr>
                      <th class="info" style="text-align:right; width:20%;">מחזור חיים</th>
                      <td style="text-align:center"><?php echo $properties->life_span;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right;width:20%;">קצב צמיחה</th>
                      <td style="text-align:center"><?php echo $properties->growing_speed;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right;width:20%;">גובה</th>
                      <td style="text-align:center"><?php echo $properties->height;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right;width:20%;">רוחב</th>
                      <td style="text-align:center"><?php echo $properties->width;?></td>
                    </tr>
                    <tr>
                      <th class="info" style="text-align:right; width:20%;">ארץ מוצא</th>
                      <td style="text-align:center"><?php echo $properties->origin;?></td>
                    </tr>
                  </table>
                </div>
                <?php } else { ?>
                  <div class="col-md-6">
                    <table class = "table table-bordered table-striped " style="width:100% !important">
                      <tr>
                        <th class="info" style="text-align:right; width:20%;">דגכע</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right; width:20%;">גכע</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right; width:20%;">קרא</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right; width:20%;">שדגכ</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right;width:20%;">שדגכ</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <table class = "table table-bordered table-striped " style="width:100% !important">
                      <tr>
                        <th class="info" style="text-align:right; width:20%;">דגעג</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right;width:20%;">שדגקכ</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right;width:20%;">דגע</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right;width:20%;">דגכ</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                      <tr>
                        <th class="info" style="text-align:right; width:20%;">ךשדלגחכ</th>
                        <td style="text-align:center"><?php echo $order->name_lat;?></td>
                      </tr>
                    </table>
                  </div>
                  <?php } ?>
              </div>
              <!-- /.row -->
            </div>
            <div role="tabpanel" class="tab-pane" id="pictures">
              <div class="row">
                  <?php// var_dump($pictures[2]->filename); exit; ?>
                  <?php if(!empty($pictures)) { ?>
                  <div class="col-md-12">
                  <?php foreach ($pictures as $picture) {?>
                    <div class="col-md-4 img-portfolio">
                      <img class="img-hover img-rounded img-species img-thumbnail" style="cursor: zoom-in;" src="<?php echo base_url();?>assets/img/media/upload/small/<?php echo $picture->filename;?>" alt="">
                    </div>
                  <?php } ?>
                  </div>
                  <?php } ?>
              </div>
              <!-- /.row -->
            </div>
            <!-- <div role="tabpanel" class="tab-pane" id="slider">
              <div id="speciesCarousel" class="carousel slide"> -->
                  <!-- Indicators -->
                  <!-- <ol class="carousel-indicators">
                      <li data-target="#speciesCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#speciesCarousel" data-slide-to="1"></li>
                      <li data-target="#speciesCarousel" data-slide-to="2"></li>
                      <li data-target="#speciesCarousel" data-slide-to="3"></li>
                      <li data-target="#speciesCarousel" data-slide-to="4"></li>
                  </ol> -->

                  <!-- Wrapper for slides -->
                  <!-- <div class="carousel-inner">
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
                  </div> -->

                  <!-- Controls -->
                  <!-- <a class="right carousel-control" href="#speciesCarousel" data-slide="prev">
                      <span class="icon-prev"></span>
                  </a>
                  <a class="left carousel-control" href="#speciesCarousel" data-slide="next">
                      <span class="icon-next"></span>
                  </a> -->
              <!-- </div> -->
          </div>

        </div>

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px">
                <h3 class="page-header" style="padding-top:5px">עוד מינים מסדרת <a href="<?php echo base_url();?>catalog/getSpeciesListInOrder/<?php echo $order->id;?>"><?php echo $order->name_he;?></a></h3>
            </div>
            <?php
            foreach($random_species as $sp) {
            ?>
            <div class="col-sm-3 col-xs-6">
                <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $sp->id;?>">
                    <img class="img-responsive img-rounded img-hover img-related" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $sp->picture;?>" alt="">
                </a>
            </div>
            <?php } ?>
        </div>
        <!-- /.row -->
        <hr>
