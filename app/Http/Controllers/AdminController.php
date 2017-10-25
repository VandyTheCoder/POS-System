<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;


class AdminController extends Controller
{
    public function index()
    {
        $message = "";
        if(Session::has('message'))
        {
            $message = Session::get('message');
            Session::forget('message');
        }
        return view('pages.adminLogin', compact('message'));
    }

    public function toHome()
    {
        if(Session::has('id') && Session::get('position') == 'Admin') {
            $allProduct = Session::get('allProduct');
            $allUser = Session::get('allUser');
            $allReport = Session::get('allReport');
            $allIncome = Session::get('allIncome');

            $name = Session::get('name');
            return view('pages.adminHome', compact('allProduct', 'allUser', 'allReport', 'name', 'allIncome'));
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function toProduct()
    {
        if(Session::has('id') && Session::get('position') == 'Admin') {
            $name = Session::get('name');
            $message = "";
            if(Session::has('message'))
            {
                $message = Session::get('message');
                Session::forget('message');
            }
            if(Session::has('pid'))
            {
                $pid = Session::get('pid');
                $barcode = Session::get('barcode');
                $pname = Session::get('pname');
                $country = Session::get('country');
                $quantity = Session::get('quantity');
                $price = Session::get('price');
                $category = Session::get('category');
                $image_path = Session::get('image_path');
                $imported_date = Session::get('imported_date');
                $expired_date = Session::get('expired_date');

                return view('pages.adminProduct', compact('message' ,'name', 'pid', 'barcode', 'pname', 'country', 'quantity', 'price', 'category', 'image_path', 'imported_date', 'expired_date'));
                exit;
            }
            else
            {
                return view('pages.adminProduct', compact('name'));
                exit;
            }
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function toClerk()
    {
        if(Session::has('id') && Session::get('position') == 'Admin')
        {
            $name = Session::get('name');
            $clerk_id = Session::get('clerk_id');
            $clerk_name = Session::get('clerk_name');
            $clerk_gender = Session::get('clerk_gender');
            $clerk_dob = Session::get('clerk_dob');
            $clerk_position = Session::get('clerk_position');
            $clerk_email = Session::get('clerk_email');
            $clerk_phone = Session::get('clerk_phone');
            $clerk_score = Session::get('clerk_score');
            $clerk_status = Session::get('clerk_status');

            return view('pages.adminUser', compact('name', 'clerk_id', 'clerk_name', 'clerk_gender', 'clerk_dob', 'clerk_position', 'clerk_email', 'clerk_phone', 'clerk_score', 'clerk_status'));
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function toMember()
    {
        if(Session::has('id') && Session::get('position') == 'Admin')
        {
            $name = Session::get('name');
            $results = Session::get('memberships');
            $mem_id = $mem_name = $mem_phone = $mem_email = $mem_discount = $mem_created = $mem_expired = $mem_score = array();

            foreach($results as $result)
            {
                array_push($mem_id, $result->id);
                array_push($mem_name, $result->name);
                array_push($mem_phone, $result->phone);
                array_push($mem_email, $result->email);
                array_push($mem_discount, $result->discount_percentage);
                array_push($mem_created, $result->created_date);
                array_push($mem_expired, $result->expired_date);
                array_push($mem_score, $result->score);
            }

            return view('pages.adminMember', compact('name', 'mem_id', 'mem_name', 'mem_phone', 'mem_email', 'mem_discount', 'mem_created', 'mem_expired', 'mem_score'));
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function toSupplier()
    {
        if(Session::has('id') && Session::get('position') == 'Admin')
        {
            $name = Session::get('name');
            $suppliers = Session::get('suppliers');
            $sup_id = $sup_name = $sup_phone = $sup_phone = $sup_email = $sup_score = $sup_status = array();
            foreach($suppliers as $supplier)
            {
                array_push($sup_id, $supplier->id);
                array_push($sup_name, $supplier->name);
                array_push($sup_phone, $supplier->phone);
                array_push($sup_email, $supplier->email);
                array_push($sup_score, $supplier->score);
                array_push($sup_status, $supplier->remember_token);
            }
            return view('pages.adminSupplier', compact('name', 'sup_id', 'sup_name', 'sup_phone', 'sup_email', 'sup_score', 'sup_status'));
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function toTopUser()
    {
        if(Session::has('id') && Session::get('position') == 'Admin')
        {
            $name = Session::get('name');
            $user = Session::get('user');

            $topClerk = $user[0];
            $topMember = $user[1];
            $topSupplier = $user[2];

            return view('pages.adminTopUser', compact('name', 'topClerk', 'topSupplier', 'topMember'));
        }
        else
        {
            return redirect('/admin/');
            exit;
        }
    }

    public function toRegistration()
    {
        if(Session::has('id') && Session::get('position') == 'Admin')
        {
            $name = Session::get('name');
            $message = "";
            if(Session::has('message'))
            {
                $message = Session::get('message');
                Session::forget('message');
            }
            return view('pages.adminRegistration', compact('name', 'message'));
        }
        else
        {
            return redirect('/admin/');
            exit;
        }
    }

    public function toExpiredMember()
    {
        if(Session::has('id') && Session::get('position') == 'Admin')
        {
            $name = Session::get('name');
            $memberships = Session::get('expired_member');
            $mem_id = $mem_name = $mem_phone = $mem_email = $mem_discount = $mem_created = $mem_expired = $mem_score = array();

            foreach($memberships as $membership)
            {
                array_push($mem_id, $membership->id);
                array_push($mem_name, $membership->name);
                array_push($mem_phone, $membership->phone);
                array_push($mem_email, $membership->email);
                array_push($mem_discount, $membership->discount_percentage);
                array_push($mem_created, $membership->created_date);
                array_push($mem_expired, $membership->expired_date);
                array_push($mem_score, $membership->score);
            }

            return view('pages.adminMember', compact('name', 'mem_id', 'mem_name', 'mem_phone', 'mem_email', 'mem_discount', 'mem_created', 'mem_expired', 'mem_score'));
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function getAllReports()
    {
        if(Session::has('id') && Session::get('position') == 'Admin') {
            $allReport = array();
            $all = 0;

            $results = DB::Select('select * from `products` where `quantity` = 0');
            array_push($allReport, count($results));
            $all += count($results);

            $date = date('Y-m-d');
            $results = DB::Select("select * from `products` where `expired_date` < '$date'");
            array_push($allReport, count($results));
            $all += count($results);

            $results = DB::Select("select * from `member` where `expired_date` < '$date'");
            array_push($allReport, count($results));
            $all += count($results);

            array_push($allReport, $all);

            Session::put('allReport', $allReport);
            return redirect('/admin/getAllIncomes');
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }
    }

    public function getAllIncomes()
    {
        if(Session::has('id') && Session::get('position') == 'Admin') {
            $allIncome = 0;
            $results = DB::Select('select substr(sum(income),1,6) as incomes from `sell`');
            foreach($results as $result)
            {
                $allIncome = $result->incomes;
            }
            Session::put('allIncome', $allIncome);
            return redirect('/admin/homepage');
            exit;
        }
        else
        {
            return redirect('/admin');
            exit;
        }

    }

    public function getMostProduct()
    {
        $name = "Chim Kanitha";
        /////////////////////////////////////////////////////////////////////////////////////////////////////////
        $results = DB::Select("SELECT S.product_id as id, P.name as name, COUNT(S.product_id) as Number, substr(sum(income),1,4) as total 
                                FROM sell S, products P 
                                WHERE S.product_id = P.id 
                                GROUP BY S.product_id 
                                ORDER BY Number DESC LIMIT 3 ");
        $product_id = $product_name = $value = $total = array();

        foreach ($results as $result)
        {
            array_push($product_id, $result->id);
            array_push($product_name, $result->name);
            array_push($value, $result->Number);
            array_push($total, $result->total);
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////
        $days = DB::Select("SELECT substr(sum(income),1,4) as value, DATE(date) as date, COUNT(product_id) as products, max(product_id) as most 
                            from sell 
                            GROUP by DATE(date) 
                            ORDER BY DATE(date)");
        $date = $amount = $NumberProduct = $mostProduct = array();

        foreach ($days as $day)
        {
            array_push($date, $day->date);
            array_push($amount, $day->value);
            array_push($NumberProduct, $day->products);
            array_push($mostProduct, $day->most);
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////
        $productOut = DB::Select("Select * from products where quantity < 10");
        $productExp = DB::Select("Select * from products where DATE_ADD(NOW(), INTERVAL 30 DAY ) > expired_date");
        return view('pages.dataProduct', compact('name', 'product_id', 'product_name', 'value', 'total', 'date', 'amount', 'NumberProduct', 'mostProduct', 'productOut', 'productExp'));
    }

}
