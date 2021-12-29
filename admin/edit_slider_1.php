    <?php require 'header.php' ?>
            <!-- page content -->
		<div style="height:800px" class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Slider</h3>
              </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit details</h2>
                    <div class="clearfix"></div>
                  </div>
				  <?php
					$id =  $_GET['id'];
					$_SESSION['slider_id']=$id;
					$link=mysqli_connect("localhost","root","","data");
					$q1=mysqli_query($link,"select * from data where id = '".$id."'");

					$res=mysqli_fetch_assoc($q1);
					
					?>
					<div class="x_content" >
                    <br/>
					<form name="myform" method="post" action="edit_slider.php" class="form-horizontal form-label-left" enctype="multipart/form-data">
					
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
					  <label class="control-label col-md-3 col-sm-3 col-xs-12">Text
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">											
						<textarea  id="text" name="text" rows="5" cols="20" class="form-control col-md-7 col-xs-12">
						</textarea>
                        </div>
                      </div>
					  <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
					  </center>
                    </form>
					</div>
                  </div>
                </div>
              </div>
            </div>
		</div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>