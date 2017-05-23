
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">קטלוג
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">בית</a>
                    </li>
                    <li class="active">קטלוג</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1><?php
                    if($search != null){
                        echo "Search results for the expression - \"".htmlspecialchars($search)."\"";
                    }else{
                        if($section != null){
                            echo "<a href = 'catalog.php'>Full catalog</a> &gt;&gt;";
                        }
                        echo $pageTitle ;
                    }?></h1>
                <?php
                // var_dump($total_items);
                // exit;
                if($total_items <1){
                    echo "<p>No items were found matching the requested rearch expression.</p>";
                    echo "<p>Search again or <a href=\"index.php/catalog.php\">Browse the full catalog</a></p>";
                }else{
                    echo $pagination;?>
                    <table class="table">
                      <tr>
                        <th  style="text-align:right;">#</th>
                        <th  style="text-align:right;">שם הציפור</th>
                        <th  style="text-align:right;">תמונה</th>
                      </tr>
                      <?php
                      $i = 0;
                      $pic_path = base_url();
                      foreach ($catalog as $var){
                        $i+=1;
                        echo "
                        <tr>
                          <td>".$i."</td>
                          <td>".$var->title."</td>
                          <td><img src='".$pic_path."assets/img/media/upload/".$var->picture."'</td>
                        </tr>
                      ";}?>
                    </table>
                    <?php echo $pagination;
                }?>

            </div>
        </div>
        <!-- /.row -->

        <hr>
