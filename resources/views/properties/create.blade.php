<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/properties.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/properties.js') }}"></script>

    </x-slot>


    <div class="container">
        <h1>{{ __('translations.properties.title') }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('translations.properties.label.create') }}</h5>
                <form id="properties-form" method="POST"
                    action="{{ route('properties.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="property-property_type" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.property_type') }}
                        </label>
                        <div class="col-sm-10">
                            <select class="form-select @error('property_type_id') is-invalid @enderror" name="property_type_id"
                            id="property-property_type"
                            placeholder="{{ __('translations.labels.select2-placeholder') }}"
                            aria-describedby="property-property_type-error">
                                <option selected disabled>{{ __('translations.labels.select2-placeholder') }}</option>
                                @foreach ($property_types as $property_type )
                                @if (($property_type->id) == old('property_type_id'))
                                    <option value="{{ $property_type->id }}" selected>{{ $property_type->name }}</option>
                                @else
                                    <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                @endif
                                    
                                @endforeach
                                    
                                

                            </select>
                            @error('property_type_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="property-address" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.address') }}
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                            id="property-address" rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="property-area_square_meters" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.area_square_meters') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('area_square_meters') is-invalid @enderror" name="area_square_meters"
                            id="property-area_square_meters" value="{{ old('area_square_meters') }}">
                            @error('area_square_meters')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="property-rooms" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.rooms') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                            id="property-rooms" value="{{ old('rooms') }}">
                            @error('rooms')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="property-floor" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.floor') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('floor') is-invalid @enderror" name="floor"
                            id="property-floor" value="{{ old('floor') }}">
                            @error('floor')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="property-number_of_floor" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.number_of_floor') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('number_of_floor') is-invalid @enderror" name="number_of_floor"
                            id="property-number_of_floor" value="{{ old('number_of_floor') }}">
                            @error('number_of_floor')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="property-description" class="col-sm-2 col-form-label">
                            {{ __('translations.properties.attribute.description') }}
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="property-description" rows="3" >{{ old('description') }}</textarea>
                            @error('description') 
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="{{ route('properties.index') }}" type="submit" class="btn btn-secondary">
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