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
            <h4>About Me</h4>
            <p>Saya cuma seorang karyawan yang suka menghabiskan waktu saya untuk melakukan apa yang saya suka. Ya, salah satunya yaitu berbagi pengalaman saya dalam sebuah website agar teman-teman sekalian mendapat pengetahuan baru dan bermanfaat untuk menjalani kehidupan.</p>
          </div>

          <div class="sidebar-module">
            <h4 class="archives">Archives</h4>
              <ol class="list-unstyled">
                <?php 
                foreach($archives as $jaja){
                ?>
                <li><a href="<?php echo $jaja['link'];?>"><?php echo $jaja['title'];?></a></li>
                <?php
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
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script> 
    <script>
    var page = 1;
    var caun = "<?php echo $count;?>";

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            if(page <= caun){
              page+=1;
              loadMoreData(page);
            }

            console.log(page+'\n'+caun);
            
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
                  //alert('server not responding...');
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
    <!--<script src="<?php //echo base_url();?>assets/js/bootstrap.min.js"></script>-->
    
  </body>
</html>