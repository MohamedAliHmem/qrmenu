@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Modify Product</h4>


                                </div>
                            </div>
                        </div>



                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <form action="/modifierProduct/{{$data->id}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3 row">
                                                <label for="name" class="col-md-2 col-form-label">Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Name" id="name" name="name" value="{{$data->name}}" maxlength="255" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="price" class="col-md-2 col-form-label">Price</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" placeholder="Price" id="price" name="price" value="{{$data->price}}" step="0.01" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="note" class="col-md-2 col-form-label">Note</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="note" id="name" name="note" value="{{$data->note}}" maxlength="255">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="logo" class="col-md-2 col-form-label">Current Image</label>
                                                <div class="col-md-10">
                                                    @if($data->logo)
                                                        <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo" style="max-width: 200px; margin-top: 10px;">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="change-logo" class="col-md-2 col-form-label">Change Image</label>
                                                <div class="col-md-10">
                                                    <input type="checkbox" id="change-logo" name="change_logo" onclick="toggleFileInput()">
                                                    <label for="change-logo">Check to change logo</label>
                                                </div>
                                            </div>

                                            <div class="mb-3 row" id="file-input-row" style="display: none;">
                                                <label for="logo" class="col-md-2 col-form-label">New Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file" id="logo" accept="image/*" name="logo">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="change-category" class="col-md-2 col-form-label">Change Category Position</label>
                                                <div class="col-md-10">
                                                    <input type="checkbox" id="change-category-position" name="change-category-position" onclick="toggleCategoryPositionInput()">
                                                    <label for="change-category-position">Check to change category position</label>
                                                </div>
                                            </div>

                                            <div class="mb-3 row" id="category-input-row" style="display: none;">
                                                <label for="category-position" class="col-md-2 col-form-label">New Category Position</label>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <select class="form-select" id="newProductId" name="newProductId">
                                                            <option value="doNothing">Select Category Position</option>
                                                            <option value="first">In the Top of Category</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">After {{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success">Modify</button>
                                        </form>

                                        <script>
                                            function toggleFileInput() {
                                                var fileInputRow = document.getElementById('file-input-row');
                                                fileInputRow.style.display = fileInputRow.style.display === 'none' ? 'flex' : 'none';
                                            }

                                            function toggleCategoryPositionInput() {
                                                var fileInputRow = document.getElementById('category-input-row');
                                                fileInputRow.style.display = fileInputRow.style.display === 'none' ? 'flex' : 'none';
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container-fluid -->
                    @endsection
