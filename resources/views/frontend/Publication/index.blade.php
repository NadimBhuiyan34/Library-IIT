<x-frontend.layout.master>
    <x-slot name="title">Publication</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Publication" class="rounded bg-white py-2" />
                <h6 class="text-end pe-5"><a class="btn btn-primary" href="{{ route('publications.create') }}">Add
                        new</a></h6>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Journal Name</th>
                                    <th>Journal Link</th>
                                    <th width="200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($publications as $ps)
                                    <tr>
                                        <td>{{ $ps->title }}</td>
                                        <td>{{ $ps->author }}</td>
                                        <td>{{ $ps->journal_name }}</td>
                                        <td><a href="{{ $ps->journal_link }}"></a></td>
                                        {{-- <td>{{ $ps->journal_link }}</td> --}}
                                        
                                        <td>
                                            <a href="{{ route('publications.edit', $ps->id) }}"
                                                class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('publications.destroy', $ps->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No publications information found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-frontend.layout.master>
