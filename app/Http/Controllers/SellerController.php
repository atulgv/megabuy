<?php

namespace App\Http\Controllers;

use App\Models\AllItem;
use App\Models\Category;
use App\Models\Mobile;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function showSellerItemData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $selleritems = AllItem::where('seller','=',session('user_id'))->get()->toArray();
        $data = compact('categories', 'subcategories','selleritems');
        return view('seller.selleritems')->with($data);
    }

    public function showIData(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $subcategory = $request['subcategory'];
        include(app_path().'\Models\\' . ucfirst($request['subcategory']).'.php');
        $filename = 'App\Models\\' . ucfirst($request['subcategory']);
        $selleritems = $filename::where('seller','=',session('user_id'))->get()->toArray();
        if (ucfirst($request['subcategory']) == 'Mobile'){
            $fields = [
                1 => 'mobile_id',
                2 => 'name',
                3 => 'brand',
                4 => 'model',
                5 => 'rating',
                6 => 'ram',
                7 => 'storage',
                8 => 'battery',
                9 => 'screen',
                10 => 'processor',
                11 => 'rearcamera',
                12 => 'frontcamera',
                13 => 'price',
                14 => 'discount',
                15 => 'quantity',
                16 => 'description'
            ];
        }

        $data = compact('categories', 'subcategories','selleritems','fields','subcategory');
        return view('seller.sellercategoryitems')->with($data);
    }

    public function showFullView(Request $request){

    }

    public function showSellNewItemPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $data = compact('categories', 'subcategories');
        return view('seller.newitem')->with($data);
    }

    public function chooseSubCategory(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $subcat = SubCategory::where('subcategory_id','=',$request['subcategory'])->get()->toArray()[0];
        // echo '<pre>';
        // print_r($subcat);
        // echo '</pre>';die;
        if (ucfirst($subcat['name']) == 'Mobile'){
            $fields = [
                1 => 'name',
                2 => 'brand',
                3 => 'model',
                4 => 'rating',
                5 => 'ram',
                6 => 'storage',
                7 => 'battery',
                8 => 'screen',
                9 => 'processor',
                10 => 'rearcamera',
                11 => 'frontcamera',
                12 => 'price',
                13 => 'discount',
                14 => 'quantity',
                15 => 'imageone',
                16 => 'imagetwo',
                17 => 'imagethree',
                18 => 'description'
            ];
        }

        $data = compact('categories', 'subcategories','fields', 'subcat');
        return view('seller.enterSellingItem')->with($data);
    }

    public function registerItem(Request $request){
        if (empty($request->file('imageone'))){
            $path1 = 'noImg.jpg';
        }else{
            $fileNameOne = time().'1-megabuy.'. $request->file('imageone')->getClientOriginalExtension();
            $path1 = $request->file('imageone')->storeAs('uploads',$fileNameOne, 'public');
        }
        if (empty($request->file('imagetwo'))){
            $path2 = 'noImg.jpg';
        }else{
            $fileNameTwo = time().'2-megabuy.'. $request->file('imagetwo')->getClientOriginalExtension();
            $path2 = $request->file('imagetwo')->storeAs('uploads',$fileNameTwo, 'public');
        }
        if (empty($request->file('imagethree'))){
            $path3 = 'noImg.jpg';
        }else{
            $fileNameThree = time().'3-megabuy.'. $request->file('imagethree')->getClientOriginalExtension();
            $path3 = $request->file('imagethree')->storeAs('uploads',$fileNameThree, 'public');
        }

        AllItem::create([
            "name" => $request['name'],
            "price" => $request['price'] ,
            "category" => 1,
            "subcategory" => 1,
            "discount" =>  $request['discount'],
            "seller" => session('user_id'),
            "quantity" => $request['quantity'],
            'imageone' => '/storage/'.$path1,
            'imagetwo' => '/storage/'.$path2,
            'imagethree' => '/storage/'.$path3
        ]);

        Mobile::create([
            "name" => $request['name'],
            "allitem" => AllItem::where('name','=',$request['name'])->get()->toArray()[0]['allitem_id'],
            "seller" => session('user_id'),
            "brand" => $request['brand'],
            "model" => $request['model'],
            'rating' => $request['rating'],
            'ram' => $request['ram'],
            'storage' => $request['storage'],
            'battery' => $request['battery'],
            'screen' => $request['screen'],
            'processor' => $request['processor'],
            'rearcamera' => $request['rearcamera'],
            'frontcamera' => $request['frontcamera'],
            "price" => $request['price'] ,
            "discount" =>  $request['discount'],
            'quantity' => $request['quantity'],
            'imageone' => '/storage/'.$path1,
            'imagetwo' => '/storage/'.$path2,
            'imagethree' => '/storage/'.$path3,
            'description' => $request['description']
        ]);

        return redirect('/showselleritemdata');
    }
}
