<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_controller extends CI_Controller {

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
	public function type()
	{

		if($_GET){
			$this->load->model('school_model','school');
			$data=array(
				'school_name'=>$this->input->get('school_name'),
				'school_logo'=>$this->input->get('school_logo'),
				'tuition'=>$this->input->get('tuition'),
				'accomm'=>$this->input->get('accomm'),
				'order_by'=>$this->input->get('order_by'),
				'create_time'=>time(),
				);

			$flag=$this->school->insertSchool($data);


		}
		$this->load->view('admin/schoolType');
	}

	
	public function upload(){

		$this->load->library('uploadfiy');
		$data=$this->uploadfiy->upload($_FILES,$_POST);

		echo $data;
	}


	public function school_list(){
		$this->load->model('school_model','school');

		$this->load->library('pagination');
		$limit = 2;
		$config['base_url'] = site_url('School_controller/school_list').'?page=p';
		$config['total_rows'] = $this->school->getCountSchool('school_type');
		$config['per_page'] = $limit;
		$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
		$config['full_tag_close'] = '</div>'; // 分页结束样式
		$config['first_link'] = '首页'; // 第一页显示
		$config['last_link'] = '末页'; // 最后一页显示
		$config['next_link'] = '下一页 '; // 下一页显示
		$config['prev_link'] = '上一页'; // 上一页显示
		$config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
		$config['cur_tag_close'] = '</a>'; // 当前页结束样式
		$config['num_links'] = 2;// 当前连接前后显示页码个数
		$config['page_query_string']=TRUE;
		//$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string']=TRUE;
		$config['use_page_numbers'] = TRUE;
		$per_page=$this->input->get('per_page');
		$start=$per_page?($per_page-1)*$limit:0; 
		
		$data['row']=$this->school->getSchoolList($start,$limit);
		$this->pagination->initialize($config);
		$data['page_links']=$this->pagination->create_links();
		//var_export($data);exit();
		$this->load->view('admin/schoolList',$data);
	}


	public function edit(){

		$id=$this->input->get('school_id');
		var_export($_GET);exit();
	}
}
