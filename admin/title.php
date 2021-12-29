    <?php require 'header.php' ?>
        <!-- page content -->
		
		<div class="right_col" role="main" style="height:100%">
		
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Title</h3>
					<div class="clearfix"></div>
                  </div>
				
                  <div class="x_content">
				  <h2>Title Data</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Title</th>
                            </tr>
                      </thead>


                      <tbody>
						<?php
						$link=mysqli_connect("localhost","root","","data");
						$q1=mysqli_query($link,"select * from title");
						while($res=mysqli_fetch_array($q1))
						{
							echo "<tr><td>";
							echo $res['name'];
							echo "</td>";
							echo "<tr>";
						}
						?>
                        </tbody>
						
                    </table>
                  </div>
			
               
                  <div class="x_title">
                    <h2>Update Title</h2>
                    <div class="clearfix"></div>
                  </div>
				  
					<div class="x_content">
                    <br/>
					<?php
					$link=mysqli_connect("localhost","root","","data");
					$q1=mysqli_query($link,"select * from title");
					while($res=mysqli_fetch_array($q1))
					{
					?>	
					<form name="myform" method="post" action="edit_title.php" class="form-horizontal form-label-left">
					
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Title:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $res['name']; ?> " name="title" class="form-control col-md-7 col-xs-12">
						  </div>
                      </div>
                      
                      </div>
					  <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
					  </center>
                    </form>
					<?php
					}
					?>
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