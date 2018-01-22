<?php 

	$exp = explode("-",$datas['created_at']);
	if($exp[1]=='01'){
		$bln = 'Januari';
	}else if($exp[1]=='02'){
		$bln = 'Februari';
	}else if($exp[1]=='03'){
		$bln = 'Maret';
	}else if($exp[1]=='04'){
		$bln = 'April';
	}else if($exp[1]=='05'){
		$bln = 'Mei';
	}else if($exp[1]=='06'){
		$bln = 'Juni';
	}else if($exp[1]=='07'){
		$bln = 'Juli';
	}else if($exp[1]=='08'){
		$bln = 'Agustus';
	}else if($exp[1]=='09'){
		$bln = 'September';
	}else if($exp[1]=='10'){
		$bln = 'Oktober';
	}else if($exp[1]=='11'){
		$bln = 'November';
	}else if($exp[1]=='12'){
		$bln = 'Desember';
	}
	$datey = $bln." ".$exp[2].", ".$exp[0];

?>
	<div class="blog-post other_page" id="post_01">
		<h1><?php echo $datas['title'];?></h1>  
		<p class="blog-post-meta"><?php echo $datey;?> by <a href="#">Billy</a></p>
	 	<img class="img_blog" src="<?php echo base_url()."assets/images/".$datas['id'];?>.jpg" width="100%" alt="<?php echo $datas['title'];?>" />
	 	<p class="parag"><?php echo $datas['teaser'];?></p>
		<?php echo $datas['content'];?>
	</div>