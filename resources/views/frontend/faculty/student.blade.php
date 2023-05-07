 
 <x-frontend.layout.master>

     
	<x-slot name="title">Student</x-slot>
   <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Student</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div>
 <section class="mt-5 container">
     <div class="row">
          <div class="input-group mb-2 w-50 mx-auto" >
           <input type="text" class="form-control shadow" placeholder="Search here" style="border-radius:20px;" id="search">
 
          </div>
       </div>
        <div class="row ">
       @foreach ($user_student as $student)
         
      
        <div class="col-md-3 col-6 col-xl-3 col-sm-6 col-md-4 mx-auto gap-1">

           <div class="card p-2 py-3 text-center border-left-info mx-auto mb-3">
                    
        <div class="img mb-2 d-flex">

            <img src="{{asset('storage/profiles/'.$student->profile->image)}}" alt="Generic placeholder image" class="img-fluid mx-auto"
                  style="width: 120px; border-radius: 10px; height:120px">

               <span class="position-absolute translate-middle badge rounded-pill bg-danger top-1 start-90 ms-4 shadow">
   <strong class="">{{ $student->status === '0' ? 'InActive' : 'Active' }}</strong>

    <span class="visually-hidden">unread messages</span>
  </span>
            
        </div>

            <h6 style="color:#041f8a">{{ strtoupper($student->name) }}</h6>
            <small>Email: {{ $student->email }}</small>
            <small>Mobile: {{ $student->profile->mobile ==true?$student->profile->mobile:'01-------' }}</small>
            
            <small>Joining Date : {{ $student->created_at->format('Y-m-d')}}</small>
            

        
        <div class="mt-1 apointment d-flex justify-content-center gap-2">

           <a href=""> <i class="fa-brands fa-square-facebook text-primary"></i></a>
           <a href=""> <i class="fa-brands fa-twitter text-info"></i></a>
           
        </div>
           </div>
       </div>
        @endforeach
        </div>
  </section>
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
