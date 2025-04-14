<?php

namespace App\Reposities;

use App\Interfaces\Reposities\UserReposityInterface;
use App\Models\User;

class UserReposity implements UserReposityInterface
{
   public function registerForm($data){
  $user = new User();
  $user->name = $data['name'];
  $user->email = $data['email'];
  $user->password = $data['password'];
  $user->status = $data['status'];
  $user->save();
  return $user;
   }
   public function loginForm($email){
      return User::where('email', $email)->first();  
  }
  
   public function getById($id){

   }
   public function findById($id, $data){

   }
   public function destroy($id){

   }
   
}
