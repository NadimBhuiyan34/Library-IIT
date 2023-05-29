<x-backend.layout.master>
    @slot('title')
    Book Update
    @endslot
    <main id="main" class="main">
        <div class="card mb-4 mt-4 ">
            <div class="card-header ">
                <i class="fas fa-table me-1"></i>
                Book Update
                <a href="{{ route('books.index') }}"> <button class=" btn-sm btn btn-outline-primary"><i
                            class="fa-solid fa-backward"></i></button></a>
            </div>

            <div class=" card w-75 mx-auto mt-4 mb-4" style="background-color: #f3fcf2">
                <div class="card-header text-center shadow-sm" style="background-color: #58ed85">
                    <h4> <b> Book Update</b></h4>
                </div>
                <form class="row g-3" role="form" action="{{ route('books.update', $book->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')


                    <x-backend.alertmessage.alertmessage type="success" />

                    <select name="category" id="" class="form-select" aria-label="Default select example">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>

                    <div class="col-md-6">
                        <x-frontend.form.input name="booktitle" text="Book Tile" type="text"
                            :value="old('booktitle', $book->booktitle)" />
                    </div>
                    <div class="col-md-6">
                        <x-frontend.form.input name="bookauthor" text="Book Author" type="text"
                            :value="old('bookauthor', $book->bookauthor)" />
                    </div>
                    <div class="col-md-6">
                        <x-frontend.form.input name="bookedition" text="Book Edition" type="text"
                            :value="old('bookedition', $book->bookedition)" />
                    </div>
                    <div class="col-md-6">
                        <x-frontend.form.input name="bookquantity" text="Book Quantity" type="number"
                            :value="old('bookquantity', $book->bookquantity )" />
                    </div>


                    <div class="col-md-12">
                        <x-frontend.form.input name="bookimage" text="Book Image" type="file" />
                    </div>

                    <div class="form-check">
                        <input name="is_active" class="form-check-input" type="checkbox" value="1" id="isActiveInput"
                            checked>
                        <label class="form-check-label" for="isActiveInput">
                            Is Active
                        </label>
                    </div>

                    <div class="card-footer bg-white">
                        <div class="d-grid gap-2 col-6 mx-auto d-flex">
                            <button type="submit" class="btn btn-success w-50 btn-sm" type="button">Save <i
                                    class="fa-solid fa-paper-plane"></i></button>
                            <a href="{{ route('books.index') }}"><button class="btn btn-danger btn-sm"
                                    type="button">Cancel</button></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>
</x-backend.layout.master>