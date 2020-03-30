<?php
namespace App\Repositories\Api\Repository;
use App\Repositories\Api\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthRepository implements AuthRepositoryInterface
{
    public function register(Request $request)
    {
       $v=$request->validate([
          'email'=>'required|email',
          'password'=>'required',
          'address'=>'required|max:255',
          'phone'=>'required|numeric',
          'name'=>'required|max:255'
       ]);
       try{
         $user=User::where('email',$request->email)->first();
         if($user)
         {
            return response(['success'=>'error','message'=>'User already exist']);
         }
         if(strlen($request->phone)!=10){
            return response(['status'=>'false','message'=>'Invalid phone number']);
         }
         $user=new User;
         $user->email=$request->email;
         $user->password=bcrypt($request->password);
         $user->address=$request->address;
         $user->phone=$request->phone;
         $user->name=$request->name;
         $user->save();
         $http = new Client([
            'base_uri' => env('GRANT_URL'),
            'defaults' => [
                'exceptions' => false
            ]
         ]);
   
   $response = $http->post('/oauth/token', [
       'form_params' => [
           'grant_type' => env('GRANT_TYPE'),
           'client_id' => env('CLIENT_ID'),
           'client_secret' => env('CLIENT_SECRET'),
           'username' => $request->email,
           'password' => $request->password,
           'scope' => '',
       ],
   ]);
   return response(['success'=>'true','message'=>'OK']);
       }
   catch(Exception $e){
      return response()->json([
         'status'=>'false',
         'message'=>'Cannot connect to server'
      ]);
   }
      
  
 
    }
    public function login(Request $request)
    {
       $v=$request->validate([
          'email'=>'required',
          'password'=>'required',
       ]);
       $user=User::where('email',$request->email)->first();
       if(!$user)
       {
          return response(['success'=>'error','message'=>'user not found']);
       }
       if(Hash::check($request->password,$user->password))
       {
         try{
            $http = new Client([
               'base_uri' => env('GRANT_URL'),
               'defaults' => [
                   'exceptions' => false
               ]
            ]);
            $response = $http->post('/oauth/token', [
               'form_params' => [
                   'grant_type' => env('GRANT_TYPE'),
                   'client_id' => env('CLIENT_ID'),
                   'client_secret' => env('CLIENT_SECRET'),
                   'username' => $request->email,
                   'password' => $request->password,
                   'scope' => '',
               ],
           ]);
           return response(['success'=>'true','message'=>'OK','username'=>$user->name,"token"=>json_decode((string) $response->getBody(), true)]);


         } 
       catch(Exception $e){
         return response()->json([
            'status'=>'false',
            'message'=>'Cannot Connect to server'
         ]);
       } 
         
       }
       else{
          return response(['success'=>'error','message'=>'password not matched']);
 
       }
    }
}
