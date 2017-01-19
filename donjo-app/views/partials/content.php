<?php
if($headline){
	echo "
	<div id=\"headline\" class=\"box box-danger\">
		<div class=\"box-header with-border\">
			<h3 class=\"box-title\"><a href=\"". site_url("first/artikel/$headline[id]")."\">". $headline['judul'] ."</a></h3>
			<div class=\"pull-right small\">". $headline['owner'].", ". tgl_indo2($headline['tgl_upload'])."</div>
		</div>
		<div class=\"box-body\">";
		if($headline["gambar"]!=""){
			if(is_file(LOKASI_FOTO_ARTIKEL."sedang_".$headline['gambar'])){
				echo "
				<a class=\"group2\" href=\"".AmbilFotoArtikel($headline['gambar'],'sedang')."\" title=\"\">
				<img src=\"".AmbilFotoArtikel($headline['gambar'],'sedang')."\" /></a>";
			}else{
				echo "
				<img style=\"margin-right: 10px; margin-bottom: 5px; float: left;\" src=\"". base_url() ."assets/images/404-image-not-found.jpg\" width=\"300\" height=\"180\"/>";
			}
		}
		echo $headline['isi'];

		echo "
		</div>
	</div>";

}

/*
 * List Konten
 * */
$title = (!empty($judul_kategori))? $judul_kategori: "Artikel Terkini";

if(is_array($title)){
	foreach($title as $item){
		$title= $item;
	}
}


if($artikel){
	foreach($artikel as $data){
		//$teks = fixTag($data['isi']);
        $teks = fixTag(word_limiter($data['isi'], 30));
		if(strlen($teks)>310){
			$abstrak = word_limiter($data['isi'], 30);
		}else{
			$abstrak = $teks;
		}

		if($data['gambar']!=''){
			if(is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])) {
				$imgjudul =  "<img class=\"media-object\" height=\"150\" width=\"150\" src=\"".AmbilFotoArtikel($data['gambar'],'kecil')."\" alt=\"". $data["judul"] ."\"/>";
			}else{
				$imgjudul = "<img class=\"media-object\" src=\"".base_url()."assets/images/404-image-not-found.jpg\" alt=\"". $data["judul"] ."\" />";
			}
		}
		$twitter = "desaujunggebang";
		$url_artikel = site_url("artikel/".$data['id']."/".url_title($data["judul"]));

		$fb_url = 'https://facebook.com/sharer.php?u='.$url_artikel;		
		$twitter_url = sprintf('https://twitter.com/intent/tweet?url=%s&text=%s&via=%s',$url_artikel, $data["judul"], $twitter);
		$google_url = sprintf('https://plus.google.com/share?url=%s',$url_artikel);


		echo sprintf('
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">%s</a>
  		<div class="media-body">
    		<h4 class="media-heading"><a href="%s">%s</a></h4>
          <!-- <p class="text-right">%s</p> -->
          <p>%s</p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> %s</span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
            <li>|</li>
            <li>
               <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
            </li>
            <li>|</li>
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <a href="%s" target="_blank"><span><i class="fa fa-facebook-square"></i></span></a>
              <a href="%s" target="_blank"><span><i class="fa fa-twitter-square"></i></span></a>
              <a href="%s" target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a>
            </li>
			</ul>
       </div>
    </div>
  </div>
		', $imgjudul, $url_artikel, $data["judul"], $data['owner'], $abstrak, time_elapsed_string($data['tgl_upload']), $fb_url, $twitter_url, $google_url);


			}


	/*
	 * Pengaturan halaman
	 * */

}else{
	echo "
	<div class=\"artikel\" id=\"artikel-blank\">
		<div class=\"box box-warning box-solid\">
			<div class=\"box-header\"><h3 class=\"box-title\">Maaf, belum ada data</h3></div>
			<div class=\"box-body\">
				<p>Belum ada artikel yang dituliskan dalam ".$title.".</p>
				<p>Silakan kunjungi situs web kami dalam waktu dekat.</p>
			</div>
		</div>
	</div>
	";
}

// echo "</div>";

if($artikel){
	echo "
	<div class=\"box-footer\">
		<ul class=\"pagination pagination-sm no-margin\">";
		if($paging->start_link){
			echo "<li><a href=\"".site_url("first/index/$paging->start_link")."\" title=\"Halaman Pertama\"><i class=\"fa fa-fast-backward\"></i>&nbsp;</a></li>";
		}
		if($paging->prev){
			echo "<li><a href=\"".site_url("first/index/$paging->prev")."\" title=\"Halaman Sebelumnya\"><i class=\"fa fa-backward\"></i>&nbsp;</a></li>";
		}

		for($i=$paging->start_link;$i<=$paging->end_link;$i++){
			$strC = ($p == $i)? "class=\"active\"":"";
			echo "<li ".$strC."><a href=\"".site_url("first/index/$i")."\" title=\"Halaman ".$i."\">".$i."</a></li>";
		}

		if($paging->next){
			echo "<li><a href=\"".site_url("first/index/$paging->next")."\" title=\"Halaman Selanjutnya\"><i class=\"fa fa-forward\"></i>&nbsp;</a></li>";
		}
		if($paging->end_link){
			echo "<li><a href=\"".site_url("first/index/$paging->end_link")."\" title=\"Halaman Terakhir\"><i class=\"fa fa-fast-forward\"></i>&nbsp;</a></li>";
		}
			echo "";
		echo "
		</ul>
	</div>
	";
}
		//echo "</div>";
?>

<!--
<div class="themes nobig2">
<div class="bleft">
            <label>Jumlah Total Artikel:</label>
			<label><strong><?php echo $paging->num_rows?></strong></label>
</div>
        <div class="bright">
            <div class="uibutton-group">
            <?php  if($paging->start_link): ?>
				<a href="<?php echo site_url("first/index/$paging->start_link")?>" class="uibutton"  >Awal</a>
			<?php  endif; ?>
			<?php  if($paging->prev): ?>
				<a href="<?php echo site_url("first/index/$paging->prev")?>" class="uibutton"  >Prev</a>
			<?php  endif; ?>
            </div>
            <div class="uibutton-group">

				<?php  for($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
				<a href="<?php echo site_url("first/index/$i")?>" <?php  jecho($p,$i,"class='uibutton special'")?> class="uibutton"><?php echo $i?></a>
				<?php  endfor; ?>
            </div>
            <div class="uibutton-group">
			<?php  if($paging->next): ?>
				<a href="<?php echo site_url("first/index/$paging->next")?>" class="uibutton">Next</a>
			<?php  endif; ?>
			<?php  if($paging->end_link): ?>
                <a href="<?php echo site_url("first/index/$paging->end_link")?>" class="uibutton">Akhir</a>
			<?php  endif; ?>
            </div>
        </div>
</div>
-->
