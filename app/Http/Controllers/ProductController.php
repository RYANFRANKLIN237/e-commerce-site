<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $products;

    public function __construct(){
        $this->products = new Product();
    }

    public function index()
    {
        $products = $this->products->all();
        $categories = Category::pluck('name','id');

        return view('pages.products.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'productname' => 'required',
            'cat_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', //allow enxtension types for images and size of image
        ]);

        //check if file was uploaded successfully
        if($request->hasFile('photo')){
           $filename = time().$request->file('photo')->getClientOriginalName();
           $request->file('photo')->move(public_path('images'),$filename);
              $validateData['photo'] = $filename;

        }

        Product::create($validateData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
