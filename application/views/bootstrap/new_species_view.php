  <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">הספת צמח/ציפור</h2>
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
            <div class="col-lg-6">

        <code>
          <form style="width:500px;" action="checkItem" method="post" enctype="multipart/form-data"">
              <table>
                  <tr>
                    <td><label for="name_he">שם בעברית</label></td>
                    <td><input class="form-control" type="text" name="name_he" id="name_he" value="" /></td>
                  </tr>
                  <tr>
                    <td><label for="name_lat">שם בלטינית</label></td>
                    <td><input class="form-control" type="text" name="name_lat" id="name_lat" value="" /></td>
                  </tr>
                  <tr>
                    <td><label for="name_hu">שם בהונגרית</label></td>
                    <td><input class="form-control" type="text" name="name_hu" id="name_hu" value="" /></td>
                  </tr>
                  <tr>
                    <td><label for="featuring">מובחר</label></td>
                    <td><input type="checkbox" name="featuring"></td>
                  </tr>
                  <tr>
                    <td><label for="frontpage">לדף הבית</label></td>
                    <td><input type="checkbox" name="frontpage"></td>
                  </tr>
                  <tr>
                    <td><label for="category_id">קטגוריה</label></td>
                    <td>
                      <select class="form-control" name="category_id" size="1" value="0">
                        <option selected disabled hidden>בחר קטגוריה</option>
                        <?php foreach ($category_list as $value){
                        echo "<option value='".$value->id."'>".$value->name."</option>";
                        }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><label for="description">תיאור קצר</label></td>
                    <td><textarea class="form-control" cols="40" rows="5" name="description"></textarea></td>
                  </tr>
                  <tr>
                    <td>Upload file:</td>
                    <td><input type="file" name="userfile" size="20" /></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="submit" value="Save" /></td></tr>
                  <tr>
                    <td><?php if(isset($error_message)){echo "Error:";} ?></td>
                    <td>
                      <?php if(isset($error_message['name_he'])){echo $error_message['name_he'];}
                      if (isset($error_message['description'])){echo $error_message['description'];}?>
                    </td>
                  </tr>
              </table>
            </form>
          </code>
        </div>

        </div>
        <!-- /.row -->

        <hr>
