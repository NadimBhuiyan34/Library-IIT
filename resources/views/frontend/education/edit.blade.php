<x-frontend.layout.master>
    <x-slot name="title">Edit Education</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Edit Education" class="rounded bg-white py-2" />
                <hr>
                <div class="card-body">
                    <form class="row g-3" role="form" action="{{ route('educations.update', $education->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <x-backend.alertmessage.alertmessage type="success" />
                        <x-frontend.form.input name="degree" text="Degree" type="text"
                            :value="old('degree', $education->degree)" />
                        <x-frontend.form.input name="group" text="Group/Major Subject" type="text" :value="old('group', $education->group)" />
                        <x-frontend.form.input name="institute" text="Board/Institute" type="text" :value="old('institute', $education->institute)" />
                        <x-frontend.form.input name="country" text="Country" type="text" :value="old('country', $education->country)" />
                        <x-frontend.form.input name="passing_year" text="Passing Year" type="text"
                            :value="old('passing_year', $education->passing_year)" />
                       

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
