<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->input();
            if(Auth::attempt(['username'=>$data['username'],'password'=>$data['password']]))
            {
                //echo "success";die;
                if(Auth::user()->hasAnyRole('admin')){
                    return redirect('/admin/dashboard');
                }
                else if(Auth::user()->hasAnyRole('depot')){
                    return redirect('/depot/dashboard');
                }
                else{
                    return redirect('/reglement/dashboard');
                }
            }
            else
            {
                //echo "failed";die;
                return redirect('/admin')->with('flash_message_error','Invalid User or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function settings()
    {
        if(Auth::user()->hasAnyRole('admin')){
            return view('/admin/settings');
        }
        else if(Auth::user()->hasAnyRole('depot')){
            return view('/depot/settings');
        }
        else{
            return view('/reglement/settings');
        }
    }
    
    public function checkPasswd(Request $request)
    {
        $data = $request->all();
        $currentPasswd = $data['currPasswd'];
        $checkPasswd = User::where(['role'=>'1'])->first();
        if(Hash::check($currentPasswd,$checkPasswd->password))
        {
            echo "1";die;
        }
        else
        {
            echo "0";die;
        }
    }
    
    public function updatePasswd(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $checkPasswd = User::where(['username'=> Auth::user()->username])->first();
            $currentPasswd = $data['currPasswd'];
            if(Hash::check($currentPasswd,$checkPasswd->password))
            {
                $password = bcrypt($data['newPasswd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password Updated');
            }
            else
            {
                return redirect('/admin/settings')->with('flash_message_error','Current Password is Invalid');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully ');
    }
}
