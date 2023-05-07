<x-backend.layout.master>
    @slot('title')
   ReIssue
    @endslot
<div class="card mb-4 mt-3">
    <div class="card-header" style="background-color: #defffe">
        <i class="fas fa-table me-1"></i>
      Reissue
       <a href="{{ route('sellbooks.create') }}"> <button class="btn btn-outline-info btn-sm text-black">Add Request for Donate</button></a>
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
                    <th>Book Quantity</th>
                    <th>Approved Id</th>
                    <th>Fine</th>
                    <th>Return Date</th>
                    <th>Applicant</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($getdonate as $sellbook)

                @if ($sellbook->status=='reissue')
                <tr>
                  <td>{{ $loop->iteration }}</td>
                
                  <td>{{ $sellbook->product->booktitle }}</td>
                  <td>{{ $sellbook->product->bookauthor }}</td>
                  <td>{{ $sellbook->product->bookedition }}</td>
                  <td>{{ $sellbook->product->bookquantity }}</td>
                  <td>{{ $sellbook->approved_id }}</td>
                  <td>0</td>
                  <td>{{ $sellbook->return_date }}</td>
                  <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Applicant Inormation
                    </button></td>
                   
                  <td class="d-flex">
                   
                    <a href="{{ route('issue.update',['id'=>$sellbook->id]) }}" class="btn btn-primary btn-sm">Reissue</a>
                   
                 
                    
                     <a href="{{ route('reissue.cancel',['id'=>$sellbook->id]) }}" class="btn btn-danger btn-sm">Cancel</a>
                    
                  </td>
              </tr>
                @endif 
              
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
