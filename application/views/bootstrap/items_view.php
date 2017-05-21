
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
                  <th  style="text-align:right;">שם הציפור</th>
                  <th  style="text-align:right;">תמונה</th>
                </tr>
                <?php
                foreach ($items as $var){
                echo "
                <tr>
                  <td>".$var->title."</td>
                  <td>Picture 1</td>
                </tr>
                ";}
                ?>
              </table>

            </div>
        </div>
        <!-- /.row -->

        <hr>