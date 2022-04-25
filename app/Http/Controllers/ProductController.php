<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;
    CONST CATEGORIES = [
        ['id' => '1', 'name' => 'Electronics'],
        ['id' => '2', 'name' => 'Books'],
        ['id' => '3', 'name' => 'Clothes'],
        ['id' => '4', 'name' => 'Sports'],
        ['id' => '5', 'name' => 'Others'],
        ['id' => '2', 'name' => 'Books']
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
        /*
           $this->middleware('auth');

           $this->middleware('auth')->only([
               'index', 'show'
           ]);*/

        /* $this->middleware('auth')->except(
             ['index', 'show']
         );*/
    }

    public function index()
    {
        $products = Product::paginate(10);
        $totalproducts = count( Product::all() );

        return view('admin.pages.products.index', compact('products', 'totalproducts'));
    }

    public function create()
    {
        $categories = self::CATEGORIES;

        return view('admin.pages.products.create', compact('categories'));
    }

    public function store(StoreUpdateProductRequest $request)
    {
       /* $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'required|image'
        ]);*/

        /*dd($request->only(['name', 'description']));
        dd($request->name();
        dd($request->input('teste','default');
        dd($request->except('_token', 'name'));*/

        if($request->file('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            //$destinationPath = public_path('/images');
           // $image->move($destinationPath, $name);
            $image->storeAs('products', $name);
            print "<img class='small' heigth='300' width='300' src=".env('APP_URL').'/storage/products/'.$name.">";
        }else{
            dd('Nenhuma imagem foi selecionada');
        }

    }

    public function show(Product $product)
    {
        return view('admin.pages.products.show', compact('product'));
    }

    public function edit($id)
    {
        $categories = self::CATEGORIES;
        return view('admin.pages.products.edit', compact('id', 'categories'));
    }

    public function update(Request $request, $id)
    {
        dd("Updating...", $id);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
