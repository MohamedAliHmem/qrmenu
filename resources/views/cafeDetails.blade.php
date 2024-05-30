@extends('theme')

@section('contenu')
                    
                                        <form action="addCafe" method="post" enctype="multipart/form-data">
                                            @csrf

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Cafe name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Cafe name"
                                                    id="example-text-input" name="nomCafe" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Phone number</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" placeholder="Phone number"
                                                    id="example-text-input" name="tel" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Adress</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Adress"
                                                    id="example-text-input" name="adresse" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Logo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" placeholder="Logo"
                                                    id="example-text-input" accept="image/*" name="logo">
                                                
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container-fluid -->
                    @endsection