<x-frontend.layout.master>
    <x-slot name="title">Edit Publications</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Edit Publications" class="rounded bg-white py-2" />
                <hr>
                <div class="card-body">
                    <form class="row g-3" role="form" action="{{ route('publications.update', $Publication->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <x-backend.alertmessage.alertmessage type="success" />
                        <x-frontend.form.input name="title" text="Title" type="text"
                            :value="old('title', $Publication->title)" />
                      
                        <x-frontend.form.input name="author" text="Author" type="text" :value="old('author', $Publication->author)" />
                        <x-frontend.form.input name="journal_name" text="Journal Name" type="text" :value="old('journal_name', $Publication->journal_name)" />
                        <x-frontend.form.input name="journal_link" text="Journal Link" type="text" :value="old('journal_link', $Publication->journal_link)" />
                        

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
