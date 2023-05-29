<x-frontend.layout.master>
    <x-slot name="title">Add Membership</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Add new Membership" class="rounded bg-white py-2" />
                <hr>
                <div class="card-body">
                    <form class="row g-3" role="form" action="{{ route('memberships.store') }}" method="post">
                        @csrf
                        <x-backend.alertmessage.alertmessage type="success" />
                        <x-frontend.form.input name="type" text="Type" type="text"
                            :value="old('type')" />
                        <x-frontend.form.input name="name" text="Name" type="text"
                            :value="old('name')" />
                        <x-frontend.form.input name="membership_year" text="Membership Year" type="text"
                            :value="old('membership_year')" />
                        <x-frontend.form.input name="expire_year" text="Expire Year" type="text"
                            :value="old('expire_year')" />
                       
                        

                        {{-- <div class="form-check">
                            <input name="is_active" class="form-check-input" type="checkbox" value="1"
                                id="isActiveInput" checked>
                            <label class="form-check-label" for="isActiveInput">
                                Is Active
                            </label>
                        </div> --}}
                        <div class="card-footer bg-white">
                            <div class="d-grid gap-2 col-6 mx-auto d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-block"
                                    type="button"><strong>Submit</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-frontend.layout.master>
