<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AllUser;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Seller;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginPage(){
        $categories = Category::with('subcategory')->get();
        $error = '';
        $subcategories = SubCategory::with('category')->get()->toArray();
        $data = compact('categories', 'subcategories','error');
        return view('login_page')->with($data);
    }

    public function showRegisterPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $error = '';
        $data = compact('categories', 'subcategories', 'error');
        return view('register')->with($data);
    }

    public function showRegisterUserPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $data = compact('categories', 'subcategories');
        return view('admin.newUser')->with($data);
    }

    public function authenticateUser(Request $request){
        $request->validate(
            [
                "username" => 'required',
                "password" => 'required'
            ]
            );

        if (!empty(AllUser::where('username', '=', $request['username'])->get()->toArray()[0])){
            if (sha1($request['password']) == AllUser::where('username','=',$request['username'])->select('password')->get()->toArray()[0]['password']){
                if (AllUser::where('username','=',$request['username'])->select('usertype')->get()->toArray()[0]['usertype'] == 'admin'){
                    session()->put('usertype','admin');
                    session()->put('username',$request['username']);
                    // session()->put('user_id',Admin::where('username','=',$request['username'])->get('admin_id')->toArray()[0]['admin_id']);
                    // Admin::where('username','=',$request['username'])->update(['status' => 1]);
                }elseif (AllUser::where('username','=',$request['username'])->select('usertype')->get()->toArray()[0]['usertype'] == 'buyer'){
                    session()->put('usertype','buyer');
                    session()->put('username',$request['username']);
                    session()->put('user_id',Buyer::where('username','=',$request['username'])->get('buyer_id')->toArray()[0]['buyer_id']);
                    Buyer::where('username','=',$request['username'])->update(['status' => 1]);
                }else{
                    session()->put('usertype','seller');
                    session()->put('username',$request['username']);
                    session()->put('user_id',Seller::where('username','=',$request['username'])->get('seller_id')->toArray()[0]['seller_id']);
                    Seller::where('username','=',$request['username'])->update(['status' => 1]);
                }
                return redirect('/');
            }else{
                $error = "Password is incorrect";
                $data = compact('error');
                return redirect()->back()->with($data);
            }
        }else{
            $error = "Username not found";
            $data = compact('error');
            return redirect()->back()->with($data);
        }
    }

    public function createNewUser(Request $request){
        AllUser::create([
            'name' =>  $request['fullname'],
            'username' => $request['username'],
            'password' => sha1($request['password']),
            'usertype' => $request['usertype']
        ]);


        if ($request['usertype'] == 'buyer'){
            Buyer::create([
                'name' => $request['fullname'],
                'alluser' => AllUser::where('name','=',$request['fullname'])->get('alluserid')->toArray()[0][ 'alluserid'] ,
                'gender' => $request['gender'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => sha1($request['password']),
                'city' => $request['city'],
                'address' => $request['address']
            ]);
        }else {
            Seller::create([
                'name' => $request['fullname'],
                'alluser' => AllUser::where('name','=',$request['fullname'])->get('alluserid')->toArray()[0][ 'alluserid'] ,
                'gender' => $request['gender'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => sha1($request['password']),
                'city' => $request['city'],
                'address' => $request['address']
            ]);
        }

        return redirect('/');
    }

    public function makeNewUser(Request $request){
        AllUser::create([
            'name' =>  $request['name'],
            'username' => $request['username'],
            'password' => sha1($request['password']),
            'usertype' => $request['usertype']
        ]);

        if ($request['usertype' == 'buyer']){
            Buyer::create([
                'name' => $request['name'],
                'alluserid' => $request['alluser_id'],
                'gender' => $request['gender'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => sha1($request['password']),
                'city' => $request['city'],
                'address' => $request['address']
            ]);
        }elseif ($$request['usertype' == 'admin']){
            Admin::create([
                'name' => $request['name'],
                'alluserid' => $request['alluser_id'],
                'gender' => $request['gender'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => sha1($request['password']),
                'city' => $request['city'],
                'address' => $request['address']
            ]);
        }else {
            Seller::create([
                'name' => $request['name'],
                'alluserid' => $request['alluser_id'],
                'gender' => $request['gender'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' => sha1($request['password']),
                'city' => $request['city'],
                'address' => $request['address']
            ]);
        }

        return redirect('/');
    }
}
