@props(['type'=>'danger'])

@if (session('message'))
        
 <div role="alert" aria-live="assertive" class="toast show position-fixed text-center bg-white" data-bs-autohide="true" style="top:50%; left:50%; transform: translate(-50%, -50%); z-index: 1;" data-bs-delay="10000">
    <div class="toast-body">
        <p class="text-{{ session('type') }} fs-6">{{ session('message') }}</p>
        <button type="button" class="btn btn-primary" data-bs-dismiss="toast">OK</button>
    </div>
</div>

      
      
   


@endif
 