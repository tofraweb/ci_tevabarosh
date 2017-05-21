
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">הגדרת צמח חדש
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">בית</a>
                    </li>
                    <li class="active">הגדרת צמח חדש</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">

              <?php echo $error;?>

              <?php echo form_open_multipart('upload/do_upload');?>

              <input type="file" name="userfile" size="20" />

              <br /><br />

              <input type="submit" value="שלח" />

              </form>

            </div>
        </div>
        <!-- /.row -->

        <hr>
