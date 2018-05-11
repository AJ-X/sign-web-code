<?php
namespace Home\Controller;
use Think\Controller;
class NumberController extends Controller {
	//积分接口
	public function number($uid,$name,$price,$time){
		$grade1=1;
        $grade2=2;
        $grade3=3;
        $grade4=4;
        $number1=100;
        $number2=500;
        $number3=1000;
        $discount1=0.05;
        $discount1=0.1;
        $discount1=0.15;
        $discount1=0.2;
		$grade=M('sign_user')->where('id='.$uid)->find();
		$experience=M('sign_experience')->where('uid='.$uid)->find();
		$data=[
			'uid'=>$uid,
			'name'=>$name,
			'price'=>$price
		];
		if ($experience['number']<=$number1) {
    		$result1=M('sign_user')->where('id='.$uid)->setField('grade',$grade1);
    	}elseif ($experience['number']<=$number2) {
    		$result1=M('sign_user')->where('id='.$uid)->setField('grade',$grade2);
    	}elseif ($experience['number']<=$number3) {
    		$result1=M('sign_user')->where('id='.$uid)->setField('grade',$grade3);
    	}else{
    		$result1=M('sign_user')->where('id='.$uid)->setField('grade',$grade4);
    	}
		if ($grade['grade']==$grade1) {
				$money=$grade['number']*$discount1;
    			if ($money<=$price) {
    				$data['price']=$price-$money;
    				$experience['number']=$experience['number']+$data['price'];
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$data['price']);
    				$result1=M('sign_order')->add($data);
    				$result2=M('sign_experience')->where('uid='.$uid)->setField('number',$experience['number']);
    			}else{
    				$grade['number']=$grade['number']-$data['price']/$discount1;
    				$data['price']=0;
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$grade['number']);
    				$result1=M('sign_order')->add($data);
    			}
    		}elseif ($grade['grade']==$grade2) {
    			$money=$grade['number']*$discount2;
    			if ($money<=$price) {
    				$data['price']=$price-$money;
    				$experience['number']=$experience['number']+$data['price'];
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$data['price']);
    				$result1=M('sign_order')->add($data);
    				$result2=M('sign_experience')->where('uid='.$uid)->setField('number',$experience['number']);
    			}else{
    				$grade['number']=$grade['number']-$data['price']/$discount2;
    				$data['price']=0;
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$grade['number']);
    				$result1=M('sign_order')->add($data);
    			}
    		}elseif ($grade['grade']==$grade3) {
    			$money=$grade['number']*$discount3;
    			if ($money<=$price) {
    				$data['price']=$price-$money;
    				$experience['number']=$experience['number']+$data['price'];
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$data['price']);
    				$result1=M('sign_order')->add($data);
    				$result2=M('sign_experience')->where('uid='.$uid)->setField('number',$experience['number']);
    			}else{
    				$grade['number']=$grade['number']-$data['price']/$discount3;
    				$data['price']=0;
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$grade['number']);
    				$result1=M('sign_order')->add($data);
    			}
    		}else{
    			$money=$grade['number']*$discount4;
    			if ($money<=$price) {
    				$data['price']=$price-$money;
    				$experience['number']=$experience['number']+$data['price'];
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$data['price']);
    				$result1=M('sign_order')->add($data);
    				$result2=M('sign_experience')->where('uid='.$uid)->setField('number',$experience['number']);
    			}else{
    				$grade['number']=$grade['number']-$data['price']/$discount4;
    				$data['price']=0;
    				$result=M('sign_user')->where('id='.$uid)->setField('number',$grade['number']);
    				$result1=M('sign_order')->add($data);
    			}
    		}
	}
}