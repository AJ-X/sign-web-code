<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

	//登录接口
	public function login(){
    	$data['username'] = I('username');
    	$data['password'] = I('password');
    	if(M('sign_user')->where($data)->find()){
    		session('username', $data['username']);   
			$this->success('登录成功', U('index/index'), 2);
    	}
    	else{
    		$this->error('登录失败!');
    	}
    }

    //注册接口
    public function register(){
    	$data['username'] = I('username');
    	$data['password'] = I('password');
    	if (M('sign_user')->where($data)->find()) {
    		$this->error('用户名已存在，注册失败!');
    	}else{
	    	if (M('sign_user')->add($data)) {
	    		$this->success('注册成功', U('index/login'), 2);
	    	}else{
	    		$this->error('注册失败!');
	    	}
    	}  	
    }  

	//修改密码
	public function resetpass(){
		$data['username'] = I('username');
    	$data['password'] = I('password');
    	if(M('sign_user')->where("username=$data[username]")->save($data)){
    		session('username', $data['username']);   
			$this->success('修改成功', U('index/index'), 2);
    	}else{
    		$this->error('修改失败!');
    	}
	}
}
