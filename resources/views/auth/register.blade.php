  <x-backend.layout.master>
    	<x-slot name="title">Register</x-slot>

        <section class="" style="margin-top: 100px">

        
       <div class="row">

    
     <div class="col col-sm-5 col-lg-5 mx-auto card p-3">
        <!-- Validation Errors -->
        <x-backend.alertmessage.alertmessage type="success"/>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  
  </div>
  {{-- <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div> --}}
     <label for="exampleInputEmail1" class="form-label">Role</label>
  <select class="form-select form-control mb-3" aria-label="Default select example" name="role">
  <option selected>Select One</option>
  <option value="admin">Admin</option>
  <option value="teacher">Teacher</option>
  <option value="student">Student</option>
  <option value="staff">Staff</option>
</select>
    
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    </div>       
  </section>
</x-backend.layout.master>