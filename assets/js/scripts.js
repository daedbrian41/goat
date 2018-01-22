// DATE TIME PICKER
var dateNow = new Date();
$('#datetimepicker1').datetimepicker({
    defaultDate:dateNow,
    format: 'YYYY-MM-DD HH:mm:ss'
});

// WYSWYG


$('.but_par').on("click",function(e){
  var c_area = $('.c_area').val();
  $('.c_area').val(c_area+"<p class='parag'></p>\n");
})

$('.but_list1').on("click",function(e){
  var c_area = $('.c_area').val();
  $('.c_area').val(c_area+"<ul class='list_1'>\n<li>This is Text</li>\n</ul>\n");
})

$('.but_list2').on("click",function(e){
  var c_area = $('.c_area').val();
  $('.c_area').val(c_area+"<ul class='list_2'>\n<li>\n<h5>This is H5</h5>\n<p>This is Text</p>\n</li>\n</ul>\n");
})


