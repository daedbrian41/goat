<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	private $perPage = 1;
	public $chocho = '';
	public $chacha = '';
	public $chichi = '';
	public $datas = '';
	public $robot = '';

	public function metaGenerator($boom){
		$this->chocho = ucfirst(str_replace("-"," ",$this->uri->segment(1)));
	    $this->chacha = "";
	    $this->chichi = "";
		$this->datas = $this->main_model->selectedPage($boom);
		$this->robot = "index, follow";

		if($this->uri->segment(1) == ''){
			$this->chocho = "Artikel bermanfaat / tips berguna untuk kehidupan sehari-hari";
		    $this->chacha = "artikel bermanfaat, artikel berguna, how to, tutorial, tips dan trik";
		    $this->chichi = "Website ini membahas semua artikel bermanfaat atau berbagai macam tips yang berguna untuk membantu memperlancar masalah kehidupan sehari-hari";
		}else if($this->uri->segment(1) == 'updpage' || $this->uri->segment(1) == 'addpage' || $this->uri->segment(1) == 'sakamento'){
			$this->chocho = "";
		    $this->robot = "noindex, nofollow";
		}else if($this->uri->segment(1) == 'list_archives'){
			$this->chocho = "List article tutorialhowtocara";
			$this->chacha = "list article tutorialhowtocara, list archive tutorialhowtocara, archives tutorialhowtocara";
			$this->chichi = "List archives or collection articles of tutorialhowtocara";
		}else{
			if(isset($this->datas['meta_keywords'])){
				$this->chocho = $this->datas['title'];
			    $this->chacha = $this->datas['meta_keywords'];
			    $this->chichi = $this->datas['meta_description'];
			}
		}
	}

	public function index($par='')
	{
		$this->metaGenerator($par);
		$data['chocho'] = $this->chocho;
		$data['chacha'] = $this->chacha;
		$data['chichi'] = $this->chichi;
		$data['robot'] = $this->robot;

		$data['full_data'] = $this->main_model->full_data();
		$data['archives'] = $this->main_model->half_archive();
	    $data["count"] = $this->db->get('tutorial')->num_rows();
	    
	     if(!empty($this->input->get("page"))){
	     	
		      $start_pro = $this->input->get("page");
		      
		      $data['posts'] = $this->main_model->page_load($this->perPage, $start_pro);

		      $result = $this->load->view('content', $data);
	     }else{

	      $data['posts'] = $this->main_model->first_load();
	
	
		  $data['content_page'] = $this->load->view('home', $data, TRUE);
		  $this->load->view('index',$data);
	     }
	}

	public function other($par){
		$data['full_data'] = $this->main_model->full_data();
		$data['archives'] = $this->main_model->half_archive();

		$data['datas'] = $this->main_model->selectedPage($par);

		$this->metaGenerator($par);
		$data['chocho'] = $this->chocho;
		$data['chacha'] = $this->chacha;
		$data['chichi'] = $this->chichi;
		$data['robot'] = $this->robot;

		
		if($par=='sakamento'){
			$data['content_page'] = $this->load->view('pages/sakamento',$data,TRUE);
		}else if($par == 'list_archives'){
			$data['content_page'] = $this->load->view('pages/list_archives',$data,TRUE);
		}else if($data['datas']==TRUE){
			$data['content_page'] = $this->load->view('pages/other_pages',$data,TRUE);
		}else{
			$data['content_page'] = $this->load->view('pages/page_not_found',$data,TRUE);
		}

		$this->load->view('index',$data);
	}

	public function gemmy(){
		$this->load->view("pages/gemmy");
	}

	public function gemboy(){
		$this->load->model('main_model');
		$data = array(
		'usnm' => $this->input->post('usnm'),
		'pass' => $this->input->post('pass')
		);
		if($this->input->post("submit")){
			$result = $this->main_model->geman($data);

			if($result!=false){
				$session_data = array(
				'username' => $result['username'],
				'password' => $result['password']
				);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				redirect('sakamento');
			}else{
				redirect('home/gemmy');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect(gemmy);
	}

	public function addpage($par=''){
		$this->metaGenerator($par);
		$data['chocho'] = $this->chocho;
		$data['chacha'] = $this->chacha;
		$data['chichi'] = $this->chichi;
		$data['robot'] = $this->robot;

		$data['full_data'] = $this->main_model->full_data();
		$data['archives'] = $this->main_model->half_archive();
	
		$data['content_page'] = $this->load->view("pages/pawpaw",$data,TRUE);

		$this->load->view('index',$data);
	}
	public function inspage(){
		$get_link = strtolower( str_replace(' ', '-', $this->input->post('title')) );

		$saca = ucfirst($this->input->post('title'));

		$data = array(
		'title' => $saca,
		'meta_keywords' => $this->input->post('keywords'),
		'meta_description' => $this->input->post('description'),
		'link' => $get_link,
		'teaser' => $this->input->post('teaser'),
		'content' => $this->input->post('content'),
		'created_at' => $this->input->post('created_at')
		);
		$this->main_model->pawpaw($data);
		redirect('sakamento');
	}

	public function updpage($id){
		$par = '';
		$this->metaGenerator($par);
		$data['chocho'] = $this->chocho;
		$data['chacha'] = $this->chacha;
		$data['chichi'] = $this->chichi;
		$data['robot'] = $this->robot;

		$data['datas'] =  $this->main_model->data_selected($id);
		$data['archives'] = $this->main_model->half_archive();
		$data['full_data'] = $this->main_model->full_data();

		$data['content_page'] = $this->load->view("pages/piwpiw",$data,TRUE);

		$this->load->view('index',$data);

		$saca = ucfirst($this->input->post('title'));

		if($this->input->post('submit')){
			$get_link = strtolower( str_replace(' ', '-', $this->input->post('title')) );
			$data = array(
			'title' => $saca,
			'meta_keywords' => $this->input->post('keywords'),
			'meta_description' => $this->input->post('description'),
			'link' => $get_link,
			'teaser' => $this->input->post('teaser'),
			'content' => $this->input->post('content'),
			'created_at' => $this->input->post('created_at'),
			);
			$this->main_model->piwpiw($data,$id);

			redirect('sakamento');
		}
	}
	public function dlt($id){
		$this->main_model->puwpuw($id);
		redirect('sakamento');
	}
	public function puwpuw($id) {
		$this->db->where('id', $id);
		$this->db->delete('behavior');
	}
	public function page_nf() {
		$data['archives'] = $this->main_model->half_archive();
		$data['content_page'] = $this->load->view('pages/page_not_found',$data,TRUE);
		$this->load->view('index',$data);
	}
}