<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Session;
use DB;

class AdminProductController extends Controller
{
    public function getNumberOfAllProducts()
    {
        $result = DB::select('select * from `products`');
        return count($result);
    }

    public function getNumberOfFoodProducts()
    {
        $result = DB::select('select * from `products` where `category` = ?', ['Food']);
        return count($result);
    }

    public function getNumberOfGadgetProducts()
    {
        $result = DB::select('select * from `products` where `category` = ?', ['Gadget']);
        return count($result);
    }

    public function getNumberOfDrinkProducts()
    {
        $result = DB::select('select * from `products` where `category` = ?', ['Drink']);
        return count($result);
    }

    public function getNumberOfBeautyProducts()
    {
        $result = DB::select('select * from `products` where `category` = ?', ['Beauty']);
        return count($result);
    }

    public function getProducts()
    {
        $all = $this->getNumberOfAllProducts();
        $food = $this->getNumberOfFoodProducts();
        $gadget = $this->getNumberOfGadgetProducts();
        $drink = $this->getNumberOfDrinkProducts();
        $beauty = $this->getNumberOfBeautyProducts();

        $allProduct = array($all, $food, $gadget, $drink, $beauty);

        Session::put('allProduct', $allProduct);

        return redirect('/admin/getAllUsers');
        exit;
    }

    public function registerProduct(Request $request)
    {
        if(empty($request->input('pBarcode')) || empty($request->input('pName')) || empty($request->input('pCountry')) || empty($request->input('pQuantity')) || empty($request->input('pPrice')) || empty($request->input('pCategory')) || empty($request->input('pImported_date')) || empty($request->input('pExpired_date')) || empty($request->input('supplier_id')) || empty($request->file('image')))
        {
            $message = "*All Fields are required!";
            Session::put('message', $message);
            return redirect('/admin/registration');
            exit;
        }
        else
        {
            $barcode = $request->input('pBarcode');
            $name = $request->input('pName');
            $country = $request->input('pCountry');
            $quantity = $request->input('pQuantity');
            $price = $request->input('pPrice');
            $category = $request->input('pCategory');
            $imported_date = $request->input('pImported_date');
            $expired_date = $request->input('pExpired_date');
            $supplier_id = $request->input('supplier_id');

            $products = DB::Select("select * from products where barcode_id = $barcode");
            if(count($products) != 0)
            {
                $message = "*Barcode has been token in Database!";
                Session::put('message', $message);
                return redirect('/admin/registration');
                exit;
            }

//            $this->validate($request, [
//                'pPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/product/'), $imageName);

            $base_path = "http://localhost:8000/images/product/";
            $imageName = $base_path.$imageName;

            $testSupplier = false;
            $suppliers = DB::Select('select * from suppliers');
            foreach($suppliers as $supplier){
                if($supplier_id == $supplier->id)
                {
                    $testSupplier = true;
                }
            }

            if($testSupplier == false)
            {
                $message = "*Supplier ID isn't existed!";
                Session::put('message', $message);
                return redirect('/admin/registration');
                exit;
            }

            
            DB::Insert("insert into `products`(`barcode_id`, `name`, `country`, `quantity`, `price`, `category`,`image_path`, `imported_date`, `expired_date`)
                        values ($barcode, '$name', '$country', $quantity, $price, '$category', '$imageName', '$imported_date', '$expired_date')");

            $id = 0;
            $results = DB::Select("select * from `products` where `barcode_id` = $barcode");
            foreach ($results as $result)
            {
                $id = $result->id;
            }

            $date = date('Y-m-d h:m:s');
            DB::Insert("insert into `supply`(`supplier_id`, `product_id`, `quantity`, `date`)
                        values ($supplier_id, $id, $quantity, '$date')");

            $score = 0;
            $results = DB::Select("select score from `suppliers` where id = $supplier_id");
            foreach ($results as $result)
            {
                $score = $result->score;
            }
            $score += 1;

            DB::Update("update `suppliers` set `score` = $score where id = $supplier_id");

            $message = "Product was submitted successfully!";
            Session::put('message', $message);
            return redirect('/admin/registration');
            exit;
        }
    }

    public function supplyProduct(Request $request)
    {
        $id = $request->input('supply');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $supplier_id = $request->input('supplier_id');
        $oldQuantity = $request->input('oldQuantity');
        $supplier_quan = $quantity - $oldQuantity;

        if($supplier_quan == 0)
        {
            $pidTemp = Session::get('pid');
            $quantityTemp = Session::get('quantity');
            $priceTemp = Session::get('price');
            DB::Update("update `products` set quantity = $quantity, `price` = $price where `id` = $id");
            for($i = 0; $i < count($pidTemp); $i++)
            {
                if($id == $pidTemp[$i])
                {
                    $quantityTemp[$i] = $quantity;
                    $priceTemp[$i] = $price;
                }
            }

            Session::set('quantity', $quantityTemp);
            Session::set('price', $priceTemp);

            return redirect('/admin/product');
            exit;
        }
        if($supplier_quan < 0)
        {
            return redirect('/admin/product');
            exit;
        }

        $testSupplier = false;
        $suppliers = DB::Select('select * from suppliers');
        foreach($suppliers as $supplier){
            if($supplier_id == $supplier->id)
            {
                $testSupplier = true;
            }
        }
        if($testSupplier == false)
        {
            $message = "*Supplier ID isn't existed!";
            Session::put('message', $message);
            return redirect('/admin/product');
            exit;
        }

        DB::Update("update `products` set quantity = $quantity, `price` = $price where `id` = $id");

        $date = date('Y-m-d h:m:s');

        DB::Insert("insert into supply (supplier_id, product_id, quantity, date)
                    values ($supplier_id, $id, $supplier_quan, '$date')");

        $score = 0;
        $results = DB::Select("select score from suppliers where `id` = $supplier_id");
        foreach ($results as $result)
        {
            $score = $result->score;
        }
        $score += 1;

        DB::Update("update suppliers set score = $score where id = $supplier_id");

        $pidTemp = Session::get('pid');
        $quantityTemp = Session::get('quantity');
        $priceTemp = Session::get('price');

        for($i = 0; $i < count($pidTemp); $i++)
        {
            if($id == $pidTemp[$i])
            {
                $quantityTemp[$i] = $quantity;
                $priceTemp[$i] = $price;
            }
        }

        Session::set('quantity', $quantityTemp);
        Session::set('price', $priceTemp);

        return redirect('/admin/product');
        exit;

    }

    public function removeProduct(Request $request)
    {
        $id = $request->input('remove');
        DB::Delete("delete from products where id = $id");

        if(Session::has('pid'))
        {
            if(Session::has('category'))
            {
                $direction = "";
                $category = Session::get('category');
                $direction = $category[0];
                return redirect("/homepage/get$direction");
                exit;
            }
        }
    }
}
