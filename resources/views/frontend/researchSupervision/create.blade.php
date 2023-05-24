<x-frontend.layout.master>
    <x-slot name="title">Add research supervision</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Add new research supervision" class="rounded bg-white py-2" />
                <hr>
                <div class="card-body">
                    <form class="row g-3" role="form" action="{{ route('research-supervisions.store') }}" method="post">
                        @csrf
                        <x-backend.alertmessage.alertmessage type="success" />
                        <x-frontend.form.input name="level_of_study" text="Level of study" type="text"
                            :value="old('level_of_study')" />
                        <x-frontend.form.input name="title" text="Research title" type="text" :value="old('title')" />
                        <x-frontend.form.input name="supervisors" text="Supervisors" type="text" :value="old('supervisors')" />
                        <x-frontend.form.input name="students" text="Students" type="text" :value="old('students')" />
                        <x-frontend.form.input name="area_of_research" text="Area of research" type="text"
                            :value="old('area_of_research')" />
                        <x-frontend.form.input name="completion" text="Current completion" type="text"
                            :value="old('completion')" />

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
