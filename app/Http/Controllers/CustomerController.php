<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\WelcomeNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Customer;
use Validator;
use Auth;
class CustomerController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth.api',['except'=>['login','logins','register','logout','profile']]);
    }

   public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Validation failed'], 422);
    }

    $credentials = $request->only('email', 'password');

    if (Auth::guard('api')->attempt($credentials)) {
        $user = Auth::guard('api')->user();
        $token = $user->createToken('MyApp')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
}





public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        // 'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        'password' => ['required', 'string', 'min:6'],
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $customer = Customer::create([
        // 'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    $token = $customer->createToken('MyApp')->plainTextToken;

    return response()->json([
        'token' => $token,
        'customer' => $customer,
    ]);
}


public function logins(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email'],
    ]);

    if ($validator->fails()) {
        return 'field required';
    }

    $credentials = $request->only('email');
    
    $user = Customer::firstOrCreate($credentials);

    if ($user->wasRecentlyCreated) {
        $token = $user->createToken('MyApp')->plainTextToken;
 // $token = Auth::login($user);
  $user->notify(new WelcomeNotification($user));
    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
    }

    $token = Auth::login($user);
    $token = $user->createToken('MyApp')->plainTextToken;

return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
}

     public function profile(Request $request)
    {
      
        $user = Auth::Customer()->email;
        return response()->json([
                'status' => 'success',
                'user' => $user
                
            ]);
    }

       public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->update($request->all());
    return "Updated successfully".','.$data;
    }

    public function delete(Request $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->delete();

        return 'item deleted';
    }

}
