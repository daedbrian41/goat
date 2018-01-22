<ol class="list_arch">
  <?php 
  foreach($full_data as $jaja){
  ?>
  <li class="uyuy">
  	<a href="<?php echo $jaja['link'];?>"><h3><?php echo $jaja['title'];?></h3></a>
	<?php
	if($this->uri->segment(1)=='sakamento'){
	?>
	<br>
	<a class="bara" href="updpage/<?php echo $jaja['id'];?>">Update</a>&nbsp;&nbsp;&nbsp;<a class="bara deleto" href="dlt/<?php echo $jaja['id'];?>">Delete</a>
	<?php	
	}
	?>
	<input type="hidden" class="sopo" value="dlt/<?php echo $jaja['id'];?>" />
  </li>
  <?php
  } 
  ?>
</ol>
<?php
if($this->uri->segment(1)=='sakamento'){
?>
	<a class="bara inserto" href="addpage">Insert</a>
<?php	
}
?>
<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script> 
<script>
$('.deleto').click(function(e){
	e.preventDefault();
	var conf = confirm("You sure want to Delete ?");
	var caca = "home/";
	var oyoy = $(this).parent(".uyuy").find(".sopo").val();

	if(conf){
		window.location = caca+oyoy;
	}else{
		alert(oyoy);
	}
	 
})
</script>

