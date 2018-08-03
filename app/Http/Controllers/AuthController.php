<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(){
        // return 'Success';
        $inputs=request()->except('_token'); //ส่ง request ยกเว้น Token
        // $inputs = request()->all();


        if(auth()->attempt($inputs)) //ประมวลผลการ Login
        {
            return redirect()->intended('/'); //ไปยังหน้าที่พยายามเข้าก่อนหน้า Login หากไม่มีหน้าดังกล่าวจะกลับไป Root 
            // auth()->loginUsingId(1); //สำหรับการ login แบบ Custom
        }
        else
        {
            return redirect()->back(); //ไปยัง Previous Page
        }
    }
    public function logout(){
        auth()->logout(); //เปลี่ยนสถานะเป็น Logout
        return redirect('/'); 
    }
}
