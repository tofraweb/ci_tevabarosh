
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
                        <img class="img-responsive img-hover" src="<?php echo base_url();?>assets/img/media/upload/<?php echo $species->picture;?>" alt="">
                    </a>
                    <h3>
                        <a href="<?php echo base_url();?>index.php/catalog/getSpecies/<?php echo $species->id;?>"><?php echo $species->title;?></a>
                    </h3>
                </div>
              <?php }
             }?>
        </div>
        <?php echo '<hr>'.$pagination; ?>
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
