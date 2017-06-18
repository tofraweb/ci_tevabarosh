
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <?php
                if($pageTitle) { ?>
                <div class="panel-heading">
                  <h1 class="page-header"><?php echo $pageTitle; ?>
                      <small><?php echo $subTitle; ?></small>
                  </h1>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-3">
            <div class="list-group panel well">
              <!-- Blog Search Well -->
              <div>
                  <h5>חיפוש</h5>
                  <div class="input-group">
                      <input type="text" class="form-control">
                      <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                      </span>
                  </div>
                  <!-- /.input-group -->
              </div>
              <?php
              // var_dump($category);
              // exit;
              if($category->type == 1 || $cat_type == 1){?>
              <div>
                <h5 style="margin-top:20px; margin-bottom:10px;">מיון לפי</h5>
                <a href="#by-color" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">צבע הפרח</a>
                <div class="collapse" id="by-color">
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/red/1" class="list-group-item">אדום</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/pink/1" class="list-group-item">ורוד</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/orange/1" class="list-group-item">כתום</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/blue/1" class="list-group-item">כחול</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/white/1" class="list-group-item">לבן</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/purple/1" class="list-group-item">סגול</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/flower_color/yellow/1" class="list-group-item">צהוב</a>
                </div>
                 <a href="#by-watering" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">השקיה</a>
                  <div class="collapse" id="by-watering">
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/watering/little/1" class="list-group-item">מועטה</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/watering/some/1" class="list-group-item">בינונית</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/watering/lot/1" class="list-group-item">מרובה</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/watering/no-dry/1" class="list-group-item">רגיש ליובש</a>
                  <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/watering/no-wet/1" class="list-group-item">רגיש לעודף השקיה</a>
                </div>
                <a href="#by-sunlight" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">תנאי אור</a>
                 <div class="collapse" id="by-sunlight">
                 <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/light_conditions/full-shade/1" class="list-group-item">צל מלא</a>
                 <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/light_conditions/partly-shade/1" class="list-group-item">צל חלקי</a>
                 <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/light_conditions/partly-sun/1" class="list-group-item">שמש חלקית</a>
                 <a href="<?php echo base_url();?>catalog/getSpeciesSorted/<?php echo $catalog; ?>/plant_properties/light_conditions/full-sun/1" class="list-group-item">שמש מלאה</a>
               </div>
             </div>
             <?php } else { ?>
               <div>
                 <h5 style="margin-top:20px; margin-bottom:10px;">מיון לפי</h5>
                 <a href="#by-color" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">מיון 1</a>
                 <div class="collapse" id="by-color">
                   <a href="#" class="list-group-item">אדום</a>
                   <a href="#" class="list-group-item">ורוד</a>
                 </div>
                  <a href="#by-watering" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">מיון 2</a>
                   <div class="collapse" id="by-watering">
                   <a href="#" class="list-group-item">מועטה</a>
                   <a href="#" class="list-group-item">בינונית</a>
                 </div>
                 <a href="#by-sunlight" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">מיון 3</a>
                  <div class="collapse" id="by-sunlight">
                  <a href="#" class="list-group-item">צל מלא</a>
                  <a href="#" class="list-group-item">צל חלקי</a>
                </div>
              </div>
             <?php } ?>
            </div>
          </div>
          <!-- Nav tabs -->
          <div class="col-md-9 text-center">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active" style="width:31%;"><a href="#hebrew" aria-controls="hebrew" role="tab" data-toggle="tab">עברית</a></li>
            <li role="presentation" style="width:31%;"><a href="#latin" aria-controls="latin" role="tab" data-toggle="tab">Latin</a></li>
            <li role="presentation" style="width:31%;"><a href="#hungarian" aria-controls="hungarian" role="tab" data-toggle="tab">Magyar</a></li>
          </ul>
          <!-- <div class="row text-center"> -->
                <h3><?php
                    if($search != null){
                        echo "תוצאות חיפוש עבור ביטוי - \"".htmlspecialchars($search)."\"";
                    }?>
                </h3>
                <?php
                if($total_items <1){
                    echo "<p>לא נמצאו תוצאות עבור הביטוי שחיפשת</p>";
                    echo "<p>חפש שוב או  <a href=\"index.php/catalog\">נסה את האטלוג המלא</a></p>";
                }else{
                if($pagination){
                  echo $pagination.'<hr>';
                }?>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="hebrew">
                    <?php foreach ($catalog as $species) {?>
                      <div class="col-md-4 img-portfolio">
                        <div class="thumbnail">
                          <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                              <img class="img-hover img-catalog" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                          </a>
                          <h5>
                            <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_he;?></a>
          									<small>
          										<?php echo ' '.$species->name_lat;?>
          									</small>
            							</h5>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="latin">
                    <?php foreach ($catalog as $species) {?>
                      <div class="col-md-4 img-portfolio">
                        <div class="thumbnail">
                          <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                              <img class="img-hover img-catalog" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                          </a>
                          <h4>
                              <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_lat;?></a>
                          </h4>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="hungarian">
                    <?php foreach ($catalog as $species) {?>
                      <div class="col-md-4 img-portfolio">
                        <div class="thumbnail">
                          <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                              <img class="img-hover img-catalog" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                          </a>
                          <h4>
                              <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_hu;?></a>
                          </h4>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
              </div>
              <?php } ?>
              <?php if($pagination){
                echo '<hr>'.$pagination;
              }?>

          <!-- </div> -->
        </div>
        <!-- end row -->
        <div class="text-center">
          <a class="btn btn-info" href="javascript:history.back()">חזרה</a>
        <div>
        <hr>
