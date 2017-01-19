<!-- widget Galeri-->

<div class="box box-warning box-solid">
  <div class="box-header">
    <h3 class="box-title"><a href="<?php echo site_url();?>first/gallery"><i class="fa fa-camera"></i> Galeri Foto</a></h3>
  </div>
  <div class="box-body">
    <ul class="sidebar-latest">
    <?php  foreach($w_gal As $data){?>

      <?php if(is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])){?>
      <a class="group3" href="<?php echo AmbilGaleri($data['gambar'],'sedang')?>">

        <img src="<?php echo AmbilGaleri($data['gambar'],'kecil')?>" width="130" alt="<?php echo $data['nama']?>">

      </a>
      <?php } ?>
    <?php  }?>
    </ul>
  </div>
</div>
