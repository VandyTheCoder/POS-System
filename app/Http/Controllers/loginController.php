<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Session;

class loginController extends BaseController
{

    public function login(Request $request)
    {
        $message = "";
        if(empty($request->input('email')) || empty($request->input('password')))
        {
            $message = "Fields can't be blanked!";  
        }
        else
        {
            $email = $request->input('email');
            $password = md5($request->input('password'));

            $checkLogin = DB::Select("select * from `accounts` where `email` = '$email' and `password` = '$password' and `remember_token` = 'Deactivate'");
        
            if(count($checkLogin) == 1)
            {
                $users = DB::table('clearks')->where(['email'=>$email])->get();
                if(count($users) == 1)
                {
                    $id = $name = $dob = $position = $gender = $email = $phone = $score = "";
                    foreach ($users as $user)
                    {
                        $id = $user->id;
                        $name = $user->name;
                        $dob = $user->dob;
                        $position = $user->position;
                        $gender = $user->gender;
                        $email = $user->email;
                        $phone = $user->phone;
                        $score = $user->score;
                    }
                    $date = date('Y-m-d H:i:s');
                    DB::insert('insert into login (account_id, date) values (?, ?)', [$id, $date]);

                    Session::put('id', $id);
                    Session::put('name', $name);
                    Session::put('dob', $dob);
                    Session::put('position', $position);
                    Session::put('gender', $gender);
                    Session::put('email', $email);
                    Session::put('phone', $phone);
                    Session::put('score', $score);
                    Session::put('password', $password);

                    return redirect('/homepage');
                    exit;
                }
            }
            else
            {
                $message = "Wrong Email or Password";
            }    
        }
        Session::put('message', $message);
        return redirect('/');
        exit;
    }

    public function logout()
    {
        Session::flush();
        return redirect('/homepage');
        exit;
    }

}
