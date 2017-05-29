
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">קטלוג מלא
                    <small><?php echo $pageTitle; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Three Column Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active" style="width:33%;"><a href="#hebrew" aria-controls="hebrew" role="tab" data-toggle="tab">עברית</a></li>
          <li role="presentation" style="width:33%;"><a href="#latin" aria-controls="latin" role="tab" data-toggle="tab">Latin</a></li>
          <li role="presentation" style="width:33%;"><a href="#hungarian" aria-controls="hungarian" role="tab" data-toggle="tab">Magyar</a></li>
        </ul>
        <div class="row text-center">
              <h3><?php
                  if($search != null){
                      echo "תוצאות חיפוש עבור ביטוי - \"".htmlspecialchars($search)."\"";
                  }else{
                      if($section != null){ ?>
                          <a href = "<?php echo base_url();?>index.php/catalog">קטלוג המלא</a> &gt;&gt;
                      <?php
                      echo $pageTitle ;
                    }
                  }?>
              </h3>
              <?php
              if($total_items <1){
                  echo "<p>לא נמצאו תוצאות עבור הביטוי שחיפשת</p>";
                  echo "<p>חפש שוב או  <a href=\"index.php/catalog\">נסה את האטלוג המלא</a></p>";
              }else{
              echo $pagination.'<hr>';?>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="hebrew">
                  <?php foreach ($catalog as $species) {?>
                    <div class="col-md-4 img-portfolio">
                        <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                            <img class="img-responsive img-hover img-rounded img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                        </a>
                        <h3>
                            <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_he;?></a>
                        </h3>
                    </div>
                  <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="latin">
                  <?php foreach ($catalog as $species) {?>
                    <div class="col-md-4 img-portfolio">
                        <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                            <img class="img-responsive img-hover img-rounded img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                        </a>
                        <h3>
                            <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_lat;?></a>
                        </h3>
                    </div>
                  <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="hungarian">
                  <?php foreach ($catalog as $species) {?>
                    <div class="col-md-4 img-portfolio">
                        <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                            <img class="img-responsive img-hover img-rounded img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                        </a>
                        <h3>
                            <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_hu;?></a>
                        </h3>
                    </div>
                  <?php } ?>
                </div>
            </div>
            <?php } ?>
            <?php echo '<hr>'.$pagination; ?>
        </div>
        <hr>
