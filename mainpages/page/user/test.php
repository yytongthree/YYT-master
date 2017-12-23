<?php
//	session_start();
	/*****layui上传的后台接口 */
	namespace app\admin\controller;
	use \think\Controller;
	class Upload extends Controller{
		public function index(){
			$ret = array();  //返回的上传文件状态数组
			if ($_FILES["file"]["error"] > 0){
				$ret["message"] =  $_FILES["file"]["error"] ;
				$ret["status"] = 0;
				$ret["src"] = "";
				return json($ret);          
			}else{               
				$pic =  $this->upload();
				if($pic['info']== 1){
					$url = '/uploads/'.$pic['savename'];
				}  else {
					$ret["message"] = $this->error($pic['err']);
					$ret["status"] = 0;
				}
				$ret["message"]= "图片上传成功！";
				$ret["status"] = 1;
				$ret["src"] = $url;
				return json($ret);
			}     
		}    
		//图片上传代码   
		private  function upload(){
			$file = request()->file('file');
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			$reubfo = array();  //定义一个返回的数组
			if($info){
				$reubfo['info']= 1;
				$reubfo['savename'] = $info->getSaveName();
			}else{
				// 上传失败获取错误信息
				$reubfo['info']= 0;
				$reubfo['err'] = $file->getError();
			}
				return $reubfo;
		}
	}