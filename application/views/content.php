<?php 
foreach($posts as $post){
	$exp = explode("-",$post['created_at']);
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
	<div class="blogPost">
		<div class="bpTop">
			<div class="bpLeft">
				<a href="<?php echo $post['link'];?>"><img src="<?php echo base_url()."assets/images/".$post['id'];?>_thumb.jpg" width="100%" alt="<?php echo $post['title'];?>" /></a>
			</div>
			<div class="bpRight">
				<a class="linkBlog" href="<?php echo $post['link'];?>"><h2><?php echo $post['title'];?></h2></a>
				<p class="blog-post-meta"><?php echo $datey;?> by <a href="#" class="author">Billy</a></p>
				<p class="parag"><?php echo $post['teaser'];?></p>
				<a class="readMore" href="<?php echo $post['link'];?>">Read More</a>
			</div>
		</div>
		<div class="bpBtm">
		</div>
	</div>
<?php
}
?>

