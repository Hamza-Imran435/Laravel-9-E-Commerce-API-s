<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\DeleteRequest;
use App\Http\Requests\Product\EditRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService){}

    public function createProduct(CreateRequest $request){
        $response = $this->productService->createProduct($request);
        return $response;
    }

    public function deleteProduct(DeleteRequest $request){
        $response = $this->productService->deleteProduct($request);
        return $response;
    }

    public function productListing(){
        $response = $this->productService->productListing();
        return $response;
    }

    public function editProduct(EditRequest $request){
        $response = $this->productService->editProduct($request);
        return $response;
    }

    public function updateProduct(EditRequest $request){
        $response = $this->productService->updateProduct($request);
        return $response;
    }
}
