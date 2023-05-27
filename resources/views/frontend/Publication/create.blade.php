<x-frontend.layout.master>
    <x-slot name="title">Add Publications</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Add new Publications" class="rounded bg-white py-2" />
                <hr>
                <div class="card-body">
                    <form class="row g-3" role="form" action="{{ route('publications.store') }}" method="post">
                        @csrf
                        <x-backend.alertmessage.alertmessage type="success" />
                        <x-frontend.form.input name="title" text="Title" type="text"
                            :value="old('title')" />
                        <x-frontend.form.input name="author" text="Author" type="text"
                            :value="old('author')" />
                        <x-frontend.form.input name="journal_name" text="Journal Name" type="text"
                            :value="old('journal_name')" />
                        <x-frontend.form.input name="journal_link" text="Journal Link" type="text" :value="old('journal_link')" />
                        

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
