<x-backend.layout.master>
    @slot('title')
    Add Book
    @endslot
<div class="card mb-4 mt-3">
    <div class="card-header" style="background-color: #defffe">
        <i class="fas fa-table me-1"></i>
        Add Book
       <a href="{{ route('book.create') }}"> <button class="btn btn-outline-info btn-sm text-black">Add Request for Donate</button></a>
    </div>
   <x-backend.alertmessage.alertmessage type="success"/>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SL No</th>
                    <th>Book Title</th>
                    <th>Book Author</th>
                    <th>Book Edition</th>
                    <th>Approved Id</th>
                    <th>Fine</th>
                    <th>Applicant</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($getdonate as $sellbook)


                <tr>
                    <td>{{ $loop->iteration }}</td>
                  
                    <td>{{ $sellbook->product->booktitle }}</td>
                    <td>{{ $sellbook->product->bookauthor }}</td>
                    <td>{{ $sellbook->product->bookedition }}</td>
                    <td>{{ $sellbook->product->bookquantity }}</td>
                    <td>{{ $sellbook->approved_id }}</td>
                    <td>0</td>
                    <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Applicant Inormation
                      </button></td>
                     
                    <td class="d-flex">
                        <div class="d-flex justify-content-between">
                            <form class="row g-3" role="form" action="{{ route('getdonates.update',['getdonate'=>$sellbook->id, 'id'=>$sellbook->product->id]) }}" method="post" enctype="multipart/form-data">

                                @csrf
                                @method('patch')
                                {{-- <input name="bookquantity" type="hidden" text="" value="{{$sellbook->product->bookquantity}}"/>
                                <input name="bookid" type="hidden" text="" value="{{$sellbook->product->bookid}}"/> --}}
                                  @if ($sellbook->status=="approved")
                                  <a href="{{ route('issue.update',['id'=>$sellbook->id]) }}" class="btn btn-success btn-sm">Issue</a>
                                  
                                  </button>
                                   @elseif ($sellbook->status=="cancel")
                                   <button type="submit" class="btn btn-danger btn-sm disabled" type="button">
                                    Cancel
                                  </button>
                                   @elseif ($sellbook->status=="issue" || $sellbook->status=="reissue")
                                   <a href="{{ route('return.update',['id'=>$sellbook->id,'bookid'=>$sellbook->product->id]) }}" class="btn btn-info btn-sm">Return</a>
                                   
                                   @elseif ($sellbook->status=="return")
                                    <button class="btn btn-success btn-sm disabled">Returned</button>
                                  @else
                                  <button type="submit" class="btn btn-success btn-sm disabl" type="button">
                                    Pending
                                  </button>
                                 
                                  @endif
                                 
                               
                            </form>
                     @if (!$sellbook->status=="cancel"||$sellbook->status=="approved")
                     <a href="{{ route('getdonates.destroy',['id'=>$sellbook->id, 'bookid'=>$sellbook->product->id]) }}" class="btn btn-danger btn-sm ml-2">Cancel</a> 
                     @endif
                            
                        </div>
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


<!-- Button trigger modal -->
 
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


</x-backend.layout.master>
