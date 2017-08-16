<?php

namespace App\Http\Controllers\Service;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Model\Member;
use Input, Validator, Captcha;



class CaptchaController extends Controller
{
	public function getcaptcha(Request $request){
		$code = captcha_src();
		//$request->session()->put('login_code',$code );
		return stripslashes($code);
	
	}
	
	public function regist(Request $request){
			$msg = [];
			$phone = $request->input('phone');
			$check = Member::where('phone',$phone)->first();
			if($check){
				$msg['status'] = '1';
				$msg['msg'] = '该手机号已被注册';
				return json_encode($msg);
			}
			else{
				$password = md5('gwc'+$request->input('password1'));
				$member  = new Member;
				$member->phone = $phone;
				$member->password = $password;
				$member->save();
				
				$msg['status'] = '0';
				$msg['msg'] = '注册成功';
				return json_encode($msg);
			}	 
	}
	public function login(Request $request){
		$msg = [];
		//$login_code = $request->session()->get('login_code');
		$phone = $request->input('phone');
		$code = $request->input('code');
		$password = $request->input('password');
		$rules = [
			'code' =>'required|captcha'
		];
		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
				$msg['status'] = '1';
				$msg['msg'] = '验证码错误';
				return json_encode($msg);
		}else{
			$check = Member::where('phone',$phone)->first();
			if(!$check){
				$msg['status'] = '2';
				$msg['msg'] = '手机号不存在';
				return json_encode($msg);
			}else{
				if($check->password !=md5('gwc'+$password)){
					$msg['status'] = '3';
					$msg['msg'] = '密码错误';
					return json_encode($msg);
				}
				else{
					$msg['status'] = '0';
					$msg['msg'] = '登陆成功';
					$request->session()->put('member',$check);
					return json_encode($msg);	
				}
				
			}
			
			
		}
		
		
		
	}
	
}
