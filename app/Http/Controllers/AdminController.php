<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $c_code=0;
        $name=$request->fname;
        $lname=$request->lname;
        $fname_l=strlen($request->fname);
        $lname_l=strlen($request->lname);
        $phone_l=strlen($request->m_number);
        $pass_l=strlen($request->pass);
        

       
            if($fname_l<3){
                
                $request->session()->flash('fname_l', 'First Name At least 3 charecter!');
                return back();

            }
            for($i=0;$i<$fname_l;$i++){
                if($name[$i]=='0'||$name[$i]=='1'||$name[$i]=='2'||$name[$i]=='3'||$name[$i]=='4'||$name[$i]=='5'||$name[$i]=='6'||$name[$i]=='7'||$name[$i]=='8'||$name[$i]=='9'){
                    $request->session()->flash('fname_l', 'First Name Can not be number!');
                return back();
                }
            }
            if(is_numeric($request->fname)==true){
                $request->session()->flash('fname_l', 'First Name Can not be number!');
                return back();
            }
            if($lname_l<3){
                
                $request->session()->flash('lname_l', 'Last Name At least 3 charecter!');
                return back();
            }
            for($i=0;$i<$lname_l;$i++){
                if($lname[$i]=='0'||$lname[$i]=='1'||$lname[$i]=='2'||$lname[$i]=='3'||$lname[$i]=='4'||$lname[$i]=='5'||$lname[$i]=='6'||$lname[$i]=='7'||$lname[$i]=='8'||$lname[$i]=='9'){
                    $request->session()->flash('lname_l', 'Last Name Can not be number!');
            return back();
                }
            }
            if(is_numeric($request->lname)==true){
                $request->session()->flash('lname_l', 'Last Name Can not be Number!');
                return back();
            }
            if($phone_l<10){
                
                $request->session()->flash('phone_l', 'Phone Number At least 10 digits!');
                return back();
            }
            if($phone_l>12){
                
                $request->session()->flash('phone_l', 'Phone Number Maximum 12 digits!');
                return back();
            }
            if(is_numeric($request->m_number)==false){
                $request->session()->flash('phone_l', 'Phone Number Can not be charector!');
                return back();
            }
            if($pass_l<3){
                
                $request->session()->flash('pass', 'Password At least 3 charecter!');
                return back();
            }
            if($pass_l>10){
                $request->session()->flash('pass', 'Password maximum 10 charecter!');
                return back();
            }
            if($request->pass!=$request->re_pass){
                $request->session()->flash('confirm', 'Password Does Not Match!');
                return back();
            }
            $data = DB::table('registers')
            ->where('phone_number', $request->m_number)
            ->get();

        foreach ($data as $value) {
            $c_code = $value->phone_number;
        }
        if($c_code){
            $request->session()->flash('phone_l', 'Mobile Number Already exists');
                return back();
        }else{
            DB::beginTransaction();
            try {
                $viva_name = array();
                $viva_name['fname'] = $request->fname;
                $viva_name['lname'] = $request->lname;
                $viva_name['organization'] = $request->organization;
                $viva_name['street'] = $request->street;
                $viva_name['city'] = $request->city;
                $viva_name['email'] = $request->email;
                $viva_name['phone_number'] = $request->m_number;
                $viva_name['password'] = Hash::make($request->pass);
                DB::table('registers')->insert($viva_name);
                DB::commit();
                $request->session()->put('phone',$request->m_number);
                return redirect()->to('dashboard');
            } catch (\Exception $e) {
                $request->session()->flash('message', 'Not Registerd . Try Again');
                DB::rollback();
                return back();
            }
        }    
    }
    //end register section
    public function login(Request $request)
    {
        $number=0;
        if(is_numeric($request->your_phone)==false){
            $request->session()->flash('message', 'Phone Number Can not be charector!');
            return back();
        }
        if(session('phone')){
            return redirect()->to('dashboard');
        }else{
            $data = DB::table('registers')
            ->where('phone_number', $request->your_phone)
            ->select('phone_number', 'password')
            ->get();
            foreach($data as $number){
                $number=$number->phone_number;
            }
            if($number){
                if (Hash::check($request->your_pass, $data[0]->password)) {
                    $request->session()->put('phone',$request->your_phone);
                    return redirect()->to('dashboard');
                }else{
                    $request->session()->flash('message', 'Number And password Not Match');
                    return back();
                }
            }else{
                $request->session()->flash('message', 'Number And password Not Match');
                    return back();
            }
            
        }
        
    }
    public function logged(Request $request)
    {
        if(session('phone')){
            return redirect()->to('dashboard');
        }else{
            return view('login');
        }
        
    }

    //end login section
    public function profile(Request $request)
    {
        if(session('phone')){
            $data = DB::table('registers')
            ->where('phone_number', session('phone'))
            ->get();
            return view('dashboard',compact('data'));
        }else{
            return redirect()->to('login');
        }
        
    }
    //end profile section
    public function logout(Request $request)
    {
        $request->session()->forget('phone');
        return redirect()->to('login');
    }
}
