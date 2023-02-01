<?php
namespace App\Services;

use App\Http\Resources\EditCategoryResource;
use App\Models\Category;

class CategoryService{

    //create category
    public function createCategory($request){
        $result = Category::create($request->validated());
        return $result;
    }

    //Category List
    public function categoryList(){
        $result = Category::all();
        $response =  EditCategoryResource::collection($result);
        return response()->success('True',$response);
    }

    //edit
    public function editCategory($id){
        $result = Category::where('id' , $id )->get();
        $response =  EditCategoryResource::collection($result);
        return $response;
    }
    public function updateCategory($request){
        $data = Category::findOrFail($request->id);
        if (!empty($data)) {
            $data->category_name = $request->category_name;
            $result = $data->save();
            if ($result == true) {
                return response()->success('Category Updated Successfully...!');
            }else{
                return response()->error('Something Went Wrong...!');
            }
        }
    }

}
