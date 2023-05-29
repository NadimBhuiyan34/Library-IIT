<x-frontend.layout.master>
    <x-slot name="title">Add Awards</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Add new Awards" class="rounded bg-white py-2" />
                <hr>
                <div class="card-body">
                    <form class="row g-3" role="form" action="{{ route('awards.store') }}" method="post">
                        @csrf
                        <x-backend.alertmessage.alertmessage type="success" />
                        <x-frontend.form.input name="award_type" text="Award Type" type="text"
                            :value="old('award_type')" />
                        <x-frontend.form.input name="title" text="Title" type="text"
                            :value="old('title')" />
                        <x-frontend.form.input name="year" text="Year" type="text"
                            :value="old('year')" />
                            
                        <x-frontend.form.input name="country" text="Country" type="text"
                            :value="old('country')" />
                        <x-frontend.form.input name="description" text="Description" type="text" :value="old('description')" />
                        

                       
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
