<?php
class Uploadfiy{



// public function __construct(){
// 	$this->CI =& get_instance();
// }
	/**
	**$data eq $_FILES
	**@$token 加密
	**@time 2016年06月05日15:23:39
	**@author liuguogen
	**/
	public  function upload($data,$post){
		
		$filename=date("Y-m-d",time());
		if(!file_exists("uploads/".$filename)){
			//mkdir('../uploads',0777);
			mkdir('uploads/'.$filename,0777,true);
			//mkdir("/uploads/".$filename,0777);
		}
		$targetFolder= 'uploads/'.$filename;
		$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYX";
		$verifyToken = md5('unique_salt' . $post['timestamp']);
		if (!empty($data) && $post['token'] == $verifyToken) {
			$tempFile = $data['Filedata']['tmp_name'];
			$targetPath =  $targetFolder;
			$newname=substr(strrchr($data['Filedata']['name'],"."),0);
			//这种方法获取的是图片名称的所有名字进行加密
			//$new_name=md5($_FILES['fileField']['name']).$newname;
			//这一种方法是获取图片名称不加后缀
			//$exName=explode(".",$_FILES['fileField']['name']);
			$new_name=substr(str_shuffle($str),0,10).$newname;
			$targetFile = rtrim($targetPath,'/') . '/' .$new_name;
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($targetFile);
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				$new_filename=base_url().$targetFolder."/".$new_name;
				return $new_filename;
			} else {
				return  'error';
			}
		}

	}


}
?>