@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="bg-success text-white py-4 mt-5 text-center">
    <div class="container">
        <h2 class="fw-bold text-warning">Contact</h2>
        <p class="opacity-75 mt-2">Notre équipe est à votre écoute</p>

        <div class="mt-3 fw-semibold">
            <p>📞 (+227) 98 55 30 94 / 97 00 33 44</p>
            <p>📧 contact@suudjkoukou.com</p>
        </div>

        <div class="mt-4 col-md-6 mx-auto">
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nom complet</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4">{{ old('message') }}</textarea>
                </div>

                <button class="btn btn-warning text-white fw-semibold rounded-pill px-4">
                    Envoyer
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
