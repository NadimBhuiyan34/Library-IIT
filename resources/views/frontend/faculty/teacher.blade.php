  
 <x-frontend.layout.master>
 
	<x-slot name="title">Teacher</x-slot>
    <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Teacher</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers mt-3 pt-3">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($user_teacher as $teacher)
            
      
          <div class="col-md-4 d-flex align-items-stretch ">
            <div class="member border-start px-2 rounded shadow">
              <img src="{{ asset('storage/profiles').'/'.$teacher->profile->image }}" class="img-fluid rounded-5 mt-2" alt="" style="height:200px; width:200px">
              <div class="member-content">
                <h4>{{ $teacher->name }}</h4>
                <span>{{ $teacher->profile->profession  ? $teacher->profile->profession:'No proffession'}}</span>
                 <span><i class="bi bi-envelope me-1"></i>{{ $teacher->email }}</span>
                 <span><i class="bi bi-phone me-1"></i>{{ $teacher->profile->mobile ?  $teacher->profile->mobile : '01255-----' }}</span>
                <p>
                   {{ $teacher->profile->description}}
                </p>
                <div class="social">
                  <a href="$teacher->profile->twiter_url"><i class="bi bi-twitter"></i></a>
                  
              
                  <a href="{{ $teacher->profile->facebook_url }}"><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href="$teacher->profile->linkedin_url"><i class="bi bi-google"></i></a>
                 
                </div>
                <a href="{{ route('teacher-details', ['id' => $teacher->id]) }}" class="btn btn-sm btn-dark">Read More</a>

              </div>
               
            </div>
          </div>
     @endforeach
        

        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main>




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
