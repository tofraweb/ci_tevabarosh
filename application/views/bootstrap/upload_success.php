
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">הוספת צמח חדש בהצלחה
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">בית</a>
                    </li>
                    <li class="active">הגדרה מוצלחת</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
              <h1>פרטי התמונה
              </h1>
              <ul>
              <?php foreach ($upload_data as $item => $value):?>
              <li><?php echo $item;?>: <?php echo $value;?></li>
              <?php endforeach; ?>
              </ul>

              <p><?php echo anchor('upload', 'הוסף עוד צמח'); ?></p>

            </div>
        </div>
        <!-- /.row -->

        <hr>
