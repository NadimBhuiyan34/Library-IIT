<x-frontend.layout.master>
    <x-slot name="title">Membership</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Membership" class="rounded bg-white py-2" />
                <h6 class="text-end pe-5"><a class="btn btn-primary" href="{{ route('memberships.create') }}">Add
                        new</a></h6>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Collaboration & Membership Name</th>
                                    <th>Type</th>
                                    <th>Membership Year	</th>
                                    <th>Expire Year </th>
                                    <th width="200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($memberships as $ms)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ms->type }}</td>
                                        <td>{{ $ms->name }}</td>
                                        <td>{{ $ms->membership_year }}</td>
                                        <td>{{ $ms->expire_year }}</td>
                                        
                                        
                                        <td>
                                            <a href="{{ route('memberships.edit', $ms->id) }}"
                                                class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('memberships.destroy', $ms->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No memberships information found
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
