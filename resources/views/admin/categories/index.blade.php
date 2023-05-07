<x-backend.layout.master>

      @slot('title')
    Category
    @endslot
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Catogory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">CategoryList</li>
        </ol>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#CateoryModal">
  Add Cateory
</button>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
         <x-backend.alertmessage.alertmessage type="success"/>
<table class="table table-bordered border-primary">
   <thead>
                <tr>
                    <th>SL No</th>
                    <th>Category Title</th>
                    <th>Category description</th>
                    <th>Route link</th>
                    <th>Is_active</th>
                    <th>Action</th>
                </tr>
            </thead>
             <tbody>
                @foreach ($categories as $category)
                    
               
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->title}}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->route }}</td>
                    <td>{{ $category->is_active ? 'Active' : 'In Active'  }}</td>
                    <td>
                        <div class="d-flex">
       
                            <x-backend.buttonlink.editlink action="{{ route('categories.edit', ['category' => $category->id]) }}"/>
                           
                            <form method="post" action="{{ route('categories.destroy', ['category' => $category->id]) }}" style="display:inline">
                                @csrf
                                @method('delete')
                                <x-backend.buttonlink.deletelink color="danger" onclick="return confirm('Are you sure want to delete?')" text="Delete" />
                            </form>

                        </div>
                        
                
                        

                    </td>
                </tr>
                @endforeach
            </tbody>
</table>



      
       
    </section>

  </main><!-- End #main -->







 
<div class="modal fade" id="CateoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white center">
           New Category Add
          <button type="button" class="btn-close btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" role="form" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                 
                 <br>

                
                <div class="col-md-12">
                <x-frontend.form.input name="title" text="Category Title" type="text" :value="old('title')"/>
               </div>
                <div class="col-md-12">
                <x-frontend.form.input name="description" text="Category Description" type="textarea" :value="old('description')"/>
               </div>
            
               <div class="form-check">
                <input name="is_active" class="form-check-input" type="checkbox" value="1" id="isActiveInput" checked>
                <label class="form-check-label" for="isActiveInput">
                    Is Active
                </label>
            </div>
               
         
        </div>
        <div class="modal-footer shadow">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-success m-auto w-50 add_category btn-sm" type="button">ADD <i class="fa-solid fa-paper-plane"></i></button>
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