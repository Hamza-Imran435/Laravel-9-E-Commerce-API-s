<?php
namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartService{
    public function cart($request){
        $response = Cart::updateOrCreate(
            [
               'customer_id' => Auth::id(),
               'product_id'  => $request->product_id
            ],[
                'total_price' => $request->total_price,
                'quantity'    => $request->quantity
            ]
        );
        if ($response) {
            return response()->success('Product Added to Cart');
        }else{
            return  response()->error('Something Went Wrong');
        }
    }

    public function cartList(){
        $user = Auth::user();
        $data = Cart::where('customer_id',$user->id)->get();
        if ($data->count()==0) {
            return response()->error('Cart is Empty');
        }else{
            return response()->success('True',$data);
        }

    }

    public function productQuantity($request){
        if ($request->quantity < 1) {
            return response()->error('Quantity must be Greater then 1');
        }else{
            $user = Auth::id();
            $data = Cart::where('product_id',$request->product_id)->where('customer_id',$user)->first();
            $data->quantity = $request->quantity;
            $data->save();
            return response()->success('Product Updated Successfully');
        }

    }

    public function singleDelete($request){
        $user = Auth::user();
        $data = Cart::where('customer_id',$user->id)->where('product_id',$request->product_id)->first();
        $data->delete();
        if ($data) {
            return response()->success('Product Deleted Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }
    }

    public function bulkDelete($request){
        $user = Auth::id();
        $data = Cart::where('customer_id',$user)->delete();
        if ($data) {
            return response()->success('Products Deleted Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }
    }
}
