<?php

namespace App\Http\Controllers;

use App\Models\AllItem;
use App\Models\Category;
use App\Models\ItemCategory;
use App\Models\MegaDeal;
use App\Models\Mobile;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showHomePage(){
        $categories = Category::with('subcategory')->get();
        $ca = DB::table('categories')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $cates = Category::with('subcategory')->limit(5)->get()->toArray();
        $num = 1;
        $megadeals = MegaDeal::limit(6)->get()->toArray();

        $founditems = [];
        foreach ($megadeals as $megadeal){
            $allitem = AllItem::with('subcategory')->where('allitem_id','=',$megadeal['allitem'])->get()->toArray()[0];
            if (file_exists(app_path().'\Models\\' . ucfirst($allitem['subcategory']['name']).'.php')){
                $filename = 'App\Models\\' . ucfirst($allitem['subcategory']['name']);
                $item = $filename::where('allitem','=',$megadeal['allitem'])->get()->toArray()[0];
                array_push( $founditems , $item);
            }else{
                include(app_path().'\Models\\' . ucfirst($allitem['subcategory']['name']).'.php');
                $filename = 'App\Models\\' . ucfirst($allitem['subcategory']['name']);
                $item = $filename::where('allitem','=',$megadeal['allitem'])->get()->toArray()[0];
                array_push( $founditems, $item );
            }
        }

        $data = compact('categories', 'subcategories', 'cates', 'num','megadeals','founditems','ca');
        return view('home')->with($data);
    }

    public function showCategoryPage(Request $request){
        $categories = Category::with('subcategory')->get()->toArray();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $subcates = Category::with('subcategory')->where('name','=',$request['cat_id'])->get()->toArray();

        $allitems = [];
        foreach ($subcates[0]['subcategory'] as $subcategory){
            if (!class_exists(ucfirst($subcategory['name']))){
                if (!file_exists(app_path().'\Models\\' . ucfirst($subcategory['name']).'.php')){
                    $error = 'no data found';
                }else{
                    include(app_path().'\Models\\' . ucfirst($subcategory['name']).'.php');
                    $filename = 'App\Models\\' . ucfirst($subcategory['name']);
                    array_push($allitems, [ucfirst($subcategory['name']) => $filename::limit(5)->get()->toArray()]);
                }
            }else{
                array_push($allitems, [ucfirst($subcategory['name']) => ucfirst($subcategory['name'])::limit(5)->get()->toArray()]);
            }

            // echo '<pre>';
            // print_r($allitems[0][ucfirst($subcategory['name'])]);
            // echo '</pre>';
            // die;
        }


        $data = compact('categories', 'subcategories', 'subcates', 'allitems');
        return view('category')->with($data);
    }

    public function showSubCategoryPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $subcategory = SubCategory::with('category')->where('name','=',$request['subcat_id'])->get()->toArray()[0];
        if (ucfirst($request['subcat_id']) == 'Mobile'){

            $itemcategory = [
                'brand' => DB::table('brands')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'rating' => DB::table('ratings')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'ram' => DB::table('rams')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'storage' => DB::table('storages')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'battery' => DB::table('batterys')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'screen' => DB::table('screens')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'processor' => DB::table('processors')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'camera' => DB::table('cameras')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
            ];
            $items = Mobile::paginate(10)->toArray();
            $num = Mobile::count();
        }

        $data = compact('categories','subcategories','itemcategory','items','subcategory','num','itemcategories');
        return view('subCategory')->with($data);
    }

    public function showItemPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $singleitem = Mobile::where('name','=',$request['item_id'])->get()->toArray();
        $subcategory = SubCategory::with('category')->where('name','=',$request['subcat_id'])->get()->toArray()[0];
        $data = compact('categories', 'subcategories','singleitem','subcategory');
        return view('itemPage')->with($data);
    }

    public function showSearchPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $category = Category::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $subcategory = SubCategory::with('category')->where('name','like','%'.$request['search'].'%')->get()->toArray();
        $allitems = AllItem::where('name','like','%'.$request['search'].'%')->get()->toArray();

        $data = compact('categories','category','subcategory','allitems');
        return view('searchpage')->with($data);
    }

    public function iCategory(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $subcategory = SubCategory::with('category')->where('name','=',$request['subcat_id'])->get()->toArray()[0];
        if ($request['subcat_id'] == 'Mobile'){

            $itemcategory = [
                'brand' => DB::table('brands')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'rating' => DB::table('ratings')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'ram' => DB::table('rams')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'storage' => DB::table('storages')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'battery' => DB::table('batterys')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'screen' => DB::table('screens')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'processor' => DB::table('processors')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
                'camera' => DB::table('cameras')->where('subcategory','=',$subcategory['subcategory_id'])->get()->toArray(),
            ];
            $items = Mobile::where($request['itemcategory'],'=',$request['icategory'])->paginate(10)->toArray();
            $num = Mobile::where($request['itemcategory'],'=',$request['icategory'])->count();
        }

        $data = compact('categories','subcategories','itemcategory','items','subcategory','num','itemcategories');
        return view('subCategory')->with($data);
    }
}
