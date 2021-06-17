<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
    echo view("partial/title");
    echo view("partial/head"); 
    echo view("assets/head",$ASSETS);
  ?>
  </head>
  <body>
  <!-- Page content -->
  <div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">
        <!-- Login form -->
        <form class="login-form form-horizontal cmxform" method="post" id="commentForm" action="<?=base_url()?>/home/new_password">
          <div class="card mb-0">
            <i class="border-slate-300 border-3 p-3 mb-3 mt-1">
            <img src="<?=base_url()?>/img/logo.png" class="card-img-top" alt="Image" width="150px" height="250px">
            </i>
            <div class="card-body">
              <div class="text-center mb-3">
                <h4 class="mb-0">POINT OF SALE (POS)</h4>
                <span class="d-block text-muted">Masukan E-Mail</span>
              </div>

              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" class="form-control" name="email" id="email" placeholder="Masukan E-Mail" required>
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>

             

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="btnLogin" value="login"> Reset Password <i class="icon-circle-right2 ml-2"></i></button>
                
              </div>
            </div>
          </div>
        </form>
        <!-- /login form -->
      </div>
      <!-- /content area -->
    </div>
    <!-- /main content -->
  </div>
  <!-- /page content -->
  <?php 
    echo view("partial/js"); 
    echo view("assets/js",$ASSETS);
  ?>
  </body>
</html>