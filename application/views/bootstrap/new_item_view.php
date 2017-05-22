
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


<h2>Enter new product: </h2>
<form  action="checkItem" method="post" enctype="multipart/form-data"">
      <table>
              <tr>
                      <td><label for="title">Book title:</label></td>
                      <td><input type="text" name="title" id="title" value="" /></td>
              </tr>
              <tr>
                      <td>Genre:</td>
                       <td>
                              <select name="category_id" size="1">
                              		<?php foreach ($category_list as $value){
                              			echo "<option value='".$value->id."'>".$value->name."</option>";
                              		}?>
                              </select>
                      </td>


             			 <td>
             			 		Description
             			 </td>
                      <td>
                      	<textarea cols="40" rows="5" name="description"></textarea>
                      </td>
               </tr>

              <tr>
              	<td>Upload file:</td>
              	<td><input type="file" name="userfile" size="20" /></td>
              </tr>
              <tr><td colspan="2"><input type="submit" value="Save" /></td></tr>
              <tr>
             		 <td>
             		 	<?php if(isset($error_message)){echo "Error:";} ?>
              	 </td>
              	 <td>
              	 	<?php if(isset($error_message['title'])){echo $error_message['title'];}
              	 		  if (isset($error_message['description'])){echo $error_message['description'];}
              	 	?>
              	 </td>
              </tr>
      </table>
      </form>

            </div>
        </div>
        <!-- /.row -->

        <hr>
