<x-frontend.layout.master>
    <x-slot name="title">Research supervisions</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Research supervisions" class="rounded bg-white py-2" />
                <h6 class="text-end pe-5"><a class="btn btn-primary" href="{{ route('research-supervisions.create') }}">Add
                        new</a></h6>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Level of study</th>
                                    <th>Title</th>
                                    <th>Supervisor(s)</th>
                                    <th>Student(s)</th>
                                    <th>Area of research</th>
                                    <th>Current completion</th>
                                    <th width="200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($research_supervisions as $rs)
                                    <tr>
                                        <td>{{ $rs->level_of_study }}</td>
                                        <td>{{ $rs->title }}</td>
                                        <td>{{ $rs->supervisors }}</td>
                                        <td>{{ $rs->students }}</td>
                                        <td>{{ $rs->area_of_research }}</td>
                                        <td>{{ $rs->completion }}</td>
                                        <td>
                                            <a href="{{ route('research-supervisions.edit', $rs->id) }}"
                                                class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('research-supervisions.destroy', $rs->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No research supervisions.
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
