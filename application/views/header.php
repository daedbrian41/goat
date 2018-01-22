<!DOCTYPE html>
<html lang="en">
 <?php 
  $chocho = ucfirst(str_replace("-"," ",$this->uri->segment(1)));
  $chacha = str_replace(".php","",$chocho);
  $chichi = $chacha;
  if($this->uri->segment(1) == ''){
    $chacha = "Artikel bermanfaat / tips berguna untuk kehidupan sehari-hari";
    $chichi = "Website ini membahas semua artikel bermanfaat atau berbagai macam tips yang berguna untuk membantu memperlancar masalah kehidupan sehari-hari";
  }
  ?>
  <title><?php echo $chacha;?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $chichi;?>">
  <meta name="keywords" content="<?php echo $chacha;?>">
  <meta name="author" content="gry">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
  </head>
  <body>
    <div class="overlay_wrap">
    <div class="container">

      <div class="row rowa">

        <div class="col-sm-8 blog-main">