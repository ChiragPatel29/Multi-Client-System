    <?php require 'header.php' ?>
            <!-- page content -->
		
		<div class="right_col" role="main" style="height:100%">
		
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>User Contact Data</h3>
					<div class="clearfix"></div>
                  </div>
				
                  <div class="x_content">
				  <h2>User Data</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>subject</th>
                          <th>Message</th>	
						  <th></th>
                        </tr>
                      </thead>


                      <tbody>
					  <?php
						$link=mysqli_connect("localhost","root","","data");
						$q1=mysqli_query($link,"select * from contact_data");
						while($res=mysqli_fetch_array($q1))
						{
							echo "<tr><td>";
							echo $res['name'];
							echo "</td><td>";
							echo $res['email'];
							echo "</td><td>";
							echo $res['subject'];
							echo "</td><td>";
							echo $res['message'];
							echo "</td><td><a href='delete_contact_data.php?id=".$res['id']."'>Delete</a></td></tr>";
						}
						?>
						
						
                        </tbody>
                    </table>
					
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