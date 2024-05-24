<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function showAllSessions(){
        $sessions = session()->all();
        echo '<pre>';
        print_r($sessions);
        echo '</pre>';
    }

    public function destroySession(Request $request){
        if (session('usertype') == 'admin'){
            Admin::where('username','=',session('username'))->update([
                'status' => 0
            ]);
        }elseif (session('usertype') == 'buyer'){
            Buyer::where('username','=',session('username'))->update([
                'status' => 0
            ]);
        }else{
            Seller::where('username','=',session('username'))->update([
                'status' => 0
            ]);
        }
        $request->session()->forget(['username','usertype','user_id']);
        return redirect('/login');
    }
}
