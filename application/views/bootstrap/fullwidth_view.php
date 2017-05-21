
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
                <p>Most of Start Bootstrap's unstyled templates can be directly integrated into the Modern Business template. You can view all of our unstyled templates on our website at <a href="http://startbootstrap.com/template-categories/unstyled">http://startbootstrap.com/template-categories/unstyled</a>.</p>

                <!-- image uploader -->
                <form action="<?php base_url() ?>index.php/upload/do_upload" method="POST" enctype="multipart/form-data" >
                Select File To Upload:<br />
                <input type="file" name="userfile" multiple="multiple"  />

                <input type="submit" name="submit" value="Upload" class="btn btn-success" />
                  </form>

                  <?php /*
                  if isset($uploaded_file) {
                      foreach ($uploaded_file as $name => $value){
                          echo $name->value."<br />";
                      }
                    }*/
                  ?>


  <!-- image uploader end -->

            </div>
        </div>
        <!-- /.row -->

        <hr>
