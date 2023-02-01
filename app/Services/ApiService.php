<?php
namespace App\Services;

use App\Http\Requests\RegisterUserRequest;
use App\Jobs\AccountVerificationJob;
use App\Jobs\UpdatePasswordRequestJob;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class ApiService{
    use HasApiTokens, HasFactory, Notifiable;

    public function register($request){
        $data =[];
        $random = rand(1000, 9999);
        $result = $request->all();
        $data =['name'=>$request->name,'otp'=>$random];
        $data['to'] = $request->email;
        $result['otp'] = $random;
        $result['password'] = Hash::make($result['password']);
        $user=User::create($result);
        // dd($data);
        // $result->save();
        // dd($data);
        // $data = implode($data);
        dispatch(new AccountVerificationJob($data));
        // $token = $user->createToken($request->password);
        $response =[
            'user' => $result,
            // 'token' => $token->plainTextToken
        ];
        return $response;
    }

    public function verifyOtp($request){

        $user = User::where('otp',$request->otp )->where('email',$request->email)->first();
        // dd($user);
        if ($user) {
            $user->otp = null ;
            $user->email_verified = 1;
            $user->save();
            return true;
        }else {
            return false;
        }

    }

    public function Login($request){
        $user = User::where('email', $request->email)->first();
        if ($user->email_verified == 1) {
            if(!$user || !Hash::check($request->password, $user->password)){
                return  $error =[
                    'status' => 'False',
                    'Message' => 'Password Donot Matched'
                ];
                return $error;
            } else {
                $token = $user->createToken($request->password);
                $response =[
                    'status' => 'true',
                    'message' => 'Login Token',
                    'token' => $token->plainTextToken
                ];
                return $response;
            }
        } else {
            $response =[
                'status' => 'False',
                'message' => 'Account Not Verified'
            ];
            return $response;
        }


    }

    public function updatePasswordRequest($request){
        $random = rand(1000, 9999);
        $user = User::where('email',$request->validated())->first();
        $data =['otp'=>$random];
        $data['to'] = $request->email;
        dispatch(new UpdatePasswordRequestJob($data));
        $user->otp = $random;
        $user->save();

        return true;
    }

    public function updatePassword($request){
        $user = User::where('otp',$request->otp)->first();
        // dd($user);
        $user->password = Hash::make($request->new_password);
        $user->otp = null;
        $user->save();
        return true;
    }

}
