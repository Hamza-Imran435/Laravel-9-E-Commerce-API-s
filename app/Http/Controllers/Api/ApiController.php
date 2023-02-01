<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewPasswordReqest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Models\User;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Builder\Function_;

class ApiController extends Controller
{
    use HasApiTokens;
    public function __construct(private ApiService $apiService){}

    //Register
    public function register(RegisterUserRequest $request){
        $response = $this->apiService->register($request);
        if ($response) {
            // return response()->json([
            //     'status' => 'True',
            //     'Message' => 'Please Check Your Email To Confirm Account Registration',
            // ]);
            return response()->success('Please Check Your Email To Confirm Account Registration');
        }else{
            // return response()->json([
            //     'status' => 'False',
            //     'Message' => 'Something Went Wrong.',
            // ]);
            return response()->error('Something Went Wrong...!');
        }
    }

    //Login
    public function verifyOtp(VerifyOtpRequest $request)
    {
        // dd($request);
        $result = $this->apiService->verifyOtp($request);
        if ($result == true) {
            // return response()->json([
            //     'status' => 'True',
            //     'Message' => 'Account Verified Successfully',
            // ]);
            return response()->success('Account Verified Successfully');
        } else {
            return response()->error('Something Went Wrong...!');
        }
    }

    public function Login(LoginRequest $request){
        $response = $this->apiService->Login($request);
        return $response;
    }

    //Logout
    public function logout(Request $request)
    {
        // dd($request);
        // $user = User::find($request->id);
        $request->user()->currentAccessToken()->delete();
        // $user->tokens()->delete();
        // return response()->json([
        //     'status' => 'True',
        //     'Message' => 'LogOut Successfully',
        // ]);
        return response()->success('LogOut Successfully');
    }

    //Update Password Request
    public function updatePasswordRequest(UpdatePasswordRequest $request){
        $response = $this->apiService->updatePasswordRequest($request);
        if ($response==true) {
            // return response()->json([
            //     'status' => 'True',
            //     'Message' => 'Check Your Email For Further Process',
            // ]);
            return response()->success('Check Your Email For Further Process');
        }else {
            // return response()->json([
            //     'status' => 'False',
            //     'Message' => 'Something Went Wrong',
            // ]);
            return response()->error('Something Went Wrong');
        }
    }

    public function updatePassword(NewPasswordReqest $request){
        $response  =  $this->apiService->updatePassword($request);
        if ($response) {
            // return response()->json([
            //     'status' => 'True',
            //     'Message' => 'Password Updated Successfully',
            // ]);
            return response()->success('Password Updated Successfully');
        }else {
            // return response()->json([
            //     'status' => 'False',
            //     'Message' => 'Something Went Wrong',
            // ]);
            return response()->error('Something Went Wrong');
        }
    }
}
