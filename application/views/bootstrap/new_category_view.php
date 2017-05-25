
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
            <div class="col-lg-4">

              <h2>הוסף שך של קטגוריה</h2>
              <!-- old form
              <form class="form" action="storeCategory" method="post" enctype="application/x-www-form-urlencoded">
                  <table>
                      <tr>
                        <td><label for="name">שם קטגוריה חדש:</label></td>
                        <td><input type="text" name="name" id="name" value="" /></td>
                      </tr>

                      <tr><td colspan="2"><input type="submit" value="Save" /></td></tr>
                      <tr>
                     		 <td>
                     		 	<?php if(isset($error_message)){echo "Error:";} ?>
                      	 </td>
                      	 <td>
                      	 	<?php if(isset($error_message['name'])){echo $error_message['name'];}
                      	 	?>
                      	 </td>
                      </tr>
                  </table>
              </form>
              end of old form -->
              <code style="width:500px;">
                  <?php
                  if(isset($error_message['name'])){
                      echo "<span style='color:red'>".$error_message['name']."</span>";
                  }
                  $form_attributes = array(
                      'class' => 'form-horizontal',
                      'method' => "post"
                  );
                  $username_input_attributes = array(
                      'class' => 'form-control',
                      'name' => 'name',
                      'placeholder' => 'הכנס שם קטגוריה',
                      'type' => 'text',
                      'id' =>  'name'
                  );
                  $button_attributes = array(
                      'class' => 'btn btn-success',
                      'name' => 'send_form',
                      'type' => 'submit',
                      'value' => 'שמור'
                  );
                  echo form_open('category/storeCategory', $form_attributes);
                  echo form_label('שם קטגוריה חדשה:');
                  echo form_input($username_input_attributes);
                  echo form_input($button_attributes);
                  echo form_close();
                  ?>
              </code>

            </div>
        </div>
        <!-- /.row -->

        <hr>
