<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class AuthController extends Controller
{
/**
* Write code on Method
*
* @return response()
*/
public function index()
{
return view('authentication.login');
}  
/**
* Write code on Method
*
* @return response()
*/
public function registration()
{
return view('authentication.registeration');
}
/**
* Write code on Method
*
* @return response()
*/
public function postLogin(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);
$credentials = $request->only('email', 'password');
if (Auth::attempt($credentials)) {
return redirect()->intended('employee')
->withSuccess('You have Successfully logged in');
}
return redirect("login")->withSuccess('Invalid credentials');
}
/**
* Write code on Method
*
* @return response()
*/
public function postRegistration(Request $request)
{  
   
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'password' => 'required',
        'email' => 'required|email|unique:users'
    ]);



if($validator->fails()){
    return response()->json(['error' => $validator->errors()->all()]);
}
else{
    
$data = $request->all();

$createUser = $this->create($data);
$token = Str::random(64);
UserVerify::create([
'user_id' => $createUser->id, 
'token' => $token
]);
Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
$message->to($request->email);
$message->subject('Verification');
});
return response()->json(['success' => 'Register success, please check your email address.']);
}
}
/**
* Write code on Method
*
* @return response()
*/
public function dashboard()
{
if(Auth::check()){
return view('employee');
}
return redirect("login")->withSuccess('You do not have access');
}
/**
* Write code on Method
*
* @return response()
*/
public function create(array $data)
{
return User::create([
'name' => $data['name'],
'email' => $data['email'],
'password' => Hash::make($data['password'])
]);
}
/**
* Write code on Method
*
* @return response()
*/
public function logout() {
// Session::flush();
Auth::logout();
return Redirect('login');
}
/**
* Write code on Method
*
* @return response()
*/
public function verifyAccount($token)
{
$verifyUser = UserVerify::where('token', $token)->first();
$message = 'Your email cannot be identified.';
if(!is_null($verifyUser) ){
$user = $verifyUser->user;
if(!$user->is_email_verified) {
$verifyUser->user->is_email_verified = 1;
$verifyUser->user->save();
$message = "Your e-mail is verified. You can now login.";
} else {
$message = "Your e-mail is already verified. You can now login.";
}
}
return redirect()->route('login')->with('message', $message);
}
}