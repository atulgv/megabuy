<?php

namespace App\Http\Controllers;

use Schema;
use App\Models\Admin;
use App\Models\AllItem;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\ItemCategory;
use App\Models\MegaDeal;
use App\Models\Seller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdminData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $admins = Admin::get()->toArray();
        $data = compact('categories', 'subcategories','admins','itemcategories');
        return view('admin.admindata')->with($data);
    }

    public function showBuyerData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $buyers = Buyer::get()->toArray();
        $data = compact('categories', 'subcategories','buyers','itemcategories');
        return view('admin.buyerData')->with($data);
    }

    public function showSellerData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $sellers = Seller::get()->toArray();
        $data = compact('categories', 'subcategories','sellers','itemcategories');
        return view('admin.sellerData')->with($data);
    }

    public function showItemData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $allitems = AllItem::get()->toArray();
        $data = compact('categories', 'subcategories','allitems','itemcategories');
        return view('admin.itemData')->with($data);
    }

    public function showCategoryData(){
        $categories = Category::with('subcategory')->get();
        $cats = Category::get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $data = compact('categories', 'subcategories','cats','itemcategories');
        return view('admin.categoryData')->with($data);
    }

    public function showSubCategoryData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $data = compact('categories', 'subcategories','itemcategories');
        return view('admin.subCategoryData')->with($data);
    }

    public function showItemCategoryData(){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();

        $data = compact('categories','itemcategories');
        return view('admin.itemCategoryData')->with($data);
    }

    public function itemCategoryData(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $itemcategory = ItemCategory::where('itemcategory_id','=',$request['itemcategoryid'])->get()->toArray()[0];
        $icategory = DB::table(strtolower($itemcategory['name']).'s')->get()->toArray();
        $data = compact('categories','itemcategories','icategory','itemcategory');
        return view('admin.iCategoryData')->with($data);
    }

    public function showCreateNewUserPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $data = compact('categories', 'subcategories');
        return view('admin.newUser')->with($data);
    }

    public function showCreateCategoryPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories =  ItemCategory::get()->toArray();
        $data = compact('categories', 'subcategories','itemcategories');
        return view('admin.newCategory')->with($data);
    }

    public function createNewCategory(Request $request){

        if (empty($request->file('imageone'))){
            $path1 = 'noImg.jpg';
        }else{
            $fileNameOne = time().'1-megabuy.'. $request->file('imageone')->getClientOriginalExtension();
            $path1 = $request->file('imageone')->storeAs('uploads',$fileNameOne,'public');
        }
        if (empty($request->file('imagetwo'))){
            $path2 = 'noImg.jpg';
        }else{
            $fileNameTwo = time().'2-megabuy.'. $request->file('imagetwo')->getClientOriginalExtension();
            $path2 = $request->file('imagetwo')->storeAs('uploads',$fileNameTwo,'public');
        }
        if (empty($request->file('imagethree'))){
            $path3 = 'noImg.jpg';
        }else{
            $fileNameThree = time().'3-megabuy.'. $request->file('imagethree')->getClientOriginalExtension();
            $path3 = $request->file('imagethree')->storeAs('uploads',$fileNameThree,'public');
        }
        Category::create([
            "name" => $request['category'],
            'imageOne' => '/storage/'.$path1,
            'imageTwo' => '/storage/'.$path2,
            'imageThree' => '/storage/'.$path3
        ]);

        return redirect('/showcategorydata');
    }

    public function showCreateSubCategoryPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories =  ItemCategory::get()->toArray();
        $data = compact('categories', 'subcategories','itemcategories');
        return view('admin.newSubCategory')->with($data);
    }

    public function createNewSubCategory(Request $request){

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

        SubCategory::create([
            'name' => $request['subcategory'],
            'category' => $request['category'],
            'imageone' => '/storage/'.$path1,
            'imagetwo' => '/storage/'.$path2,
            'imagethree' => '/storage/'.$path3
        ]);

        $number = DB::table('categories')->where('category_id','=', $request['category'])->get()->toArray()[0];
        DB::table('categories')->where('category_id','=', $request['category'])->update(
            [
                'numberOfSubCategory' => $number->numberOfSubCategory + 1
            ]
            );

        return redirect('/showsubcategorydata');
    }

    public function showCreateItemCategoryPage(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $data = compact('categories', 'subcategories','itemcategories');
        return view('admin.newItemCategory')->with($data);
    }

    public function createNewItemCategory(Request $request){
        ItemCategory::create([
            "name" => $request['itemcategory'],
        ]);

        Schema::create(strtolower($request['itemcategory'].'s'), function ($table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->unsignedBigInteger('itemcategory');
            $table->foreign('itemcategory')->references('itemcategory_id')->on('itemcategories')->cascadeOnDelete();
            $table->unsignedBigInteger('subcategory');
            $table->foreign('subcategory')->references('subcategory_id')->on('subcategories')->cascadeOnDelete();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        return redirect('/showitemcategorydata');

    }

    public function showCreateICategoryPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $itemcategory = $request['icategoryname'];
        $data = compact('categories', 'subcategories','itemcategories','itemcategory');
        return view('admin.newICategory')->with($data);
    }

    public function createNewICategory(Request $request){
        $itemcategory = ItemCategory::where('name','=',$request['icategoryname'])->get()->toArray()[0];
        $icategory = DB::table($request['icategoryname'].'s')->insert([
            'name' => $request['name'],
            'itemcategory' => $itemcategory['itemcategory_id'],
            'subcategory' => $request['subcategory']
        ]);

        return redirect('/icategorydata');
    }

    public function showMoveToMegadealPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $itemid = $request['allitem_id'];
        $data = compact('categories', 'subcategories','itemid','itemcategories');
        return view('admin.newMegadeal')->with($data);
    }

    public function moveToMegadeal(Request $request) {
        $item = AllItem::where('allitem_id','=',$request['allitem_id'])->get()->toArray()[0];
        if (empty(Megadeal::where('allitem','=',$request['allitem_id'])->get()->toArray())){
            MegaDeal::create([
                'allitem' => $request['allitem_id'],
                'price' => $item['price'],
                'discount' => $item['discount'],
                'megadealdiscount' => $request['megadealdiscount'],
                'dealtime' => $request['dealtime']
            ]);
        }
        return redirect()->back();
    }

    public function showMegadealData(){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $itemcategories = ItemCategory::get()->toArray();
        $megadeals = MegaDeal::get()->toArray();
        $data = compact('categories','subcategories','itemcategories','megadeals');
        return view('admin.megadealData')->with( $data );
    }
    public function removeFromMegadeal(Request $request) {
        MegaDeal::where('deal_id','=',$request['allitem_id'])->delete();

        return redirect()->back();
    }

    public function showEditCategoryPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $cat = Category::where('category_id','=','cat_id');
        $subcategories = SubCategory::with('category')->get()->toArray();
        $data = compact('categories', 'subcategories', 'cat');
        return view('admin.editCategory')->with($data);
    }

    public function updateCategory(Request $request){
        Category::find($request['cat_id'])->update([
            "name" => $request['category']
        ]);

        return redirect()->back();
    }

    public function showEditSubCategoryPage(Request $request){
        $categories = Category::with('subcategory')->get();
        $subcategories = SubCategory::with('category')->get()->toArray();
        $subcat = SubCategory::with('category')->where('subcategory_id','=',$request['subcat_id'])->toArray();
        $data = compact('categories', 'subcategories', 'subcat');
        return view('admin.editSubCategory')->with($data);
    }

    public function updateSubCategory(Request $request){
        SubCategory::with('category')->where('subcategory_id','=',$request['subcat_id'])->update([
            "name" => $request['subcategory'],
            'category' => $request['category']
        ]);
        return redirect()->back();
    }

    public function deleteCategory(Request $request){
        Category::where('category_id','=',$request['cat_id'])->delete();
        return redirect()->back();
    }

    public function deleteSubCategory(Request $request){
        SubCategory::where('subcategory_id','=',$request['subcat_id'] )->delete();
        return redirect()->back();
    }

    public function searchAdmins(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $admins = Admin::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $data = compact('admins','categories','itemcategories');
        return view('admin.adminData')->with($data);
    }

    public function searchBuyers(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $buyers = Buyer::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $data = compact('buyers','categories','itemcategories');
        return view('admin.buyerData')->with($data);
    }

    public function searchSellers(Request $request) {
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $sellers = Seller::where('name','like','%'.$request['search'].'%')->get()->toArray();

        $data = compact('sellers','categories','itemcategories');
        return view('admin.sellerData')->with($data);
    }

    public function searchCategories(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $cates = Category::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $data = compact('categories','itemcategories','cates');
        return view('admin.categoryData')->with($data);
    }

    public function searchSubCategories(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $subcategories = SubCategory::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $data = compact('subcategories','categories','itemcategories');
        return view('admin.subCategoryData')->with($data);
    }

    public function searchAllItems(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $allitems = AllItem::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $data = compact('allitems','categories','itemcategories');
        return view('admin.itemData')->with($data);
    }

    public function searchItemCategories(Request $request){
        $categories = Category::with('subcategory')->get();
        $itemcategories = ItemCategory::get()->toArray();
        $itemcates = ItemCategory::where('name','like','%'.$request['search'].'%')->get()->toArray();
        $data = compact('itemcategories','categories','itemcates');
        return view('admin.itemCategoryData')->with($data);
    }
}
