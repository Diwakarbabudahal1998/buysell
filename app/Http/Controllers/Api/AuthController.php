<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\Interfaces\AuthRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Arr;
class AuthController extends Controller
{
   public function __construct(AuthRepositoryInterface $auth)
    {
        $this->auth = $auth;
    }
    public function login(Request $request)
    {
        return $this->auth->login($request);
    }
    public function register(Request $request)
    {
      return $this->auth->register($request);

    }
    public function loginFacebook(Request $request)
    {
        $http = new Client([
            'base_uri' => env('GRANT_URL'),
            'defaults' => [
                'exceptions' => false
            ]
         ]);
         
$response = $http->post('/oauth/token', [
    RequestOptions::FORM_PARAMS => [
        'grant_type' => 'social', // static 'social' value
        'client_id' => env('CLIENT_ID'), // client id
        'client_secret' => env('CLIENT_SECRET'), // client secret
        'provider' =>'facebook', // name of provider (e.g., 'facebook', 'google' etc.)
        'access_token' => "$request->access_token", // access token issued by specified provider
    ],
    RequestOptions::HTTP_ERRORS => false,]);
    $data = json_decode($response->getBody()->getContents(), true);

if ($response->getStatusCode() === 200) {
    $accessToken = Arr::get($data, 'access_token');
    $expiresIn = Arr::get($data, 'expires_in');
    $refreshToken = Arr::get($data, 'refresh_token');
    return response()->json(['success'=>'true',
    'message'=>'ok',
    'username'=>$request->username,
    'token'=>[
        'token_type'=>'Bearer',
        'expires_in'=>$expiresIn,
        'access_token'=>$accessToken,
        'refresh_token'=>$refreshToken
    ]]);
} else {
    $message = Arr::get($data, 'message');
    $hint = Arr::get($data, 'hint');
}

    }
    public function loginGoogle(Request $request)
    {
        $http = new Client([
            'base_uri' => env('GRANT_URL'),
            'defaults' => [
                'exceptions' => false
            ]
         ]);
         
$response = $http->post('/oauth/token', [
    RequestOptions::FORM_PARAMS => [
        'grant_type' => 'social', // static 'social' value
        'client_id' => env('CLIENT_ID'), // client id
        'client_secret' => env('CLIENT_SECRET'), // client secret
        'provider' =>'google', // name of provider (e.g., 'facebook', 'google' etc.)
        'access_token' => "$request->access_token", // access token issued by specified provider
    ],
    RequestOptions::HTTP_ERRORS => false,]);
    $data = json_decode($response->getBody()->getContents(), true);

if ($response->getStatusCode() === 200) {
    $accessToken = Arr::get($data, 'access_token');
    $expiresIn = Arr::get($data, 'expires_in');
    $refreshToken = Arr::get($data, 'refresh_token');
    return response()->json(['success'=>'true',
    'message'=>'ok',
    'username'=>$request->username,
    'token'=>[
        'token_type'=>'Bearer',
        'expires_in'=>$expiresIn,
        'access_token'=>$accessToken,
        'refresh_token'=>$refreshToken
    ]]);
} else {
    $message = Arr::get($data, 'message');
    $hint = Arr::get($data, 'hint');
}

    }


}
