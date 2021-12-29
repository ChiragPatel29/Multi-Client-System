    <?php require 'header.php' ?>
        <div class="right_col" role="main" style="height:100%">
    
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>About</h3>
          <div class="clearfix"></div>
                  </div>
        
                  <div class="x_content">
          <h2>About Data</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>


                      <tbody>
            <?php
            $link=mysqli_connect("localhost","root","","data");
            $q1=mysqli_query($link,"select * from about");
            while($res=mysqli_fetch_array($q1))
            {
              echo "<tr><td>";?>
              <?php echo $res['title'];?>
              <?php
              echo "</td><td>";
              echo $res['content'];
              echo "</td><td><a href='edit_about_1.php?id=".$res['id']."'>Edit</a></td><td><a href='delete_about.php?id=".$res['id']."'>Delete</a></td></tr>";
            }
            ?>
            
            
                        </tbody>
                    </table>
          <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <center><a href="add_about_1.php"><input type="button" class="btn btn-success" value="Add New About" ></a></center>
                        </div>
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