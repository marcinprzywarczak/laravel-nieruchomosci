<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/offer_statuses.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/offer_statuses.js') }}"></script>

    </x-slot>


    <div class="container">
        <h1>{{ __('translations.offer_statuses.title') }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('translations.offer_statuses.label.create') }}</h5>
                <form id="offer_statuses-form" method="POST"
                    action="{{ route('offer_statuses.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="offer_status-name" class="col-sm-2 col-form-label">
                            {{ __('translations.offer_statuses.attribute.name') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="offer_status-name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="{{ route('offer_statuses.index') }}" type="submit" class="btn btn-secondary">
                                {{ __('translations.buttons.cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('translations.buttons.store') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>