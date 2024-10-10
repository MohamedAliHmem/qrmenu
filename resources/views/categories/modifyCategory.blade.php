@extends('theme')

@section('contenu')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Modify Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="/updateCategory/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="title" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Title" id="title" name="title" value="{{$data->title}}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="position" class="col-md-2 col-form-label">Position</label>
                            <div class="col-md-10">
                                <select class="form-select" id="newPositionId" name="newPositionId">
                                    <option value="doNothing">Select Category Position</option>
                                    <option value="first">In the Top of Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">After {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Modify</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->
@endsection
