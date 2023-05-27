<x-backend.layout.master>

      @slot('title')
    reissue-book
    @endslot
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>ReIssue Book List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">ReIssueBook</li>
        </ol>

      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
         <x-backend.alertmessage.alertmessage type="success"/>
	 <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Name</th>
                    <th scope="col">Approved Id</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($book_request as $book)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->product->booktitle }}</td>
                    <td>{{$book->product->bookauthor}}</td>
                    <td>{{ $book->users->name }}</td>
                    <td>{{ $book->approved_id }} </td>
                    <td>{{ $book->return_date}} </td>
                    <td>
                      @if($book->status!='return' && $book->reissue == 'reissue')
                      <a href="{{ route('reissue.book.reissue',['id'=>$book->id]) }}" class="btn btn-success btn-sm">Reissue</a>
                    @endif
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
            e.preventDefault();
            let title=$('#title').val();
            let description=$('#description').val();
            console.log(title+description);
        })
    })
  </script>
</x-backend.layout.master>
