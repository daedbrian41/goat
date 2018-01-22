
<?php
if (!isset($this->session->userdata['logged_in'])) {
    redirect('gemmy');
}
?>
<form method="post" action="home/inspage">
	title <input type="text" name="title" value="" /><br><br>

    meta keywords <textarea name="keywords"></textarea><br><br>

    meta description <textarea name="description"></textarea><br><br>

    teaser <textarea name="teaser"></textarea><br><br>

    content <textarea name="content" class="c_area"></textarea><br><br>
    <ul class="wyswyg">
        <li><button type="button" class="but_par">Paragraph</button></li>
        <li><button type="button" class="but_list1">List 1</button></li>
        <li><button type="button" class="but_list2">List 2</button></li>
    </ul><br><br>

    created_at
    <!--Sulf <input type="text" name="date" value="" /><br>-->
    <div class="form-group">
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" name="created_at" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

	<input type="submit" name="submit" value="INSERT!" style="background:pink;color:#fff;border:0;padding:7px 15px;display:block;margin:0 auto;cursor:pointer;" />
</form>