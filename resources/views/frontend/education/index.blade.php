<x-frontend.layout.master>
    <x-slot name="title">Education</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Education" class="rounded bg-white py-2" />
                <h6 class="text-end pe-5"><a class="btn btn-primary" href="{{ route('eduactions.create') }}">Add
                        new</a></h6>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Degree</th>
                                    <th>Group/Major Subject</th>
                                    <th>Board/Institute</th>
                                    <th>Country</th>
                                    <th>Passing Year</th>

                                    <th width="200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($educations as $edu)
                                <tr>
                                    <td>{{ $edu->degree }}</td>
                                    <td>{{ $edu->group }}</td>
                                    <td>{{ $edu->institute }}</td>
                                    <td>{{ $edu->country }}</td>
                                    <td>{{ $edu->passing_year }}</td>
                                    <td>
                                        <a href="{{ route('educations.edit', $edu->id) }}"
                                            class="btn btn-sm btn-outline-warning">Edit</a>
                                        <form class="d-inline" method="post"
                                            action="{{ route('educations.destroy', $edu->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No Educations information found.
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