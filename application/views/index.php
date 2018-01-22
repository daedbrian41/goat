<!DOCTYPE html>
<html lang="en">
  <title><?php echo $chocho;?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="billy">
  <meta name="keywords" content="<?php echo $chacha;?>"> 
  <meta name="description" content="<?php echo $chichi;?>">
  <meta name="robots" content="<?php echo $robot;?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
  <style>
  @font-face {
    font-family: 'Lato';
    src: url('<?php echo base_url();?>assets/fonts/Lato-Regular.ttf');
  }
  </style>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
  </head>
  <body>
    <div class="overlay_wrap">
    <div class="container">

      <div class="row rowa">

        <div class="col-sm-8 blog-main">

        <!-- CONTENT PAGE -->
        <?php echo $content_page;?>
        <!-- CONTENT PAGE -->

          <?php
          if($this->uri->segment(1)!=''){
          ?>
              <ol class="list-backhome">
                <li><a href="<?php echo base_url();?>">Back to home</a></li>
            </ol>
          <?php
          }
          ?>

        </div>
        <!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4 class="about_me">About Me</h4>
            <p>Saya cuma seorang karyawan yang suka menghabiskan waktu saya untuk melakukan apa yang saya suka. Ya, salah satunya yaitu berbagi pengalaman saya dalam sebuah website agar teman-teman sekalian mendapat pengetahuan baru dan bermanfaat untuk menjalani kehidupan.</p>
          </div>

          <div class="sidebar-module">
            <h4 class="archives">Archives</h4>
              <ol class="list-unstyled">
                <?php 
                foreach($archives as $jaja){
                    if($this->uri->segment(1)==''){
                ?>
                    <li><a href="<?php echo $jaja['link'];?>"><h5><?php echo $jaja['title'];?></h5></li>
                <?php
                    }else{
                ?>
                    <li><a href="<?php echo $jaja['link'];?>"><h2><?php echo $jaja['title'];?></h2></li>
                <?php
                    }
                } 
                ?>
                <li class="more_arch"><a href="list_archives">More archives</a></li>
              </ol>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer>
      <p>Copyright by &#169; Billy</p>
    </footer>

    </div> 
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/scripts.js"></script> 
    <script>
    // LOAD PAGE ON SCROLL

    
    var page = 2;
    var caun = "<?php echo $count;?>";

    $(window).scroll(function() {
        var scrolled = $(window).scrollTop() + $(window).height();
        var offset = $(".blog-sidebar").offset().top;
        var doc_height = $(document).height();

        if ($(window).width() < 768) {
          if(scrolled >= doc_height) {
              if(page <= caun){
                page+=1;
                loadMoreData(page);
              }
          }
        }else{
          if(scrolled >= doc_height) {
              if(page <= caun){
                page+=1;
                loadMoreData(page);
              }
          }
        }


    });

    function loadMoreData(page){
      $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                $('.ajax-load').hide();
                $(".post-data").append(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  $('.ajax-load').hide();
            });
    }
    
    

    </script>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106986908-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments)};
      gtag('js', new Date());
    
      gtag('config', 'UA-106986908-1');
    </script>
    
  </body>
</html>