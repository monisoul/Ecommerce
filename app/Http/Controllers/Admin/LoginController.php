<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use  App\Models;
use Illuminate\Http\Request;





class LoginController extends Controller
{
    public function getLogin(){
        return view(view:'admin.auth.login');

    }

    public function login(LoginRequest $request){
       
        //make validation in LoginRequest
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);  //لما يكون الادمن مش موجود اصلاً
    }

    //   public function saveAdmin(){

    //     $admin =new App\Models\Admin();
    //     $admin->name='amani Mohammed';
    //     $admin->email='Amani.Mohammed2020rrr@gmail.com';
    //     $admin->password=bcrypt('amani');
    //     $admin->save();

    //   }
    
}
