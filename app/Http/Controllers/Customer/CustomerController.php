<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerLoginRequest;
use App\Http\Requests\Customer\CustomerNewPasswordRequest;
use App\Http\Requests\Customer\CustomerOtpRequest;
use App\Http\Requests\Customer\CustomerUpdatePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewPasswordReqest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(protected CustomerService $customerService){}

        //Register
        public function register(RegisterUserRequest $request){
            $response = $this->customerService->register($request);
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
        public function verifyOtp(CustomerOtpRequest $request)
        {
            // dd($request);
            $result = $this->customerService->verifyOtp($request);
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

        public function Login(CustomerLoginRequest $request){
            $response = $this->customerService->Login($request);
            return $response;
        }

        //Logout
        public function logout(Request $request)
        {
            session()->forget('user_token');
            $request->user()->currentAccessToken()->delete();
            return response()->success('LogOut Successfully');
        }

        //Update Password Request
        public function updatePasswordRequest(CustomerUpdatePasswordRequest $request){
            $response = $this->customerService->updatePasswordRequest($request);
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

        public function updatePassword(CustomerNewPasswordRequest $request){
            $response  =  $this->customerService->updatePassword($request);
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
