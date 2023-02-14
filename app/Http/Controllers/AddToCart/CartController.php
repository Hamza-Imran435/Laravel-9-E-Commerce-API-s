<?php

namespace App\Http\Controllers\AddToCart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;
use App\Http\Requests\Cart\ProductQuantityrequest;
use App\Http\Requests\Cart\SingleDeleteRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService){}

    public function cart(CartRequest $request){
        $response = $this->cartService->cart($request);
        return $response;
    }

    public function cartList(){
        $response = $this->cartService->cartList();
        return $response;
    }

    public function productQuantity(ProductQuantityrequest $request){
        $response = $this->cartService->productQuantity($request);
        return $response;
    }

    public function singleDelete(SingleDeleteRequest $request){
        $response = $this->cartService->singleDelete($request);
        return $response;
    }

    public function bulkDelete(Request $request){
        $response = $this->cartService->bulkDelete($request);
        return $response;
    }

    public function ProductQuantityUpdate(ProductQuantityrequest $request){
        $response = $this->cartService->ProductQuantityUpdate($request);
        return $response;
    }

    public function deleteQuantity(ProductQuantityrequest $request){
        $response = $this->cartService->deleteQuantity($request);
        return $response;
    }
}
