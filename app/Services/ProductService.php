<?php
namespace App\Services;

use App\Http\Resources\Product\ListingResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Response;

class ProductService{

    //create Product
    public function createProduct($request){
        $result = Product::create($request->validated());
        if ($result) {
            return response()->success('Product Created Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }
    }

    public function deleteProduct($request){
        $result = Product::findOrFail($request->id);
        if(!empty($result)){
            $result->delete();
            return response()->success('Product Deleted Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }
    }

    public function productListing(){
        $result = Product::all();
        $Resource = ListingResource::collection($result);
        if(!empty($Resource)){
            return response()->success('True',$Resource);
        }else{
            return response()->error('Something Went Wrong');
        }

    }

    public function editProduct($request){
        $result = Product::where('id',$request->id)->get();
        if ($result) {
            $Resource = ListingResource::collection($result);
            return response()->success('True',$Resource);
        }else{
            return response()->error('Something Went Wrong');
        }
    }

    public function updateproduct($request){
        $data = Product::findOrFail($request->id);
        if (!empty($data)) {
            $data->name = $request->name;
            $data->price = $request->price;
            $data->description = $request->description;
            $result = $data->save();
            if ($result == true) {
                return response()->success('Product Updated Successfully...!');
            }else{
                return response()->error('Something Went Wrong');
            }
        }else{
            return response()->error('Something Went Wrong');
        }
    }

}
