
<?php
if (isset($this->session->userdata['logged_in'])) {
$usaname = $this->session->userdata('logged_in');
} else {
redirect('gemmy');
}
?>
<a class="logout" href="logout">Logout</a>
<p class="parag">Welcome, <strong><?php echo $usaname['username'];?></strong></p>
<?php $this->load->view('pages/list_archives');?>