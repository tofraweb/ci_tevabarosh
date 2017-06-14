
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
          <div id="MainMenu">

         </div>
          <div class="col-md-3">
            <div class="list-group panel">
              <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 3</a>
              <div class="collapse" id="demo3">
                <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1 <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenu1">
                  <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
                  <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
                  <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
                  <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                    <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
                    <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
                  </div>
                  <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
                </div>
                <a href="javascript:;" class="list-group-item">Subitem 2</a>
                <a href="javascript:;" class="list-group-item">Subitem 3</a>
              </div>
              <a href="#demo4" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Item 4</a>
              <div class="collapse" id="demo4">
                <a href="" class="list-group-item">Subitem 1</a>
                <a href="" class="list-group-item">Subitem 2</a>
                <a href="" class="list-group-item">Subitem 3</a>
              </div>
               <a href="#demo5" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">Item 5</a>
                <div class="collapse" id="demo5">
                <a href="#" class="list-group-item">Subitem 1</a>
                <a href="" class="list-group-item">Subitem 2</a>
                <a href="" class="list-group-item">Subitem 3</a>
              </div>
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
        <hr>
