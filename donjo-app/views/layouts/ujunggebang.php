<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Desa Ujung Gebang">
    <meta name="author" content="Abdul Muin (muin.abdul@gmail.com)">
    <title><?php echo ((config_item('website_title')!=FALSE) ? config_item('website_title') : 'Website ' . ucwords(config_item('sebutan_desa')) . ' ' . unpenetration($desa['nama_desa']))?></title>
    <meta property="og:site_name" content="<?php echo unpenetration($desa['nama_desa']);?>"/>
    <meta property="og:type" content="article"/>
    <?php if(isset($single_artikel)): ?>
      <meta property="og:title" content="<?php echo unpenetration($single_artikel["judul"]);?>"/>
      <meta property="og:url" content="<?php echo base_url()?>index.php/artikel/<?php echo unpenetration($single_artikel['id']);?>"/>
      <meta property="og:image" content="<?php echo base_url()?><?php echo LOKASI_FOTO_ARTIKEL?>sedang_<?php echo $single_artikel['gambar'];?>"/>
    <?php endif; ?>
    <?php if(is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
      <link rel="shortcut icon" href="<?php echo base_url()?><?php echo LOKASI_LOGO_DESA?>favicon.ico" />
    <?php else: ?>
      <link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico" />
    <?php endif; ?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css');?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url('assets/js/ie8-responsive-file-warning.js');?>"></script><![endif]-->
    <script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js');?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/carousel.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/footer.css');?>" rel="stylesheet">

    <!-- tambahan -->
    <link type='text/css' href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel='Stylesheet' />
    <link type='text/css' href="<?php echo base_url()?>assets/css/ui-buttons.css" rel='Stylesheet' />
    <link type='text/css' href="<?php echo base_url()?>assets/front/css/colorbox.css" rel='Stylesheet' />
    <script src="<?php echo base_url()?>assets/front/js/stscode.js"></script>
    <script src="<?php echo base_url()?>assets/front/js/layout.js"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery.colorbox.js"></script>
    <script>
      $(document).ready(function(){
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"fade"});
      });
    </script>

<style type="text/css">
nav {
    opacity: 0.9;
    filter: alpha(opacity=90); /* For IE8 and earlier */
}  
</style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo site_url('first');?>">
              <?php echo unpenetration($desa['nama_desa']);?>                
              </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
  <?php foreach($menu_atas AS $data){?>
    <?php echo $data['menu']?>
  <?php }?>
              </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" title="Start a new search">Hapus</a></li>
      </ul>        

        <form class="navbar-form navbar-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Pencarian..." autocomplete="off" autofocus="autofocus" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>

            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" role="listbox">
<?php

if($artikel)
{
      $slide = array('first','second','third','fourth','fifth','sixth');
      $i=0;
      foreach($artikel as $data){
        $teks = fixTag(word_limiter($data['isi'], 10));
        if(strlen($teks)>310){
          $abstrak = word_limiter($data['isi'], 10);
        }else{
          $abstrak = $teks;
        }
        $is_aktif = ($i == 0) ? "item active" : "item";
        echo sprintf('
        <div class="%s">
          <img class="%s-slide" src="%s" alt="%s slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>%s</h1>
              <p>%s</p>
              <p><a class="btn btn-lg btn-primary" href="%s" role="button">Selengkapnya</a></p>
            </div>
          </div>
        </div>', $is_aktif, $slide[$i],AmbilFotoArtikel($data['gambar'],'kecil'), $slide[$i], $data["judul"], $abstrak, site_url("artikel/".$data['id']."/".url_title($data["judul"])));
        $i++;

      }  
}

?>      
      </div>


      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

<!-- konten -->
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="row">
            <?php $this->load->view('partials/content.php');?>
          </div><!--/row-->        
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <!--
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div>
        -->
          <?php $this->load->view('partials/side.right.php');?>

        <!--/.sidebar-offcanvas-->
      </div><!--/row-->

    </div><!--/.container-->
  </div>
<!-- end konten -->

<div class="container">
  <div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.85113904339!2d107.93253831476945!3d-6.283291295452309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x87d6d614978ec4b3!2sKantor+Desa+Ujunggebang!5e0!3m2!1sid!2s!4v1484851976422" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</div>


<!--footer start from here-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter">SEKILAS</div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
        <p><i class="fa fa-map-pin"></i>Desa Ujung Gebang, Sukra, Kabupaten Indramayu</p>
        <p><i class="fa fa-phone"></i>Telp (026x) 32424234</p>
        <p><i class="fa fa-envelope"></i>E-mail : info@ujunggebang.desa.id</p>
        
      </div>
      <div class="col-md-4 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">TAUTAN</h6>
        <ul class="footer-ul">
          <li><a href="//indonesia.go.id/" target="_blank">Portal Nasional Republik Indonesia</a></li>
          <li><a href="//kemendagri.go.id/" target="_blank">Kementerian Dalam Negeri RI</a></li>
          <li><a href="//kemendesa.go.id/" target="_blank">Kementerian Desa, PDT & Transmigrasi RI</a></li>
          <li><a href="//kominfo.go.id/" target="_blank">Kementerian Kominfo RI</a></li>
          <li><a href="//jabarprov.go.id/" target="_blank">Pemerintah Provinsi Jawa Barat</a></li>
          <li><a href="//diskominfo.jabarprov.go.id/" target="_blank">Dinas Kominfo Jawa Barat</a></li>
          <li><a href="//www.indramayukab.go.id/" target="_blank">Pemerintah Kabupaten Indramayu</a></li>
        </ul>
      </div>

      <div class="col-md-4 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">SOSIAL MEDIA</h6>
        <div class="fb-page" data-href="https://www.facebook.com/desaujunggebang" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/desaujunggebang"><a href="https://www.facebook.com/desaujunggebang" target="_blank"><span><i class="fa fa-facebook-square"></i></span> Facebook</a></blockquote>
          </div>
        </div>

        <div class="twitter-page" data-href="https://www.twitter.com/desaujunggebang" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.twitter.com/desaujunggebang"><a href="https://www.twitter.com/desaujunggebang" target="_blank"><span><i class="fa fa-twitter-square"></i></span> Twitter</a></blockquote>
          </div>
        </div>

        <div class="twitter-page" data-href="https://plus.google.com/+desaujunggebang" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://plus.google.com/+desaujunggebang"><a href="https://plus.google.com/+desaujunggebang" target="_blank"><span><i class="fa fa-google-plus-square"></i></span> Google Plus+</a></blockquote>
          </div>
        </div>

      </div>
    </div>
  </div>
</footer>

<!--footer start from here-->
<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>&copy; <?php echo date("Y"); ?> - Hak cipta <?php echo $desa['nama_desa']; ?></p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Site Map</a></li>
        <li><a href="<?php echo site_url('siteman'); ?>">Login Admin</a></li>
      </ul>
    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/jquery-3.1.1.min');?>"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url('assets/js/vendor/holder.min.js');?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js');?>"></script>
  </body>
</html>