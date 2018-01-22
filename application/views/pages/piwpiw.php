
<?php
if (!isset($this->session->userdata['logged_in'])) {
    redirect('gemmy');
}
?>
<form method="post">
	title <input type="text" name="title" value="<?php echo $datas['title'];?>" /><br><br>

    meta keywords <textarea name="keywords"><?php echo $datas['meta_keywords'];?></textarea><br><br>

    meta description <textarea name="description"><?php echo $datas['meta_description'];?></textarea><br><br>

    teaser <textarea name="teaser"><?php echo $datas['teaser'];?></textarea><br><br>

    content <textarea name="content"><?php echo $datas['content'];?></textarea><br><br>

    created_at
    <div class="form-group">
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" name="created_at" value="<?php echo $datas['created_at'];?>" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

	<input type="submit" name="submit" value="UPDATE!" style="background:pink;color:#fff;border:0;padding:7px 15px;display:block;margin:0 auto;cursor:pointer;" />
</form>