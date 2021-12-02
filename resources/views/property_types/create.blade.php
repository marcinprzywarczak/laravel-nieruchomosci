<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/property_types.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/property_types.js') }}"></script>

    </x-slot>


    <div class="container">
        <h1>{{ __('translations.property_types.title') }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('translations.property_types.label.create') }}</h5>
                <form id="property_types-form" method="POST"
                    action="{{ route('property_types.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="property_type-name" class="col-sm-2 col-form-label">
                            {{ __('translations.property_types.attribute.name') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="property_type-name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="{{ route('property_types.index') }}" type="submit" class="btn btn-secondary">
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