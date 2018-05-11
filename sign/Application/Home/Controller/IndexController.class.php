<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function adminlogin(){
    	$time=time();
        $data['username'] = I('username');
        $data['password'] = I('password');
        if(M('sign_admin')->where($data)->find()){
            session('adminname', $data['username']);
            session('time', $time);    
            $this->success('登录成功', U('index/main'), 2);
        }
        else{
            $this->error('登录失败!');
        }
    }

    public function main(){
        $this->display();
    }

    public function yonghuliebiao(){
    	$re=M('sign_user')->select();
    	$this->assign('re',$re);
    	$this->display();
    }

    public function xiugaiyonghu($id){
    	$re = M('sign_user')->find($id);
    	$this->assign('re',$re);
    	$this->display();
    }

    public function yonghuxiugai($id){
    	$upload = new \Think\Upload();// 实例化上传类 
    	$upload->maxSize = 3145728 ;// 设置附件上传大小 
    	$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
    	$upload->rootPath = './Public/'; // 设置附件上传根目录 
    	$upload->savePath = ''; // 设置附件上传（子）目录
    	// 上传文件 
    	$info = $upload->uploadOne($_FILES['img']); 
    	$path=$info['savepath'].$info['savename'];
    	$data=[
    		'username'=>I('username'),
    		'phone'=>I('phone'),
    		'email'=>I('email'),
    		'qq'=>I('qq'),
    		'wechat'=>I('wechat'),
    		'weibo'=>I('weibo'),
    		'number'=>I('number'),
    		'grade'=>I('grade'),
    		'img'=>$path
    	];

    	$Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
    	$re=$Model->execute("update sign_user set username='$data[username]', phone='$data[phone]',email='$data[email]',qq='$data[qq]',wechat='$data[wechat]',weibo='$data[weibo]',number='$data[number]',grade='$data[grade]',img='$data[img]' where id =$id");
	   	if ($re&&$info) {
	    	$this->success('修改成功', U('index/yonghuliebiao'), 2);
	    }else{
	    	$this->error('修改失败!');
    	}
    }

    public function shanchuyonghu($id){
    	$re = M('sign_user')->delete($id);
    }

    public function shouhuoliebiao(){
    	$re=M('sign_address')->select();
    	$userCount = M('sign_address')->count();
    	for ($i=0; $i < $userCount; $i++) { 
    		$res = M('sign_user')->where('id='.$re[$i]['uid'])->find();
    		$re[$i]['uid']=$res['username'];
    	}
    	$this->assign('re',$re);
    	$this->display();
    }

    public function tianjiashouhuo(){
    	$this->display();
    }

    public function shouhuotianjia(){
    	$data=[
    		'username'=>I('username'),
    		'address'=>I('address'),
    	];
    	$Model = new \Think\Model();
    	$old=$Model->query("select * from sign_user where username='$data[username]'");
    	$re=[
    		'uid'=>$old[0]['id'],
    		'address'=>$data['address'],
    	];
    	$res=M('sign_address')->add($re);
	   	if ($res) {
	    	$this->success('添加成功', U('index/shouhuoliebiao'), 2);
	    }else{
	    	$this->error('添加失败!');
    	}
    }

    public function xiugaishouhuo($id){
    	$re=M('sign_address')->where('id='.$id)->find();
    	$res=M('sign_user')->where('id='.$re['uid'])->find();
    	$this->assign('re',$re);
    	$this->assign('res',$res);
    	$this->display();
    }

    public function shouhuoxiugai($id){
    	$data=I('address');
    	$Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
    	$re=$Model->execute("update sign_address set address='$data' where id =$id");
	   	if ($re) {
	    	$this->success('修改成功', U('index/shouhuoliebiao'), 2);
	    }else{
	    	$this->error('修改失败!');
    	}
    }

    public function shanchushouhuo($id){
    	$re = M('sign_address')->delete($id);    	
    }

    public function dingdanliebiao(){
    	$re=M('sign_order')->select();
    	$userCount = M('sign_order')->count();
    	for ($i=0; $i < $userCount; $i++) { 
    		$res = M('sign_user')->where('id='.$re[$i]['uid'])->find();
    		$re[$i]['uid']=$res['username'];
    	}
    	$this->assign('re',$re);
    	$this->display();
    }

    public function xiugaidingdan($id){
    	$re=M('sign_order')->where('id='.$id)->find();
    	$res=M('sign_user')->where('id='.$re['uid'])->find();
    	$this->assign('re',$re);
    	$this->assign('res',$res);
    	$this->display();
    }

    public function dingdanxiugai($id){
    	$data=[
    		'id'=>I('id'),
    		'username'=>I('username'),
    		'name'=>I('name'),
    		'price'=>I('price'),
    		'time'=>I('time'),
    		'status'=>I('status'),
    	];
    	$re=M('sign_order')->where('id='.$id)->save($data); 
	   	if ($re) {
	    	$this->success('修改成功', U('index/dingdanliebiao'), 2);
	    }else{
	    	$this->error('修改失败!');
    	}
    }

    public function wuliuliebiao(){
    	$re=M('sign_logistics')->select();
    	$userCount = M('sign_logistics')->count();
    	for ($i=0; $i < $userCount; $i++) { 
    		$res = M('sign_user')->where('id='.$re[$i]['uid'])->find();
    		$re[$i]['uid']=$res['username'];
    	}
    	$this->assign('re',$re);
    	$this->display();
    }

    public function xiugaiwuliu($id){
    	$re=M('sign_logistics')->where('id='.$id)->find();
    	$res=M('sign_user')->where('id='.$re['uid'])->find();
    	$this->assign('re',$re);
    	$this->assign('res',$res);
    	$this->display();
    }

    public function wuliuxiugai($id){
    	$data=[
    		'id'=>I('id'),
    		'username'=>I('username'),
    		'name'=>I('name'),
    		'time'=>I('time'),
    		'status'=>I('status'),
    	];
    	$re=M('sign_logistics')->where('id='.$id)->save($data); 
	   	if ($re) {
	    	$this->success('修改成功', U('index/wuliuliebiao'), 2);
	    }else{
	    	$this->error('修改失败!');
    	}
    }

    public function shenqingliebiao(){
    	$re=M('sign_service')->select();
    	$userCount = M('sign_service')->count();
    	for ($i=0; $i < $userCount; $i++) { 
    		$res = M('sign_user')->where('id='.$re[$i]['uid'])->find();
    		$re[$i]['uid']=$res['username'];
    	}
    	$this->assign('re',$re);
    	$this->display();
    }

    public function xiugaijindu($id){
    	$re=M('sign_service')->where('id='.$id)->find();
    	$res=M('sign_user')->where('id='.$re['uid'])->find();
    	$this->assign('re',$re);
    	$this->assign('res',$res);
    	$this->display();
    }

    public function jinduxiugai($id){
    	$data=[
    		'id'=>I('id'),
    		'username'=>I('username'),
    		'name'=>I('name'),
    		'message'=>I('message'),
    		'time'=>I('time'),
    		'status'=>I('status'),
    	];
    	$Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
    	$re=$Model->execute("update sign_service set status='$data[status]' where id =$id");
	   	if ($re) {
	    	$this->success('修改成功', U('index/jinduliebiao'), 2);
	    }else{
	    	$this->error('修改失败!');
    	}
    }

    public function jinduliebiao(){
    	$re=M('sign_service')->select();
    	$userCount = M('sign_service')->count();
    	for ($i=0; $i < $userCount; $i++) { 
    		$res = M('sign_user')->where('id='.$re[$i]['uid'])->find();
    		$re[$i]['uid']=$res['username'];
    	}
    	$this->assign('re',$re);
    	$this->display();
    }

    public function haocailiebiao(){
    	$re=M('sign_material')->select();
    	$this->assign('re',$re);
    	$this->display();
    }

    public function tianjiahaocai(){
    	$this->display();
    }

    public function haocaitianjia(){
    	$upload = new \Think\Upload();// 实例化上传类 
    	$upload->maxSize = 3145728 ;// 设置附件上传大小 
    	$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
    	$upload->rootPath = './Public/'; // 设置附件上传根目录 
    	$upload->savePath = 'haocai/'; // 设置附件上传（子）目录
    	// 上传文件 
    	$info = $upload->uploadOne($_FILES['img']); 
    	$path=$info['savepath'].$info['savename'];

    	$data=[
    		'name'=>I('name'),
    		'price'=>I('price'),
    		'img'=>$path,
    	];
    	$re=M('sign_material')->add($data);
    	if ($re) {
	    	$this->success('添加成功', U('index/haocailiebiao'), 2);
	    }else{
	    	$this->error('添加失败!');
    	}
    }

    public function xiugaihaocai($id){
    	$re=M('sign_material')->where('id='.$id)->find();
    	$this->assign('re',$re);
    	$this->display();
    }

    public function haocaixiugai(){
    	$upload = new \Think\Upload();// 实例化上传类 
    	$upload->maxSize = 3145728 ;// 设置附件上传大小 
    	$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
    	$upload->rootPath = './Public/'; // 设置附件上传根目录 
    	$upload->savePath = 'haocai/'; // 设置附件上传（子）目录
    	// 上传文件 
    	$info = $upload->uploadOne($_FILES['img']); 
    	$path=$info['savepath'].$info['savename'];

    	$data=[
    		'id'=>I('id'),
    		'name'=>I('name'),
    		'price'=>I('price'),
    		'img'=>$path,
    	];
    	$re=M('sign_material')->save($data);
    	if ($re) {
	    	$this->success('修改成功', U('index/haocailiebiao'), 2);
	    }else{
	    	$this->error('修改失败!');
    	}
    }

    public function shanchuhaocai($id){
    	$re = M('sign_material')->delete($id);    	
    }
}	