
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

        <!-- Projects Row -->
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
                  }?></h3>
              <?php
              // var_dump($total_species);
              // exit;
              if($total_items <1){
                  echo "<p>No species were found matching the requested rearch expression.</p>";
                  echo "<p>Search again or <a href=\"index.php/catalog.php\">Browse the full catalog</a></p>";
              }else{
              echo $pagination.'<hr>';
              foreach ($catalog as $species) {?>
                <div class="col-md-4 img-portfolio">
                    <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>">
                        <img class="img-responsive img-hover img-rounded img-thumbnail" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                    </a>
                    <h3>
                        <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->name_he;?></a>
                    </h3>
                </div>
              <?php }
             }?>
            <?php echo '<hr>'.$pagination; ?>
        </div>
        <!-- /.row -->
        <hr>
