
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
            </div>
            <div class="list-group panel well">
                 <h4>מיון לפי סדרות</h4>
                 <div class="row">
                   <?php
                   foreach($all_orders as $order) {
                     if($kingdom == $order->kingdom_id) { ?>
                     <div style="margin-right: 0px">
                         <ul>
                             <li><a <?php if($current_order == $order) { ?> style="color:green; font-size:16px;"<?php } ?> href="<?php echo base_url();?>catalog/getSpeciesListInOrder/<?php echo $order->id;?>"><?php echo $order->name_he;?> - <?php echo $order->name_lat;?></a></li>
                         </ul>
                     </div>
                     <?php } } ?>
                     <!-- /.col-lg-6 -->
                 </div>
                 <!-- /.row -->
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
                          <h4>
                              <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_he;?></a>
                          </h4>
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
