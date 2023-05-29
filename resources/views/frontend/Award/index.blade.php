<x-frontend.layout.master>
    <x-slot name="title">Award</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Award" class="rounded bg-white py-2" />
                <h6 class="text-end pe-5"><a class="btn btn-primary" href="{{ route('awards.create') }}">Add
                        new</a></h6>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Award Type</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Country</th>
                                    <th>Description</th>
                                    <th width="200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($awards as $as)
                                    <tr>
                                        <td>{{ $as->award_type }}</td>
                                        <td>{{ $as->title }}</td>
                                        <td>{{ $as->year }}</td>
                                        <td>{{ $as->country }}</td>
                                        <td>{{ $as->description }}</td>
                                        
                                        <td>
                                            <a href="{{ route('awards.edit', $as->id) }}"
                                                class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('awards.destroy', $as->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No awards information found
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
