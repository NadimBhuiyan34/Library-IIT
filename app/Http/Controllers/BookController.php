<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();

        
        $books = Product::latest()->paginate(2);
        return view('admin.book.index', compact('books','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        
        
    if($file=$request->file('bookimage')){
        $filename=date('dmY').time().'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/books'),$filename);
    }

    Product::create([
        'booktitle'=>$request->booktitle,
        'bookauthor'=>$request->bookauthor,
        'bookedition'=>$request->bookedition,
        'bookquantity'=>$request->bookquantity,
        'status' => $request->is_active ?? false,
        'bookimage'=>$filename??'',
        'category_id'=>$request->category,
    ]
   );
   return redirect()->route('books.index')->withMessage('New book successfully added')->withType('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
     $productshow=Product::findOrFail($id);
     return view('backend.products.show',compact('productshow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productedit=Product::findOrFail($id);
     return view('backend.products.edit',compact('productedit'));
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

    if($file=$request->file('bookimage')){
        $filename=date('dmY').time().'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/products'),$filename);
        $productupdate=Product::findOrFail($id);
        $productupdate->update([
  
            'booktitle'=>$request->booktitle,
            'bookauthor'=>$request->bookauthor,
            'bookedition'=>$request->bookedition,
            'bookquantity'=>$request->bookquantity,
            'price'=>$request->price,
            'status' => $request->is_active ?? false,
            'bookimage'=>$filename??'',
            'category_id'=>$request->category??'2',
         ]
         );
         return redirect()->route('products.index')->withMessage('Successfully updated');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id)->delete();
      return redirect()->route('products.index')->withMessage('Successfully Data Deleted')->withType('delete');
    }
}
