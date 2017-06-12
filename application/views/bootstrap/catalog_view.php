
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
              <div class="list-group">
                  <a href="index.html" class="list-group-item">Home</a>
                  <a href="about.html" class="list-group-item">About</a>
                  <a href="services.html" class="list-group-item">Services</a>
                  <a href="contact.html" class="list-group-item">Contact</a>
                  <a href="portfolio-1-col.html" class="list-group-item">1 Column Portfolio</a>
                  <a href="portfolio-2-col.html" class="list-group-item">2 Column Portfolio</a>
                  <a href="portfolio-3-col.html" class="list-group-item">3 Column Portfolio</a>
                  <a href="portfolio-4-col.html" class="list-group-item">4 Column Portfolio</a>
                  <a href="portfolio-item.html" class="list-group-item">Single Portfolio Item</a>
                  <a href="blog-home-1.html" class="list-group-item">Blog Home 1</a>
                  <a href="blog-home-2.html" class="list-group-item">Blog Home 2</a>
                  <a href="blog-post.html" class="list-group-item">Blog Post</a>
                  <a href="full-width.html" class="list-group-item">Full Width Page</a>
                  <a href="sidebar.html" class="list-group-item active">Sidebar Page</a>
                  <a href="faq.html" class="list-group-item">FAQ</a>
                  <a href="404.html" class="list-group-item">404</a>
                  <a href="pricing.html" class="list-group-item">Pricing Table</a>
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
                          <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                              <img class="img-hover img-rounded img-species img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
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
                              <img class="img-hover img-rounded img-species img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
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
                              <img class="img-hover img-rounded img-species img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                          </a>
                          <h3>
                              <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_hu;?></a>
                          </h3>
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
