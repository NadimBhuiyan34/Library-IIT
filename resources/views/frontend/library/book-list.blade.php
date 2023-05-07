 
 <x-frontend.layout.master>
	<x-slot name="title">Library</x-slot>
  
 <div class="breadcrumbs mb-5">
      <div class="container">
        <h2>Get Book From Online Library</h2>
         
      </div>
    </div>
       <div class="row">
          <div class="input-group mb-2 w-50 mx-auto bg-dark" >
           <input type="text" class="form-control shadow " placeholder="Search here" style="border-radius:20px;" id="search">
 
          </div>
       </div>
 <x-backend.alertmessage.alertmessage type="success"/>
    <div class="row container-fluid">
         @foreach ($books as $book)
        <div class="col-md-3 col-6 col-xl-3 col-sm-6 col-md-4 mx-auto gap-1">

           <div class="card p-2 py-3 text-center border-left-info mx-auto mb-3">
                    
        <div class="img mb-2 d-flex">

          <img src="{{ asset('storage/books').'/'.$book->bookimage }}" alt="Generic placeholder image" class="img-fluid mx-auto"
                  style="width: 100px; border-radius: 10px; height:100px">

               <span class="position-absolute translate-middle badge rounded-pill bg-danger top-1 start-90 ms-4 shadow">
    <strong class=""> Stock <span class="fs-6">{{ $book->bookquantity }}</span> </strong>
              
   
            
        </div>

            <h6 style="color:#041f8a">{{ $book->booktitle }}</h6>
            <small>{{ $book->bookauthor }}</small>
            <p>{{ $book->bookedition }}</p>

        
        <div class="mt-1 apointment d-flex justify-content-center gap-2">


 <form id="add-book-request" action="{{ route('book.request') }}" method="POST">
           @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
             <input type="hidden" name="book_id" id="book_id" value="{{ $book->id }}">


             <button type="submit" class="btn btn-primary btn-sm" id="submit">
                <i class="fa-solid fa-paper-plane me-2" id="submit"></i>Request <span class="badge bg-dark">{{ $book->total_request }}</span>
             </button>
             {{-- <button class="btn btn-primary btn-sm" type="submit">Request <i class="fa-solid fa-paper-plane ms-2" id="submit"></i></button> --}}
   
</form>
   
           
        </div>
           </div>
       </div>


       @endforeach
         
       </div>

</div>
      
         
 </section>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
 


    
 

 <script>
    // get the search input field and all the card elements
const searchInput = document.getElementById('search');
const cards = document.querySelectorAll('.card');

// add event listener to search input field
searchInput.addEventListener('input', filterCards);

function filterCards() {
  // get the search input value and convert it to lowercase
  const searchValue = searchInput.value.toLowerCase();

  // loop through all the card elements and check if their text content matches the search input value
  for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    const cardTitle = card.querySelector('h6').textContent.toLowerCase();
    const cardSubtitle = card.querySelector('small').textContent.toLowerCase();
    const cardDate = card.querySelector('p').textContent.toLowerCase();
    const isMatch = cardTitle.includes(searchValue) || cardSubtitle.includes(searchValue) || cardDate.includes(searchValue);

    // show or hide the card elements based on the search results
    if (isMatch) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  }
}

  </script>
</x-frontend.layout.master>
