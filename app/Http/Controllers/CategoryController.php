<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function allcat(){
        //الطريقة دي بتجيب كل اللي في الداتا بيز ولكن من اخر حاجه انضافت
        $cats = Category::latest()->paginate(3);
        $tarshCats = Category::onlyTrashed()->latest()->paginate(3);
        //by using QB
        // $cats = DB::table('categories')->latest()->get();
        //relation by using QB
        // $cats = DB::table('categories')
        //        ->join('users', 'users.id', 'categories.user_id')
        //        ->select('categories.*', 'users.name')
        //        ->latest()->paginate(3);

        return view('admin.category.index ',compact('cats', 'tarshCats'));
    }
    public function addCat(Request $request){
       $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:255',

       ],
       [
           //if iwant change the default message
        'category_name.required' => 'please Input Ctegory Name',
       ]);

       Category::insert([
           'category_name' => $request->category_name,
           'user_id' => Auth::user()->id,
           'created_at' => Carbon::now(),
       ]);
    //    another method by using orm also
    //    $category = new Category;
    //    $category->category_name = $request->category_name;
    //    $category->user_id = Auth::user()->id;
    //    $category->save();
    //By using quiry builder
    // $data = array();
    // $data['category_name'] = $request->category_name;
    // $data['user_id'] = Auth::user()->id;
    // DB::table('categories')->insert($data);
    return Redirect()->back()->with('success', 'Category Inserted Successfully');

   }
  public function editCat($id){
    //   $categories = Category::find($id);
    //by QB
    $categories = DB::table('categories')->where('id', $id)->first();
      return view('admin.category.edit', compact('categories'));

  }
  public function update(Request $request, $id){
    //  $update = Category::find($id)->update([
    //     'category_name' => $request->category_name,

    //  ]);
    $data = array();
    $data['category_name'] = $request->category_name;
    $data['user_id'] = Auth::user()->id;
    DB::table('categories')->where('id', $id)->update($data);
     return Redirect()->route('all.category')->with('success', 'Category Inserted Successfully');


  }
public function delete($id)
{
    $deleted = Category::find($id)->delete();
    return Redirect()->back()->with('success', 'Category Deleted Successfully');

}
public function restore($id)
{
    $deleted = Category::withTrashed()->find($id)->restore();
    return Redirect()->back()->with('success', 'Category restored Successfully');

}
public function forceDelete($id)
{
    $deleted = Category::withTrashed()->find($id)->forceDelete();
    return Redirect()->back()->with('success', 'Category permanently deleted Successfully');

}






}
