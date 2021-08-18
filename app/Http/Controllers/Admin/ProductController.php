<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); // listado
    }
    
    public function create(){
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories')); //formulario de regitro
    }

    public function store(Request $request){
    	//validar
    	$messages = [
    		'name.required' => 'Es necesario ingresar el nombre de producto.',
    		'name.min' => 'El nombre del producto debe tener como minimo 3 caracteres.',
    		'description.required' => 'Es necesario agregar la descripcion corta.',
    		'description.max' => 'El maximo de caracteres permitido para la descripcion corta es de 200.',
    		'price.required' => 'Es necesario agregar el precio de este producto.',
    		'price.numeric' => 'Los valores agregados en el campo de precio deben de ser numericos.',
    		'price.min' => 'No se admiten numeros negativos en el precio',
    	];

    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	
    	$this->validate($request,$rules,$messages);
    	//registrar producto

    	// dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;

    	$product->save();//insert

    	return redirect('/admin/products');
    }

    //
    public function edit($id){
    	$categories = Category::orderBy('name')->get();
    	///
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product', 'categories')); //formulario de regitro
    }

    public function update(Request $request, $id){
    	//validar
    	$messages = [
    		'name.required' => 'Es necesario ingresar el nombre de producto.',
    		'name.min' => 'El nombre del producto debe tener como minimo 3 caracteres.',
    		'description.required' => 'Es necesario agregar la descripcion corta.',
    		'description.max' => 'El maximo de caracteres permitido para la descripcion corta es de 200.',
    		'price.required' => 'Es necesario agregar el precio de este producto.',
    		'price.numeric' => 'Los valores agregados en el campo de precio deben de ser numericos.',
    		'price.min' => 'No se admiten numeros negativos en el precio',
    	];

    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	
    	$this->validate($request,$rules,$messages);
    	//registrar producto

    	// dd($request->all());
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;

    	$product->save();//update

    	return redirect('/admin/products');
    }

    public function destroy($id){

    	$product = Product::find($id);
    	$product->delete();

    	return back();
    }
}
