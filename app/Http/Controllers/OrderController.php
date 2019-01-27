<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Product;
use App\Product;
use Validator;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        //xu ly
        if ($request->session()->has('cart')) {
            return view("paymentValidate");
        } else return redirect('/');
    }

    public function create(Request $request)
    {
//        dd($request->all());
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phoneNumber' => 'required|digits_between:10,14',
            'city' => 'required',
            'district' => 'required',
            'infoDetailAddress' => 'required|string',
            'optradio' => 'required',
            'ids.*' => 'required',
        ], [
            'name.required' => 'Tên  không thể bỏ trống',
            'name.max' => 'Tên quá dài (>255 kí tự)',
            'email.email' => 'Email không đúng định dạng',
            'email.required' => 'Vui lòng nhập email'
        ])->validate();
        $order = new Order;
        $path = public_path() . "/hanhchinh.json";
        $hanhchinh = json_decode(file_get_contents($path));
        foreach ($hanhchinh as $ma_tinh => $tinh) {
            if ($ma_tinh == $request->input('city')) {
                $order->customer_city = $tinh->name;
                foreach ($tinh->{'quan-huyen'} as $ma_huyen => $huyen) {
                    if ($ma_huyen == $request->input('district')) {
                        $order->customer_district = $huyen->name;
                        break;
                    }
                }
                break;
            }
        }
        $productInOrder = Product::find($request->ids);
        $totalPrice = 0;
        foreach ($request->ids as $id) {
            foreach ($productInOrder as $product) {
                if ($product->id == $id) {
                    $totalPrice += $product->price;
                    break;
                }
            }
        }
        $code = rand(100000000,999999999);
        while(Product::where('code',$code)->count()==1){
            $code = rand(100000000,999999999);
        }
        $order->code = $code;
        $order->customer_name = $request->input('name');
        $order->customer_email = $request->input('email');
        $order->customer_phone = $request->input('phoneNumber');
        $order->customer_address = $request->input('infoDetailAddress');
        $order->payment_method = (integer)$request->input('optradio');
        $order->price = $totalPrice;
        $order->notes = $request->input('notes', '');
        $order->save();

        $orders_products = [];
        foreach ($request->input('ids') as $productId) {
            $is_created = false;
            foreach ($orders_products as $order_product) {
                if ($order_product->products_id == (int)$productId) {
                    $order_product->amounts += 1;
                    $is_created = true;
                }
            }
            if (!$is_created) {
                $order_product = new Order_Product;
                $order_product->products_id = (int)$productId;
                $order_product->amounts = 1;
                foreach ($productInOrder as $productOrder) {
                    if ($productOrder->id == $productId) {
                        $order_product->price = $productOrder->price;
                        break;
                    }
                }
                $order_product->Order()->associate($order);
                array_push($orders_products, $order_product);
            }
        }
//        dd($orders_products);
        foreach ($orders_products as $order_product) {
            $order_product->save();
        }
        return view("orderSuccess",['code'=>$code]);
    }
}
