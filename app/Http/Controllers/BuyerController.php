<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Mobile;
use App\Models\SubCategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function showWishlistPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $wishlistitems = Wishlist::where('buyer','=',session('user_id'))->paginate(10)->toArray();
        $witems = [];
        foreach ($wishlistitems as $it){
            $item = Mobile::where('allitem','=',$wishlistitems['allitem'])->get()->toArray()[0];
            array_push($items,$item);
        }
        $data = compact('categories', 'subcategories','wishlistitems','witems');
        return view('buyer.wishlist')->with($data);
    }

    public function addToWishlist(Request $request){
        if (empty(Wishlist::where(['allitem','=',$request['allitemid']]))){
            Wishlist::create([
                "allitem" => $request['allitem_id'],
                "buyer" => session('user_id')
            ]);
        }
        return redirect()->back();
    }

    public function showCartPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $cartitems = Cart::where('buyer','=',session('user_id'))->paginate(10)->toArray();
        $data = compact('categories', 'subcategories');
        return view('buyer.cart')->with($data);
    }

    public function addToCart(Request $request){
        if (empty(Cart::find(['allitem' => $request['allitem_id']]))){
            Cart::create([
                "item" => $request['allitem_id'],
                "Buyer" => session('user_id')
            ]);
        }
        return redirect()->back();
    }

    public function categorySearch(Request $request) {
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $items = ucfirst($request['subcat_name'])::where($request['itemcategory'],'=',$request['id'])->get()->toArray()[0];

        $data = compact('categories', 'subcategories','items');
        return view('buyer.categorysearch')->with($data);
    }
}
