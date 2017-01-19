<!-- widget Arsip Artikel -->

<div class="box box-primary box-solid">
  <div class="box-header">
    <h3 class="box-title"><a href="<?php echo site_url("first/arsip")?>"><i class="fa fa-archive"></i> Arsip Artikel</a></h3>
  </div>
  <div class="box-body">
    <ul>
    <?php  foreach ($arsip as $l){?>
    <li><a href="<?php echo site_url("artikel/$l[id]/".url_title($l['judul']))?>"><?php echo $l['judul']?></a></li>
    <?php  }?>
    </ul>
  </div>
</div>
