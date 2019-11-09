<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\user\product;
use App\Models\user\category;
use App\Models\user\tag;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $posts = product::all();
        return view('admin.product.show',compact('posts'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          if (Auth::user()->can('products.create')) {
             //$tags =tag::all();
            $categories =category::all();
       return view('admin.product.product',compact('categories'));
            }
             return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$validator = Validator::make($Request->all(), [

          $this->Validate($request, [
                    'title' => 'required',
                    //'price' => 'required',
                    //'shortdescription' => 'required',
                    'slug' => 'required',
                    'description' => 'required',
                    //'maincategory' => 'required|not_in:0',
                    //'subcategory' => 'required|not_in:0',
                    //'offer' => 'required|not_in:0 ',
                    //'country' => 'required ',
                    //'MetaTitle' => 'required ',
                    //'MetaDescription' => 'required ',
                    //'MetaKeyword' => 'required ',
            //        'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
                   // 'file-zip' => 'required|file|mimes:zip',
        ]);
 if ($request->hasFile('image')) {
                $image = $request->file('image');
                $destinationPath = public_path('productimage');
            $imageName = $request->image->store('backend/public/productimage');
            $image->move($destinationPath, $imageName);
        }else{
            return 'No';
        }
        $post =new product;
        $post->image = $imageName;
        $post->status = $request->status;
        $post->title= ['en' => $request->title];
        $post->subtitle=['en' => $request->subtitle];
        $post->slug=$request->slug;
        $post->body=['en' => $request->description];
        $post->product_price = $request->productprice;
         $post->save();
         //$post->tags()->sync($request->tags);
        // $post->categories()->sync($request->categories);
         //return redirect(route('product.index'));
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (Auth::user()->can('products.update')) {
           

         }
            return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id',$id)->delete();
        return redirect()->back()->with('message','product Deleted Successfully');
    }
}
