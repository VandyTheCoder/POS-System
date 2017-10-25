<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class productController extends Controller
{
    //public $category = "";
    public function food()
    {
        $this->showProduct("Food");
        if(Session::get('position') == "Admin")
        {
            return redirect("/admin/product/");
            exit;
        }
        else
        {
            return redirect("/homepage/product");
            exit;
        }
    }

    public function gadget()
    {
       $this->showProduct('Gadget');
        if(Session::get('position') == "Admin")
        {
            return redirect("/admin/product/");
            exit;
        }
        else
        {
            return redirect("/homepage/product");
            exit;
        }

    }

    public function drink()
    {
        $this->showProduct('Drink');
        if(Session::get('position') == "Admin")
        {
            return redirect("/admin/product/");
            exit;
        }
        else
        {
            return redirect("/homepage/product");
            exit;
        }
    }

    public function beauty()
    {
        $this->showProduct('Beauty');
        if(Session::get('position') == "Admin")
        {
            return redirect("/admin/product/");
            exit;
        }
        else
        {
            return redirect("/homepage/product");
            exit;
        }
    }

    public function expired()
    {
        $date = date('Y-m-d');

        $pid = $barcode = $pname = $country = $quantity = $price = $category = $image_path = $imported_date = $expired_date = array();

        $result = DB::select('select * from products where `expired_date` < ?', [$date]);

        if(count($result) > 0)
        {
            foreach ($result as $value)
            {
                array_push($pid, $value->id);
                array_push($barcode, $value->barcode_id);
                array_push($pname, $value->name);
                array_push($country, $value->country);
                array_push($quantity, $value->quantity);
                array_push($price, $value->price);
                array_push($category, $value->category);
                array_push($image_path, $value->image_path);
                array_push($imported_date, $value->imported_date);
                array_push($expired_date, $value->expired_date);
            }
            //Start the New Session
            Session::put('pid', $pid);
            Session::put('barcode', $barcode);
            Session::put('pname', $pname);
            Session::put('country', $country);
            Session::put('quantity', $quantity);
            Session::put('price', $price);
            Session::put('category', $category);
            Session::put('image_path', $image_path);
            Session::put('imported_date', $imported_date);
            Session::put('expired_date', $expired_date);
        }
        else
        {
            //Forget All The Session
            Session::forget('pid');
            Session::forget('barcode');
            Session::forget('pname');
            Session::forget('country');
            Session::forget('quantity');
            Session::forget('price');
            Session::forget('category');
            Session::forget('image_path');
            Session::forget('imported_date');
            Session::forget('expired_date');
        }
        if(Session::get('position') == "Admin")
        {
            return redirect("/admin/product/");
            exit;
        }
        else
        {
            return redirect("/homepage/product");
            exit;
        }

    }

	public function showProduct($categoryType)
	{
        $date = date('Y-m-d');
		$pid = $barcode = $pname = $country = $quantity = $price = $category = $image_path = $imported_date = $expired_date = array();
        
		$foods = DB::select("select * from `products` where `quantity` > 0 and `expired_date` > '$date' and `category` = ?", [$categoryType]);
		if(count($foods) > 0)
		{
			foreach ($foods as $food)
           	{
                array_push($pid, $food->id);
                array_push($barcode, $food->barcode_id);
                array_push($pname, $food->name);
                array_push($country, $food->country);
                array_push($quantity, $food->quantity);
                array_push($price, $food->price);
                array_push($category, $food->category);
                array_push($image_path, $food->image_path);
                array_push($imported_date, $food->imported_date);
                array_push($expired_date, $food->expired_date);
            }

            //Start the New Session
            Session::put('pid', $pid);
            Session::put('barcode', $barcode);
            Session::put('pname', $pname);
            Session::put('country', $country);
            Session::put('quantity', $quantity);
            Session::put('price', $price);
            Session::put('category', $category);
            Session::put('image_path', $image_path);
            Session::put('imported_date', $imported_date);
            Session::put('expired_date', $expired_date);
            
		}
        else
        {
            //Forget All The Session
            Session::forget('pid');
            Session::forget('barcode');
            Session::forget('pname');
            Session::forget('country');
            Session::forget('quantity');
            Session::forget('price');
            Session::forget('category');
            Session::forget('image_path');
            Session::forget('imported_date');
            Session::forget('expired_date');
        }
	}

    public function search(Request $request)
    {
        if(!empty($request->input('search')))
        {
            $pid = $barcode = $pname = $country = $quantity = $price = $category = $image_path = $imported_date = $expired_date = array();
            $barcode_id = $request->input('search');

            $result = DB::select('select * from products where barcode_id = ?', [$barcode_id]);

            if(count($result) == 1)
            {
                foreach ($result as $value)
                {
                    array_push($pid, $value->id);
                    array_push($barcode, $value->barcode_id);
                    array_push($pname, $value->name);
                    array_push($country, $value->country);
                    array_push($quantity, $value->quantity);
                    array_push($price, $value->price);
                    array_push($category, $value->category);
                    array_push($image_path, $value->image_path);
                    array_push($imported_date, $value->imported_date);
                    array_push($expired_date, $value->expired_date);
                }
                //Start the New Session
                Session::put('pid', $pid);
                Session::put('barcode', $barcode);
                Session::put('pname', $pname);
                Session::put('country', $country);
                Session::put('quantity', $quantity);
                Session::put('price', $price);
                Session::put('category', $category);
                Session::put('image_path', $image_path);
                Session::put('imported_date', $imported_date);
                Session::put('expired_date', $expired_date);
            }
            else
            {
                //Forget All The Session
                Session::forget('pid');
                Session::forget('barcode');
                Session::forget('pname');
                Session::forget('country');
                Session::forget('quantity');
                Session::forget('price');
                Session::forget('category');
                Session::forget('image_path');
                Session::forget('imported_date');
                Session::forget('expired_date');
            }
        }
        else
        {
            //Forget All The Session
            Session::forget('pid');
            Session::forget('barcode');
            Session::forget('pname');
            Session::forget('country');
            Session::forget('quantity');
            Session::forget('price');
            Session::forget('category');
            Session::forget('image_path');
            Session::forget('imported_date');
            Session::forget('expired_date');
        }
        return redirect("/homepage/product");
        exit;
    }

    public function stockout(Request $request)
    {
        $pid = $barcode = $pname = $country = $quantity = $price = $category = $image_path = $imported_date = $expired_date = array();

        $result = DB::select('select * from products where quantity = ?', [0]);

        if(count($result) > 0)
        {
            foreach ($result as $value)
            {
                array_push($pid, $value->id);
                array_push($barcode, $value->barcode_id);
                array_push($pname, $value->name);
                array_push($country, $value->country);
                array_push($quantity, $value->quantity);
                array_push($price, $value->price);
                array_push($category, $value->category);
                array_push($image_path, $value->image_path);
                array_push($imported_date, $value->imported_date);
                array_push($expired_date, $value->expired_date);
            }
            //Start the New Session
            Session::put('pid', $pid);
            Session::put('barcode', $barcode);
            Session::put('pname', $pname);
            Session::put('country', $country);
            Session::put('quantity', $quantity);
            Session::put('price', $price);
            Session::put('category', $category);
            Session::put('image_path', $image_path);
            Session::put('imported_date', $imported_date);
            Session::put('expired_date', $expired_date);
        }
        else
        {
            //Forget All The Session
            Session::forget('pid');
            Session::forget('barcode');
            Session::forget('pname');
            Session::forget('country');
            Session::forget('quantity');
            Session::forget('price');
            Session::forget('category');
            Session::forget('image_path');
            Session::forget('imported_date');
            Session::forget('expired_date');
        }
        if(Session::get('position') == "Admin")
        {
            return redirect("/admin/product/");
            exit;
        }
        else
        {
            return redirect("/homepage/product");
            exit;
        }
    }

    public function buyItem(Request $request)
    {
        if(empty($request->input('abarcode')) || empty($request->input('aquantity')))
        {
            return redirect('/homepage');
            exit;
        }
        else
        {
            $abarcode= $request->input('abarcode');
            $aquantity = $request->input('aquantity');
            // Find if it is duplicate
            $barcodeTemp = Session::get('bbarcode');
            $testDuplicate = false;
            $index = 0;
            for($i = 0; $i < count($barcodeTemp); $i++)
            {
                if($abarcode == $barcodeTemp[$i])
                {
                    $testDuplicate = true;
                    $index = $i;
                }
            }
            

            if($testDuplicate == true)//IF it existed in Caculator
            {
                $btotalQuantityTemp = Session::get('btotalQuantity');
                echo count($btotalQuantityTemp);
                for($i = 0; $i < count($btotalQuantityTemp); $i++)
                {
                    if ($i == $index)
                    {
                        if ($btotalQuantityTemp[$i] - $aquantity < 0)
                        {
                            $message = "Error Product Quantity!";
                            Session::put('message', $message);
                            return redirect('/homepage');
                            exit;
                        }
                        else
                        {
                            $btotalQuantityTemp[$i] -= $aquantity;

                            // Set New Value
                            $bquantityTemp = Session::get('bquantity');
                            $bquantityTemp[$i] += $aquantity;

                            $btotalFinalTemp = Session::get('btotalFinal');
                            $btotalTemp = Session::get('btotal');
                            $btotalFinalTemp -= $btotalTemp[$i];

                            $bpriceTemp = Session::get('bprice');
                            $btotalTemp[$i] = $bquantityTemp[$i] * $bpriceTemp[$i];

                            $btotalFinalTemp += $btotalTemp[$i];

                            Session::set('btotalQuantity',$btotalQuantityTemp);
                            Session::set('bquantity', $bquantityTemp);
                            Session::set('btotalFinal', $btotalFinalTemp);
                            Session::set('btotal', $btotalTemp);

                            return redirect('/homepage');
                            exit;

                        }
                    }
                }
            }
            else
            {
                $date = date('Y-m-d');
                $results = DB::select('select * from products where barcode_id = ? and quantity > 0 and expired_date > ?', [$abarcode, $date]);

                if(count($results) == 1)
                {
                    foreach ($results as $result)
                    {
                        if($result->quantity - $aquantity < 0)
                        {
                            $message = "Error Product Quantity!";
                            Session::put('message', $message);
                            return redirect('/homepage');
                            exit;
                        }
                        else if(Session::has('bid'))
                        {
                            Session::push(('bid'), $result->id);
                            Session::push(('bname'), $result->name);
                            Session::push(('bprice'), $result->price);
                            Session::push(('bquantity'), $aquantity);
                            Session::push(('btotalQuantity'), $result->quantity - $aquantity);
                            Session::push(('btotal'), $result->price * $aquantity);
                            Session::push(('bbarcode'), $result->barcode_id);
                            Session::put(('btotalFinal'), Session::get('btotalFinal') + ($result->price * $aquantity));

                            return redirect('/homepage');
                            exit;
                        }
                        else
                        {
                            $bid = $bname = $bprice = $bquantity = $btotal = $btotalQuantity = $bbarcode = array();

                            array_push($bid, $result->id);
                            array_push($bname, $result->name);
                            array_push($bprice, $result->price);
                            array_push($btotalQuantity, $result->quantity - $aquantity);
                            array_push($btotal, $result->price * $aquantity);
                            array_push($bbarcode, $result->barcode_id);
                            array_push($bquantity, $aquantity);

                            Session::put('bid', $bid);
                            Session::put('bname', $bname);
                            Session::put('bprice', $bprice);
                            Session::put('bquantity', $bquantity);
                            Session::put('btotalQuantity', $btotalQuantity);
                            Session::put('btotal', $btotal);
                            Session::put('bbarcode', $bbarcode);
                            Session::put(('btotalFinal'), $result->price * $aquantity);

                            return redirect('/homepage');
                            exit;
                        }
                    } 
                }
                else
                {
                    $message = "Error Barcode ID!";
                    Session::put('message', $message);
                    return redirect('/homepage');
                    exit;
                }
            }
        }// If Empty
    }// End Buy Function

    public function removeItem(Request $request)
    {
        if(empty($request->input('rid')))
        {
            return redirect('/homepage');
            exit;
        }
        else
        {
            if(Session::has('bid'))
            {
                $bidTemp = Session::get('bid');
                $testFound = false;
                for($i = 0; $i <count($bidTemp); $i++)
                {
                    if($request->input('rid') == $bidTemp[$i])
                    {
                        $testFound == true;
                        $bnameTemp = Session::get('bname');
                        $bpriceTemp = Session::get('bprice');
                        $bquantityTemp = Session::get('bquantity');
                        $btotalTemp = Session::get('btotal');
                        $bbarcodeTemp = Session::get('bbarcode');
                        $btotalFinalTemp = Session::get('btotalFinal');

                        $btotalFinalTemp -= $btotalTemp[$i];
                        if(($i + 1) == count($bidTemp))
                        {
                            unset($bidTemp[$i]);
                            unset($bnameTemp[$i]);
                            unset($bpriceTemp[$i]);
                            unset($bquantityTemp[$i]);
                            unset($btotalTemp[$i]);
                            unset($bbarcodeTemp[$i]);

                            Session::put('bid', $bidTemp);
                            Session::put('bname', $bnameTemp);
                            Session::put('bprice', $bpriceTemp);
                            Session::put('bquantity', $bquantityTemp);
                            Session::put('btotal', $btotalTemp);
                            Session::put('bbarcode', $bbarcodeTemp);
                            Session::put('btotalFinal', $btotalFinalTemp);
                        }
                        else if(count($bidTemp) > 1)
                        {
                            $bidTemp[$i] = $bidTemp[$i + 1];
                            $bnameTemp[$i] = $bnameTemp[$i + 1];
                            $bpriceTemp[$i] = $bpriceTemp[$i + 1];
                            $bquantityTemp[$i] = $bquantityTemp[$i + 1];
                            $btotalTemp[$i] = $btotalTemp[$i + 1];

                            unset($bidTemp[$i + 1]);
                            unset($bnameTemp[$i + 1]);
                            unset($bpriceTemp[$i + 1]);
                            unset($bquantityTemp[$i + 1]);
                            unset($btotalTemp[$i + 1]);
                            unset($bbarcodeTemp[$i + 1]);

                            Session::put('bid', $bidTemp);
                            Session::put('bname', $bnameTemp);
                            Session::put('bprice', $bpriceTemp);
                            Session::put('bquantity', $bquantityTemp);
                            Session::put('btotal', $btotalTemp);
                            Session::put('bbarcode', $bbarcodeTemp);
                            Session::put('btotalFinal', $btotalFinalTemp);
                        }
                        else
                        {
                            Session::forget('bid');
                            Session::forget('bname');
                            Session::forget('bprice');
                            Session::forget('bquantity');
                            Session::forget('btotal');
                            Session::forget('bbarcode');
                            Session::forget('btotalFinal');
                        }

                        return redirect('/homepage');
                        exit;
                    }
                }
                if($testFound == false)
                {
                    $message = "Product's ID isn't Matched!";
                    Session::put('message', $message);
                    return redirect('/homepage');
                    exit;
                }
            }
            else
            {
                $message = "No Items Added Yet!";
                Session::put('message', $message);
                return redirect('/homepage');
                exit;
            }
        }
    }

    public function sellItem(Request $request)
    {
        if(!empty($request->input('receivedDollar')) || !empty($request->input('receivedRiel')))
        {
            $received = $request->input('receivedDollar') + ($request->input('receivedRiel')/4100);

            if(Session::get('btotalFinal')>$received)
            {
                $message = "Can't Modify the Received!";
                Session::put('message', $message);
                return redirect('/homepage');
                exit;
            }

            $bid = Session::get('bid');
            $bTotalQuantity = Session::get('btotalQuantity');
            $bquantity = Session::get('bquantity');
            $total = Session::get('btotal');
            $id = Session::get('id');
            $date = date('Y-m-d H:i:s');
            $bTotalFinal = Session::get('btotalFinal');
            $email = Session::get('email');
            $score = Session::get('score');



            $score += count($bid);
            Session::set('score', $score);

            $mem_score = 0;
            $mem_discount =0;

            if(!empty($request->input('mem_id')))
            {
                $mem_id = $request->input('mem_id');
                $members = DB::Select("select * from member where id = $mem_id");
                if(count($members)!= 1)
                {
                    $message = "Wrong Membership ID!";
                    Session::put('message', $message);
                    return redirect('/homepage');
                    exit;
                }
                else
                {
                    foreach ($members as $member)
                    {
                        $mem_score = $member->score;
                        $mem_discount = $member->discount_percentage;
                    }
                }
            }

            if($mem_discount > 0)
            {
                for($i = 0; $i < count($total); $i++)
                {
                    $total[$i] = $total[$i] - ($total[$i] * $mem_discount/100);

                }

                $mem_score += ($bTotalFinal / 20);
                $mem_score = floor($mem_score);

                DB::Update("update member set score = $mem_score where id = $mem_id");
                Session::put('discount', $mem_discount);
                Session::put('mem_score', $mem_score);
                Session::put('mem_id', $mem_id);
            }


            $totalIncome = 0;
            if(!empty($request->input('mem_id')))
            {
                for($i = 0; $i < count($bid); $i++)
                {
                    $totalIncome += $total[$i];
                    DB::insert("insert into sell (`product_id`, `quantity`, `member_id`, `account_id`, `date`, `income`) values (?, ?, ?, ?, ?, ?)", [$bid[$i], $bquantity[$i], $request->input('mem_id'),$id, $date, $total[$i]]);
                    DB::update("update products set quantity = $bTotalQuantity[$i] where id = $bid[$i]");
                }
            }
            else{
                for($i = 0; $i < count($bid); $i++)
                {
                    $totalIncome += $total[$i];
                    DB::insert("insert into sell (`product_id`, `quantity`, `account_id`, `date`, `income`) values (?, ?, ?, ?, ?)", [$bid[$i], $bquantity[$i], $id, $date, $total[$i]]);
                    DB::update("update products set quantity = $bTotalQuantity[$i] where id = $bid[$i]");
                }
            }


            DB::insert("update clearks set score = $score where email = '$email'");

            Session::forget('bid');
            Session::forget('bbarcode');
            Session::forget('btotalFinal');

            $return = $received - $totalIncome;
            Session::put('return', $return);
            Session::put('finalTotal', $totalIncome);
            Session::put('received', $received);
            Session::set('score', $score);

            return redirect('/homepage/thank');
            exit;

        }
        else
        {
            $message = "Can't Modify the Received!";
            Session::put('message', $message);
            return redirect('/homepage');
            exit;
        }
    }
}
