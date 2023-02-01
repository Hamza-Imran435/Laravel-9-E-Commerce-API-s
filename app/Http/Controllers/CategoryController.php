<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catedory\DeleteRequest;
use App\Http\Requests\Catedory\UpdateRequest;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct( private CategoryService $categoryService ){}

    public function createCategory(CategoryCreateRequest $request){
        $result = $this->categoryService->createCategory($request);
        if ($result) {
            return response()->success('Category Created Successfully...!');
        }else{
            return response()->error('Something Went Wrong...!');
        }
    }

    public function categoryList(){
        $response = $this->categoryService->categoryList();
        return $response;
    }

    public function editCategory($id){
        $result = $this->categoryService->editCategory($id);
        if(!empty($result)){
            return response()->success('True',$result);
        }else{
            return response()->error('Something Went Wrong...!');
        }
    }

    public function updateCategory(UpdateRequest $request){
        $response = $this->categoryService->updateCategory($request);
        return $response;
    }

    public function deleteCategory(DeleteRequest $request){
        $result = Category::findOrFail($request->id);
        if ($result->products()->count()) {
            return response()->error('Category Already Assign to Product...!');
        }else{
            $result->delete();
            return response()->success('Category Deleted Successfully...!');
        }
    }
}
