<?php
class Uploadfiy{


	/**
	**$data eq $_FILES
	**@$token 加密
	**@time 2016年06月05日15:23:39
	**@author liuguogen
	**/
	public function upload($data,$post){
		$verifyToken = md5('unique_salt' . $post['token']);
		$targetFolder='/uploads/'.date("Ymd");


		if(!is_dir($targetFolder)){
			mkdir($targetFolder,0777,true);
		}


		if (!empty($data) && $post['token'] == $verifyToken) {
			$tempFile = $data['Filedata']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
			$targetFile = rtrim($targetPath,'/') . '/' . $data['Filedata']['name'];
			
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($data['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				return $targetFile.$fileParts;
			} else {
				return 'Invalid file type.';
			}
		}

	}


}
?>