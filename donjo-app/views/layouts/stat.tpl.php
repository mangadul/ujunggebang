<?php $this->load->view('layouts/header.php');?>

<!-- konten -->
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="row">
						<?php
						if($tipe == 2){
							if($tipex==1){
								$this->load->view('partials/statistik_sos.php');
							}
						}elseif($tipe == 3){
							$this->load->view('partials/wilayah.php');
						}else{
							$this->load->view('partials/statistik.php');
						}
						?>

          </div><!--/row-->        
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">

          <?php $this->load->view('partials/side.right.php');?>

        <!--/.sidebar-offcanvas-->
      </div><!--/row-->

    </div><!--/.container-->
  </div>
<!-- end konten -->

<?php $this->load->view('layouts/footer.php');?>

