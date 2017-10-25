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

class Controller extends BaseController
{
	public function profile()
    {
    	if (Session::has('id'))
    	{
            $date = date('Y-m-d');
            $resultOut = DB::select('select * from products where quantity = ?', [0]);
            $resultExpired = DB::select('select * from products where `expired_date` < ?', [$date]);
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");

            $notificationOut = count($resultOut);
            $notificationExpired = count($resultExpired);
            $notificationAll = $notificationExpired + $notificationOut;

  			$id = Session::get('id');
	        $name = Session::get('name');
	        $dob = Session::get('dob');
	        $position = Session::get('position');
	        $gender = Session::get('gender');
	        $email = Session::get('email');
	        $phone = Session::get('phone');
	        $score = Session::get('score');
	        $message = "";
	        if(!empty(Session::get('message')))
	        {
	        	$message = Session::get('message');	
	        	Session::forget('message');
	        }
	        if($position == "Admin")
            {
                return view('pages.adminInfo', compact('barcode_search','mem_search','notificationAll','notificationExpired','notificationOut','id', 'name', 'dob', 'position', 'gender', 'email', 'phone', 'score', 'message'));
                exit;
            }
            else
            {
                return view('pages.user', compact('barcode_search','mem_search','notificationAll','notificationExpired','notificationOut','id', 'name', 'dob', 'position', 'gender', 'email', 'phone', 'score', 'message'));
                exit;
            }

		}
		else
		{
			return redirect('/');
    		exit;
		}
    }

    public function homepage()
    {
    	if (Session::has('id'))
        {
            $date = date('Y-m-d');
            $resultOut = DB::select('select * from products where quantity = ?', [0]);
            $resultExpired = DB::select('select * from products where `expired_date` < ?', [$date]);
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");

            $notificationOut = count($resultOut);
            $notificationExpired = count($resultExpired);
            $notificationAll = $notificationExpired + $notificationOut;

    		$name = Session::get('name');


    		$message = "";
		    if(!empty(Session::get('message')))
		    {
		        $message = Session::get('message');	
		        Session::forget('message');
		    }
    		if(Session::has('bid'))
    		{
    			$bid = Session::get('bid');
    			$bname = Session::get('bname');
    			$bprice = Session::get('bprice');
    			$bquantity = Session::get('bquantity');
    			$btotal = Session::get('btotal');
                $bbarcode = Session::get('bbarcode');
    			$btotalFinal = Session::get('btotalFinal');

    			return view('pages.home', compact('barcode_search','mem_search','notificationAll','notificationExpired','notificationOut','name', 'message', 'bid', 'bname', 'bprice', 'bquantity', 'btotal', 'bbarcode', 'btotalFinal'));
	    		exit;
    		}
    		else
    		{
	    		return view('pages.home', compact('barcode_search','mem_search','notificationAll','notificationExpired','notificationOut','name', 'message'));
	    		exit;
    		}	
		}
		else
		{
			return redirect('/');
    		exit;
		}
    }

    public function changePassword()
    {
    	if (Session::has('id'))
    	{
            $date = date('Y-m-d');
            $resultOut = DB::select('select * from products where quantity = ?', [0]);
            $resultExpired = DB::select('select * from products where `expired_date` < ?', [$date]);
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");

            $notificationOut = count($resultOut);
            $notificationExpired = count($resultExpired);
            $notificationAll = $notificationExpired + $notificationOut;

  			$name = Session::get('name');
  			$message = "";
  			if(!empty(Session::get('message')))
	        {
	        	$message = Session::get('message');	
	        	Session::forget('message');
	        }
    		return view('pages.password', compact('barcode_search','mem_search','notificationAll','notificationExpired','notificationOut','name', 'message'));
    		exit;	
		}
		else
		{
			return redirect('/');
    		exit;
		}
    }

