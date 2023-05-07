 
 <x-frontend.layout.master>
	<x-slot name="title">Library</x-slot>
	   <!-- ======= Hero Section ======= -->
  <section class="mt-5">
	<div class="container">
		<div class="row ">
               <div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4 border-left-danger">
				<div class="card-body">Total Requested Book </div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		 </div>
               <div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4 border-left-danger">
				<div class="card-body">Total Requested Book </div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		 </div>
               <div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4 border-left-danger">
				<div class="card-body">Total Requested Book </div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		 </div>
               <div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4 border-left-danger">
				<div class="card-body">Total Requested Book </div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-dark">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		 </div>
		{{-- row --}}
		</div>
			
	</div>
  </section>
	  

    <div class="section">
       

 


 
 
 

 

              <!-- Table with stripped rows -->
             <div class="">
				 <x-backend.alertmessage.alertmessage type="success"/>
				 <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Book Author</th>
                                  <th scope="col">Fine</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Approved Id</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($book_request as $book)
                  <tr>
                    <th scope="row">1</th>
                    <td>{{ $book->product->booktitle }}</td>
                    <td>{{$book->product->bookauthor}}</td>
                  
                    <td>{{ $book->fine }}</td>
                    <td>{{ $book->return_date }}</td>
                    <td><span class="badge rounded-pill bg-primary">{{ $book->status }} </span></td>
                    <td>{{ $book->approved_id }}</td>
                    <td>
                      @if ($book->status=="request" || $book->status=="approved")
                         <a href="{{ route('request.destroy',['id'=>$book->id,'book_id'=>$book->book_id]) }}" class="btn btn-danger btn-sm">Cancel</a>

                      
                       @elseif (is_null($book->fine) || $book->fine==0 && $book->reissue==null)
                       
                            <a href="{{ route('user.reissue',['id'=>$book->id]) }}" class="btn btn-primary btn-sm">ReIssue</a>

                     
                        @elseif($book->reissue=='reissue')
                                 <span class="badge rounded-pill bg-success">{{ $book->reissue }}  </span>
                        @else
                            <a href="" class="btn btn-primary btn-sm disabled">ReIssue</a>
                           
                      @endif

                       
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
			 </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </div>

 
 

 <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</x-frontend.layout.master>
