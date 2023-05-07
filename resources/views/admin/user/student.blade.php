<x-backend.layout.master>

      @slot('title')
    teacher
    @endslot
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Teacher List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">TeacherList</li>
        </ol>
      <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Add Teacher</a>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
         <x-backend.alertmessage.alertmessage type="success"/>
<table class="table table-bordered border-primary">
   <thead>
                <tr>
                    <th>SL No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Book Edition</th>
                    <th>Book Quantity</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created Data</th>
                    <th>Action</th>
                </tr>
            </thead>
             <tbody>
                @foreach ($books as $book)
                    
               
               <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->booktitle }}</td>
                    <td>{{ $book->bookauthor }}</td>
                    <td>{{ $book->bookedition }}</td>
                    <td>{{ $book->bookquantity }}</td>
                    <td>{{ $book->categories->title }}</td>
                    <td class="text-center"><img src="{{ asset('storage/books').'/'.$book->bookimage }}" alt="hhh" class="img-fluid" style="width:100px;height:100px"></td>
                    <td>{{ $book->status?'Active':'In Active' }}</td>
                    <td>{{ $book->created_at }}</td>
                     
                    

                    
                    <td>
                        <div class="d-flex ">
                            <x-backend.buttonlink.viewlink  action="{{ route('books.show',['book'=>$book->id ])}}"/>
                            <x-backend.buttonlink.editlink action="{{ route('books.edit',['book'=>$book->id ])}}"/>
                            <x-backend.buttonlink.deletelink action="{{ route('books.destroy',['book'=>$book->id ])}}"/>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
</table>



      
       
    </section>

  </main><!-- End #main -->







 
<div class="modal fade" id="BookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white center">
           Add New Book
          <button type="button" class="btn-close btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
             <form class="row g-3" role="form" action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              
                 
                 <br>
                

                 <x-backend.alertmessage.alertmessage type="success"/> 
                
                <select name="category" id="" class="form-select" aria-label="Default select example">
                    <option value="">Select Chategory</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
               
                <div class="col-md-6">
                    <x-frontend.form.input name="booktitle" text="Book Tile" type="text" :value="old('booktitle')" />
               </div>
                <div class="col-md-6">
                    <x-frontend.form.input name="bookauthor" text="Book Author" type="text" :value="old('bookauthor')" />
               </div>
                <div class="col-md-6">
                    <x-frontend.form.input name="bookedition" text="Book Edition" type="text" :value="old('bookedition')" />
               </div>
                <div class="col-md-6">
                    <x-frontend.form.input name="bookquantity" text="Book Quantity" type="number" :value="old('bookquantity')" />
               </div>
              
                
                  <div class="col-md-12">
                    <x-frontend.form.input name="bookimage" text="Book Image" type="file"/>
                  </div>
                  
               <div class="form-check">
                <input name="is_active" class="form-check-input" type="checkbox" value="1" id="isActiveInput" checked>
                <label class="form-check-label" for="isActiveInput">
                    Is Active
                </label>
            </div>
                
    
                  
             <div class="card-footer bg-white">
                <div class="d-grid gap-2 col-6 mx-auto d-flex">
                    <button type="submit" class="btn btn-success w-50 btn-sm" type="button">Save <i class="fa-solid fa-paper-plane"></i></button>
                     <a href="{{ route('books.index') }}"><button class="btn btn-danger btn-sm" type="button">Cancel</button></a>
                  </div>
          </div> 
        </form> 
      </div>
    </div>
  </div>
  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  </script>
  <script>
    $(document).ready(function(){
        $(document).on('click','.add_category',function(e){
            e.preventDefualt();
            let title=$('#title').val();
            let description=$('#description').val();
            console.log(title+description);
        })
    })
  </script>
</x-backend.layout.master>