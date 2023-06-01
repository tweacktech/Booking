<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Hash;
use App\Models\Customer;
use App\Models\Centers;
use App\Models\NucAmin;
use App\Models\Centersusers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APIAuthController extends Controller
{
  
  
       
    public function logincustomer(Request $request)
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
        // Send welcome email to the newly registered user
        // Mail::to($user->email)->send(new WelcomeEmail($user));
    }

    $token = Auth::login($user);

    return response()->json([
        'status' => 'success',
        'user' => $user,
        'authorization' => [
            'token' => $token,
            'type' => 'bearer',
        ]
    ]);
}
  
  
  
    
    public function register(Request $req){
      
      	$name = $req->name;
      	$address = $req->address;
      	$phone = $req->phone;
      	$password = $req->password;
      	$email = $req->email;
        
        $data = [
          'name' => $name,
          'address' => $address,
          'phone' => $req->phone,
          'password' => Hash::make($password),
          'email' => $email,
          
        ];
      
      	$chk = DB::table('customers')
          ->where('email', $email)
          ->count();
      
      	if($chk > 0){
           return response()->json(['message' => 'Email already used, Please use another email'], 201);
        }
      
      
      	$chk = DB::table('customers')
          ->where('phone', $phone)
          ->count();
      
      
      	if($chk > 0){
           return response()->json(['message' => 'Phone Number already used, Please use another email'], 201);
        }
      
      
      	$register = DB::table('customers')
         ->insert($data);
        
      
        if($register){
            return response()->json(['message' => 'Registered Successfully','status' => 'account is pending please verify your account'], 200);
        }
      
        return response()->json(['message' => 'Registered Unsuccessfully'], 201);

       
    }
  
  

    public function login(Request $req){
      $fields = [
        'email_phone' => $req->email,
        'password' => $req->password,
      ];

      $user = Customer::where('email', $fields['email_phone'])->first();
      if(!$user || !Hash::check($fields['password'], $user->password)){
        $user = Customer::where('phone', $fields['email_phone'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'incorrect credentials'], 201);
        }
      }
      $token = $user->createToken('token')->plainTextToken;
      if($user->email_verified_at == null || $user->email_verified_at == ""){
        return response(['message' => $user, 'barear_token' => $token, 'status', 'Verify Your Account'], 200);
      }
      return response(['message' => $user, 'barear_token' => $token], 200);
    }
  

    public function verify_account(Request $req){
  
      
      $chk = DB::table('customers')
        ->where('email', $req->email)
       ->where('token', $req->otp)
        ->count();
      
      if($chk > 0){
        DB::table('customers')
          ->where('email', $req->email)
         ->update(['email_verified_at' => '1']);
        return response()->json(['message' => 'Account Verivied Successfully'],200);
      }else{
        return response()->json(['message' => 'Code does not match'],201);
      }
        
        
    }

    public function reset_password(Request $req){
      $user = DB::table('customers')
      ->where(['email' => $req->email, 'otp' => $req->otp])
      ->first();

      if($user){
          $update_password = DB::table('customers')
          ->where(['email' => $req->email, 'otp' => $req->otp])
          ->update(['password' => Hash::make($req->password)]);

          if($update_password){
            return response()->json(['message' => 'Password Updated Successfully'], 200);
          }
             return response()->json(['message' => 'Failed To Update Password'], 201);
      }
    }

    public function forget_password(Request $req){
      $user = DB::table('customers')
      ->where('email', $req->email)
      ->first();

      if(!$user){
        return response()->json(['message' => 'email does not exist'], 201);
      }

      $otp = rand(111111,999999);

      $generate_otp = DB::table('customers')
      ->where('id', $user->id)
      ->update(['otp' => $otp]);

      if($generate_otp){
        return response()->json(['otp' => $otp], 200);
      }
      return response()->json(['message' => 'couldnt generate otp'], 201);
    }
  
  
  
  
  
  //NUC
   public function centerlogin(Request $req){
      $fields = [
        'email_phone' => $req->email,
        'password' => $req->password,
      ];

      $user = Centers::where('email', $fields['email_phone'])->first();
     
      if(!$user || !Hash::check($fields['password'], $user->password)){
        $user = Centers::where('phone_number', $fields['email_phone'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'incorrect credentials'], 201);
        }
      }
      $token = $user->createToken('token')->plainTextToken;
     
     
     $user = DB::table('centers')
       ->where('email', $req->email)
       ->first();
     
     return response(['message' => $user, 'barear_token' => $token], 200);
      
    }
  
  
  
   public function centerUserlogin(Request $req){
      $fields = [
        'email_phone' => $req->email,
        'password' => $req->password,
      ];

      $user = Centersusers::where('email', $fields['email_phone'])->first();
     
      if(!$user || !Hash::check($fields['password'], $user->password)){
        $user = Centersusers::where('phone_number', $fields['email_phone'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'incorrect credentials'], 201);
        }
      }
      $token = $user->createToken('token')->plainTextToken;
     
     
     $user = DB::table('center_users')
       ->where('email', $req->email)
       ->first();
     
     //$data = [
     //  'center_otp':'12345',
     //];
     
     //$user = Centers::where('email', $fields['email_phone'])->update($data);
      
     return response(['message' => $user, 'barear_token' => $token], 200);
      
    }
  
  
  
  
    public function AddNewCenter(Request $req){
      $chk = DB::table('centers')
       ->where('email', $req->email)
      ->where('phone_number', $req->phone_number)
      ->count();
      // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

      
      if($chk == 0){
        $data = [
        'id' => $string,
     	'center_name' => $req->center_name,
        'center_code' => $req->center_code,
        'email' => $req->email,
        'phone_number' => $req->phone_number,
        'password' => Hash::make($req->password),
        'center_otp' => '12345',
        'type' => $req->type,
        'address' => $req->address,
        'zone' => $req->zone,
       
       ];
      
      $addCenter = DB::table('centers')
       ->insert($data);
      
      if($addCenter){
        return response()->json(['result' => 'Center Added Successfully'], 200);
      }else{
        return response()->json(['result' => 'Something went wrong, Please try Again'], 201);
      }
      
      
		
      }else{
        return response()->json(['result' => 'Please Cheack Email or Phone Number, Already Exist'], 203);
      }
     
       
    }
  
  
  
  public function EditCenter(Request $req, $id){
      $chk = DB::table('centers')
       ->where('email', $req->email)
      ->where('phone_number', $req->phone_number)
      ->count();
      // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

      
      if($chk == 0){
        $data = [
        'id' => $string,
     	'center_name' => $req->center_name,
        'center_code' => $req->center_code,
        'email' => $req->email,
        'phone_number' => $req->phone_number,
        'type' => $req->type,
        'address' => $req->address,
       	
       
       ];
      
      $addCenter = DB::table('centers')
       ->where('id', $id)
       ->update($data);
      
      if($addCenter){
        return response()->json(['result' => 'Center Edited Successfully'], 200);
      }else{
        return response()->json(['result' => 'Something went wrong, Please try Again'], 201);
      }
      
      
		
      }else{
        return response()->json(['result' => 'Please Cheack Email or Phone Number, Already Exist'], 203);
      }
     
       
    }
  
  
  //manage User
  public function AddNewUser(Request $req){
    
    $chk = DB::table('center_users')
      ->where('email', $req->email)
      ->count();
    
    if($chk == 0){
      
      $data = [
        'name' => $req->name,
        'email' => $req->email,
        'password'=> Hash::make($req->password),
        'phone_number' => $req->phone_number,
        'center_id' => $req->center_id,
        
      ];
        
      $add= DB::table("center_users")
       ->insert($data);
      
      if($add){
        return response()->json(['data' => "User Added Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    }else{
      return response()->json(['data' => "User Already Added"], 201);
    }
  }
  
  
}