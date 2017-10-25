<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class AdminUserController extends Controller
{
    public function getAllUsers()
    {
        $allUser = array();
        $all = 0;

        $results = DB::Select("select * from `clearks` where `position` = 'Clerk' ");
        array_push($allUser, count($results));
        $all += count($results);

        $results = DB::Select("select * from `member`");
        array_push($allUser, count($results));
        $all += count($results);

        $results = DB::Select('select * from `suppliers`');
        array_push($allUser, count($results));
        $all += count($results);

        array_push($allUser, $all);

        Session::put('allUser', $allUser);
        return redirect('/admin/getAllReports');
        exit;
    }

    public function getClerks()
    {
        $clerk_id = $clerk_name = $clerk_gender = $clerk_dob = $clerk_position = $clerk_email = $clerk_phone = $clerk_score = $clerk_status = array();
        $results = DB::Select("select * from `clearks` where `position` = 'Clerk' ");
        foreach ($results as $result)
        {
            array_push($clerk_id, $result->id);
            array_push($clerk_name, $result->name);
            array_push($clerk_gender, $result->gender);
            array_push($clerk_dob, $result->dob);
            array_push($clerk_position, $result->position);
            array_push($clerk_email, $result->email);
            array_push($clerk_phone, $result->phone);
            array_push($clerk_score, $result->score);
        }
        for($i = 0; $i < count($clerk_email); $i++)
        {
            $results = DB::Select("select * from `accounts` where `email` = '$clerk_email[$i]' ");
            foreach($results as $result)
            {
                array_push($clerk_status, $result->remember_token);
            }
        }
        Session::put('clerk_id', $clerk_id);
        Session::put('clerk_name', $clerk_name);
        Session::put('clerk_gender', $clerk_gender);
        Session::put('clerk_dob', $clerk_dob);
        Session::put('clerk_position', $clerk_position);
        Session::put('clerk_email', $clerk_email);
        Session::put('clerk_phone', $clerk_phone);
        Session::put('clerk_score', $clerk_score);
        Session::put('clerk_status', $clerk_status);


        return redirect('/admin/clerks');
        exit;
    }

    public function promote(Request $request)
    {
        $position = $request->input('position');
        $id = $request->input('approve');
        DB::Update("update `clearks` set position = '$position' where id = '$id'");

        return redirect('/admin/getClerks');
        exit;
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('status');
        $status = "";
        if($request->input('currentStatus') == "Activate")
        {
            $status = "Deactivate";
        }
        else
        {
            $status = "Activate";
        }

        DB::Update("update `accounts` set remember_token = '$status' where id = '$id'");

        return redirect('/admin/getClerks');
        exit;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getMemberships()
    {
        $results = DB::Select('select * from `member`');
        Session::put("memberships", $results);
        return redirect('/admin/memberships');
        exit;
    }

    public function expendMember(Request $request)
    {
        if(empty($request->input('dob')))
        {
            return redirect('/admin/memberships');
            exit;
        }
        else
        {
            $id = $request->input('expend');
            $expire = $request->input('dob');

            DB::Update("update `member` set `expired_date` = '$expire' where id = $id");

            return redirect('/admin/getMemberships');
            exit;
        }
    }

    public function deleteMember(Request $request)
    {
        $id = $request->input('delete');
        DB::Delete("delete from `member` where id = $id");

        return redirect('/admin/getMemberships');
        exit;

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getSuppliers()
    {
        $suppliers = DB::Select("select * from `suppliers`");
        Session::put('suppliers', $suppliers);
        return redirect ('/admin/suppliers');
        exit;
    }

    public function acitvateSupplier(Request $request)
    {
        $id = $request->input('status');
        $status = "";
        if($request->input('currentStatus') == "Activate")
        {
            $status = "Deactivate";
        }
        else
        {
            $status = "Activate";
        }
        echo $request->input('currentStatus');
        DB::Update("update `suppliers` set `remember_token` = '$status' where `id` = $id");
        return redirect ('/admin/getSuppliers');
        exit;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getTopUser()
    {
        $user = array();

        $topClerk = DB::Select("SELECT * FROM `clearks` WHERE score IN (select max(score) from `clearks`)");
        $topMember = DB::Select("SELECT * FROM `member` WHERE score IN (select max(score) from `member`)");
        $topSupplier = DB::Select("SELECT * FROM `suppliers` WHERE score IN (select max(score) from `suppliers`)");

        array_push($user, $topClerk);
        array_push($user, $topMember);
        array_push($user, $topSupplier);

        Session::put('user', $user);

        return redirect('/admin/TopUser');
        exit;

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function registerEmployee(Request $request)
    {
        $name = $request->input('eName');
        $position = $request->input('ePosition');
        $gender = $request->input('eGender');
        $dob = $request->input('dob');
        $email = $request->input('eEmail');
        $phone = $request->input('ePhone');
        $password = md5($request->input('ePassword'));
        $confirm = md5($request->input('eConfirm'));

        if($password != $confirm)
        {
            $message = "*Confrim Password isn't matched";
            Session::put('message', $message);
            return redirect('/admin/registration');
            exit;
        }

        if(empty($name) || empty($position) || empty($gender) || empty($dob) || empty($email) || empty($phone) || empty($password) || empty($confirm))
        {
            $message = "*All Fields are required!";
            Session::put('message', $message);
            return redirect('/admin/registration');
            exit;
        }

        DB::Insert("insert into `clearks` (`name`, `dob`, `position`, `gender`, `email`, `phone`, `score`)
                    values ('$name', '$dob', '$position', '$gender', '$email', '$phone', 0)");

        $id = 0;
        $results = DB::Select("select id from `clearks` where email = '$email'");
        foreach ($results as $result)
        {
            $id = $result->id;
        }

        DB::Insert("insert into `accounts`(`email`, `password`, `clearks_id`, `remember_token`)
                    values ('$email', '$password', $id, 'Deactivate')");

        $message = "Employee was submitted successfully!";
        Session::put('message', $message);
        return redirect('/admin/registration');
        exit;
    }

///////////////////////////////////////////////////////////////////////////////////////////////////

    public function registerMember(Request $request)
    {
        $name = $request->input('mName');
        $phone = $request->input('mPhone');
        $email = $request->input('mEmail');
        $discount = $request->input('mDiscount');
        $created_date = $request->input('mCreated_date');
        $expired_date = $request->input('mExpired_date');

        if(empty($name) || empty($discount) || empty($created_date) || empty($expired_date) || empty($email) || empty($phone))
        {
            $message = "*All Fields are required!";
            Session::put('message', $message);
            return redirect('/admin/registration');
            exit;
        }

        DB::Insert("insert into `member`(`name`, `phone`, `email`, `discount_percentage`, `created_date`, `expired_date`, `score`)
                    values ('$name', '$phone', '$email', $discount, '$created_date', '$expired_date', 0)");

        $message = "Membership was submitted successfully!";
        Session::put('message', $message);
        return redirect('/admin/registration');
        exit;
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////

    public function registerSupplier(Request $request)
    {
        $name = $request->input('sName');
        $email = $request->input('sEmail');
        $phone = $request->input('sPhone');

        if(empty($name) || empty($email) || empty($phone))
        {
            $message = "*All Fields are required!";
            Session::put('message', $message);
            return redirect('/admin/registration');
            exit;
        }

        DB::Insert("insert into `suppliers` (`name`, `phone`, `email`, `score`, `remember_token`)
                    values ('$name', '$phone', '$email', 0, 'Deactivate')");

        $message = "Supplier was submitted successfully!";
        Session::put('message', $message);
        return redirect('/admin/registration');
        exit;
    }

}