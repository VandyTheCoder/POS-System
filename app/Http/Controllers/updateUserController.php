<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class updateUserController extends Controller
{
    public function update(Request $request)
    {
        $message = "";
        if(empty($request->input('name')) || empty($request->input('dob')) || empty($request->input('gender')) || empty($request->input('email')) || empty($request->input('phone')) )
        {
            $message = "*All fields must be filled!";
        }
        else
        {
        	$name = $request->input('name');
        	$dob = $request->input('dob');
        	$gender = $request->input('gender');
        	$email = $request->input('email');
        	$phone = $request->input('phone');
        	$id = Session::get('id');

        	$affected = DB::update("update clearks set name = '$name', dob = '$dob', gender = '$gender', email = '$email', phone = '$phone' where id = $id");
        	if($affected == 1)
        	{
        		Session::put('name', $name);
        		Session::put('dob', $dob);
        		Session::put('gender', $gender);
        		Session::put('phone', $phone);

        		if($email != Session::get('email'))
        		{
        			$affected = DB::update("update accounts set email = '$email' where id = $id");
        			if($affected == 1)
        			{
        				return redirect('/homepage/logout');
        				exit;
        			}
        		}
        		else
        		{
                    $message = "Save Information to Database Successfully!";
        			Session::put('email', $email);
        		}
        	}
        }
        Session::put('message', $message);
        return redirect('/homepage/profile');
        exit;
    }

    public function change(Request $request)
    {
        if(!empty($request->input('oldPass')) && !empty($request->input('newPass')) && !empty($request->input('confirm')) )
        {
            $id = Session::get('id');
            $password = Session::get('password');

            $oldPass = md5($request->input('oldPass'));
            $newPass = md5($request->input('newPass'));
            $confirm = md5($request->input('confirm'));

            if($oldPass == $password && $newPass == $confirm)
            {
                $affected = DB::update("update accounts set password = '$newPass' where id = $id");
                if($affected <= 1)
                {
                    Session::put('password', $newPass);
                    return redirect('/homepage/logout');
                    exit;
                }
            }
        }
        $message = "Please Check It Agian!";
        Session::put('message', $message);
        return redirect('/homepage/change');
        exit;
    }

    public function getExpiredMember()
    {
        $date = date('Y-m-d');
        $results = DB::Select("select * from `member` where `expired_date` < '$date'");
        Session::put('expired_member', $results);

        if(Session::get('position') == "Admin")
        {
            return redirect('/admin/expiredMember');
            exit;
        }
        else
        {
            return redirect('/homepage/expiredMember');
            exit;
        }
    }

    public function getMember(Request $request)
    {
        $mem_id = $request->input('mem_id');

        $members = DB::Select("select * from member where id = $mem_id");
        Session::put('members', $members);

        return redirect('/homepage/memberships');
        exit;
    }
}
