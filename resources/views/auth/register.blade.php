@extends('layouts.app')

@section('content')
<div class="account-pages my-5 pt-sm-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">S'inscrire</h5>
                                    <p>Enregistrez votre établissement</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="p-2">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="col-xl-9 col-sm-6 mx-auto">
                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-4">Choisissez Votre Offre</h5>
                                        <div class="d-flex justify-content-center">
                                            <div class="d-flex flex-column align-items-center me-5" style="width: 100px;">
                                                <input class="form-check-input mb-1" type="radio" name="offer" id="formRadios1" value="demo" checked>
                                                <label class="form-check-label" for="formRadios1">Demo</label>
                                            </div>
                                            <div class="d-flex flex-column align-items-center me-5" style="width: 100px;">
                                                <input class="form-check-input mb-1" type="radio" name="offer" id="formRadios2" value="basique">
                                                <label class="form-check-label" for="formRadios2">Basique</label>
                                            </div>
                                            <div class="d-flex flex-column align-items-center" style="width: 100px;">
                                                <input class="form-check-input mb-1" type="radio" name="offer" id="formRadios3" value="professionnel">
                                                <label class="form-check-label" for="formRadios3">Professionnel</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-9 col-sm-6 mx-auto mt-1 text-center" id="duration-options" style="display: none;">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="duree" id="btnradio4" autocomplete="off" value="1" checked>
                                        <label class="btn btn-outline-primary" for="btnradio4">1 mois</label>

                                        <input type="radio" class="btn-check" name="duree" id="btnradio6" autocomplete="off" value="12">
                                        <label class="btn btn-outline-primary" for="btnradio6">12 mois</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom de l'établissement</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="Adresse" class="form-label">Adresse</label>
                                    <input id="Adresse" type="text" class="form-control @error('Adresse') is-invalid @enderror" name="Adresse" value="{{ old('Adresse') }}" required autocomplete="Adresse" autofocus>
                                    @error('Adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="Phone" class="form-label">Numéro de téléphone</label>
                                    <input id="Phone" type="number" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone" autofocus>
                                    @error('Phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse e-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="mt-4 d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        S'inscrire
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const offerRadios = document.querySelectorAll('input[name="offer"]');
        const durationOptions = document.getElementById('duration-options');

        offerRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'basique' || this.value === 'professionnel') {
                    durationOptions.style.display = 'block';
                } else {
                    durationOptions.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection
