
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Full Width Page
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Full Width Page</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">

              <h3>רשימת כל הציפורים</h3>
              <table class="table">
                <tr>
                  <th  style="text-align:right;">#</th>
                  <th  style="text-align:right;">שם הציפור</th>
                  <th  style="text-align:right;">תמונה</th>
                </tr>
                <?php
                $i = 0;
                $pic_path = base_url();
                foreach ($items as $var){
                $i+=1;
                echo "
                <tr>
                  <td>".$i."</td>
                  <td>".$var->title."</td>
                  <td><img src='".$pic_path."assets/img/media/upload/".$var->picture."'</td>
                </tr>
                ";}
                ?>
              </table>

            </div>
        </div>
        <!-- /.row -->

        <hr>
