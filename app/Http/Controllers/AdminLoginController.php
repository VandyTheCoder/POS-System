<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;


class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $message = "";
        if(empty($request->input('email')) && empty($request->input('password')))
        {
            $message = "Fields Can't Be Empty!";
        }
        else
        {
            $email = $request->input('email');
            $password = md5($request->input('password'));

            $checkLogin = DB::table('accounts')->where(['email'=>$email, 'password'=>$password])->get();

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

                    if(Session::get('position') == "Clerk")
                    {
                       $message = "You don't have authentication!";
                       Session::flush();
                    }
                    else
                    {
                        return redirect('/admin/getAllProducts');
                        exit;
                    }
                }
            }
            else
            {
                $message = "Wrong Email or Password!";
            }
        }
        Session::put('message', $message);
        return redirect('/admin');
        exit;
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin');
        exit;
    }
}
