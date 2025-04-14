<?php

namespace App\Http\Controllers\V1\api\Admin;

use App\DTO\UserDTO;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\Services\UserServiceInterface;

class UserController extends Controller
{
    use ResponseTrait;
    public function __construct(protected UserServiceInterface $userServiceInterface){}
    public function register(RegisterRequest $register){
        $status = $register->status ?? 'simple';
       $userDTO = new UserDTO($register->name,$register->email,$register->password,$status);
       $user = $this->userServiceInterface->register($userDTO);
       return $this->success(new UserResource($user),__('messages.user.register'));
    }
    public function login(LoginRequest $loginRequest){
        $data = $loginRequest->validated();
        $response = $this->userServiceInterface->login($data);
        return $this->success([
            'user' => new UserResource($response['user']),
            'token' => $response['token']
        ], __('messages.user.login'));
    
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->success([], __('successes.user.logout'), 204);
    }
}
