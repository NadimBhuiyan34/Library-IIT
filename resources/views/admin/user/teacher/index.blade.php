<x-backend.layout.master>

      @slot('title')
    teacher-list
    @endslot
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Teacher List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">TeacherList</li>
        </ol>
        
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
         <x-backend.alertmessage.alertmessage type="success"/>
	 <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user_teacher as $teacher)
                  <tr>
                    <th scope="row">1</th>
                    <td>{{ $teacher->name }}</td>
                    <td>{{$teacher->email}}</td>
                  
                    <td>{{ $teacher->profile->mobile }}</td>
                    
                    <td class="text-center"> <img src="{{asset('storage/profiles/'.$teacher->profile->image)}}" alt="profile"style="border-radius: 50%;width:50px;height:50px;" class="img-fluid"/></td>
                    <td>{{ $teacher->status }} </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('teachers.edit',['teacher'=>$teacher->id]) }}" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{ route('teachers.show',['teacher'=>$teacher->id]) }}" class="btn btn-primary btn-sm">Show</a>
                         <form action="{{ route('teachers.destroy',['teacher'=>$teacher->id]) }}">
                              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                         </form>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>



      
       
    </section>

  </main><!-- End #main -->







  
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