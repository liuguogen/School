<?php
class School_model extends CI_Model{
	/**
	**获取学校列表
	**@author liuguogen
	**@time 2016年06月06日15:38:39
	**/

	public function getSchoolList($limit,$offset){

		$table=$this->db->dbprefix('school_type');
		$sql="SELECT school_id,school_name,school_logo,tuition,accomm,create_time,order_by FROM `{$table}` LIMIT {$limit},{$offset}";
		$rRow=$this->db->query($sql);


		if($rRow->num_rows()<1)return false;

		return $rRow->result_array();
	}
	public function getCountSchool($table){
		return $this->db->count_all_results($this->db->dbprefix($table));
	}

	public function insertSchool($data){
		if($data && is_array($data)){
			$rRow=$this->db->insert($this->db->dbprefix('school_type'),$data);


			if($rRow){
				return true;
			}
			else{
				return false;
			}
		}else{
			return false;
		}
	}



	public function get($params){
		$rRow=$this->db->select('*')->from($this->db->dbprefix('school_type'))->get();

		if($rRow<num_rows()<1){
			return $this->__msgData('暂无数据',array());
		}

		return $this->__msgData('获取成功',$rRow->result_array());
	}


	private function __msgData($msg,$data){
		return array('msg'=>$msg,'data'=>$data);
	}
}
?>