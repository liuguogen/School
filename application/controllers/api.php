<?php


public function index(){
	echo 'x';exit();
	$params=$this->input->post();
var_export($params);exit();
	$exp_params=explode('.', $params['method']);
	$model=$exp_params[0];
	$method=$exp_params[1];

	unset($params['method']);

	$this->load->model($model.'_model',$model);
	$data=$this->$model->$method($params);

	echo json_encode($data);exit();


}
?>