    public function product()
    {
    	if(Session::has('id'))
    	{
            $date = date('Y-m-d');
            $resultOut = DB::select('select * from products where quantity = ?', [0]);
            $resultExpired = DB::select('select * from products where `expired_date` < ?', [$date]);
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");

            $notificationOut = count($resultOut);
            $notificationExpired = count($resultExpired);
            $notificationAll = $notificationExpired + $notificationOut;

    		$name = Session::get('name');
    		$message = "";
    		if(!empty(Session::get('message')))
	        {
	        	$message = Session::get('message');	
	        	Session::forget('message');
	        }

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

	        return view('pages.product', compact('barcode_search','mem_search','notificationAll','notificationExpired','notificationOut','name','pid', 'barcode', 'pname', 'country', 'quantity', 'price', 'category', 'image_path', 'imported_date', 'expired_date', 'message'));
	        exit;
    	}
    	else
    	{
    		return redirect('/');
    		exit;
    	}
    }

    public function refresh()
    {
    	if(Session::has('id'))
    	{
    		return redirect::back()->with('refresh','');
    		exit;
    	}
    	else
    	{
    		return redirect('/');
    		exit;
    	}
    }

    public function thank()
    {
        if(Session::has('id'))
        {
            $date = date('Y-m-d');
            $resultOut = DB::select('select * from products where quantity = ?', [0]);
            $resultExpired = DB::select('select * from products where `expired_date` < ?', [$date]);
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");

            $notificationOut = count($resultOut);
            $notificationExpired = count($resultExpired);
            $notificationAll = $notificationExpired + $notificationOut;

            $name = Session::get('name');
            $message = "";
            if(!empty(Session::get('message')))
            {
                $message = Session::get('message');
                Session::forget('message');
            }
            if(Session::has('return'))
            {
                $total = Session::get('finalTotal');
                $return = Session::get('return');
                $received = Session::get('received');
                $score = Session::get('score');
                $clerk_id = Session::get('id');
                $bname = Session::get('bname');
                $bprice = Session::get('bprice');
                $bquantity = Session::get('bquantity');
                $btotal = Session::get('btotal');

                $mem_id = $mem_score = $discount = 0;
                if(Session::has('mem_id'))
                {
                    $mem_id = Session::get('mem_id');
                    $mem_score = Session::get('mem_score');
                    $discount = Session::get('discount');
                }

                Session::forget('bname');
                Session::forget('bprice');
                Session::forget('bquantity');
                Session::forget('btotal');

                Session::forget('return');
                Session::forget('finalTotal');
                Session::forget('received');
                Session::forget('mem_id');
                Session::forget('mem_score');
                Session::forget('discount');

                return view('pages.thank', compact('bquantity','bprice','bname','btotal','barcode_search','mem_search','mem_id', 'mem_score', 'discount','clerk_id', 'notificationAll','notificationExpired','notificationOut','name','total', 'return', 'received', 'score', 'message'));
                exit;
            }
            else
            {
                $message = "Thanks for Hard Work! :)";
                return redirect('/homepage');
                exit;
            }
        }
        else
        {
            return redirect('/');
            exit;
        }
    }

    public function member()
    {
        if(Session::has('id'))
        {
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");
            $name = Session::get('name');
            if(Session::has('members'))
            {
                $members = Session::get('members');
                if(count($members) == 0)
                {
                    $message = "*ID isn't Matched!";
                    return view('pages.expiredMember', compact('barcode_search','mem_search','message', 'name'));
                    exit;
                }
                else
                {
                    return view('pages.expiredMember', compact('barcode_search','mem_search','members', 'name'));
                    exit;
                }
            }
            else
            {
                return back();
                exit;
            }
        }
        else
        {
            return redirect('/');
            exit;
        }
    }

    public function expiredMember()
    {
        if(Session::has('id'))
        {
            $barcode_search = DB::Select("select barcode_id from products");
            $mem_search = DB::Select("select id from member");
            $name = Session::get('name');
            $expired_member = Session::get('expired_member');
            if(count($expired_member) == 0)
            {
                $message = "*There isn't any Expired Memberships!";
                return view('pages.expiredMember', compact('barcode_search','mem_search','message', 'name'));
                exit;
            }
            else
            {
                return view('pages.expiredMember', compact('barcode_search','mem_search','expired_member', 'name'));
                exit;
            }
        }
        else
        {
            return redirect('/');
            exit;
        }
    }

    public function index()
    {
        $message = "";
        if(Session::has('message'))
        {
            $message = Session::get('message');
            Session::forget('message');
        }
        return view('pages.login', compact('message'));
    }
}
