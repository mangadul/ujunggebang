<!-- Widget Agenda -->

<?php
if($agenda){
  ?>
<div class="box box-primary box-solid">
  <div class="box-header">
    <h3 class="box-title"><a href="<?php echo site_url();?>kategori/4"><i class="fa fa-calendar"></i> Agenda</a></h3>
  </div>
  <div class="box-body">
    <ul class="sidebar-latest">
      <?php
      foreach ($agenda as $l){?>
      <li><a href="<?php echo site_url("artikel/$l[id]/".url_title($l['judul']));?>"><?php echo $l['judul']?></a></li>
      <?php  }?>
    </ul>
  </div>
</div>
  <?php
}
?>
