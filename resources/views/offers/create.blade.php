<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/offers.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/offers.js') }}"></script>

    </x-slot>


    <div class="container">
        <h1>{{ __('translations.offers.title') }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('translations.offers.label.create') }}</h5>
                <form id="offers-form" method="POST"
                    action="
                            @if (isset($property))
                                {{ route('properties.store_offer', $property) }}
                            @else
                                {{ route('offers.store') }}
                            @endif
                            ">
                    @csrf

                    <div class="row mb-3">
                        <label for="offer-property" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.property') }}
                        </label>
                        <div class="col-sm-10">
                            <select class="form-select @error('property_id') is-invalid @enderror" name="property_id"
                            id="offer-property"
                            placeholder="{{ __('translations.labels.select2-placeholder') }}"
                            aria-describedby="offer-property-error">
                                
                                @if (isset($property))
                                    <option value="{{ $property->id }}" selected>id: {{ $property->id }}, {{ __('translations.properties.attribute.address') }}: {{ $property->address }},
                                        {{ __('translations.properties.attribute.property_type') }}: {{ $property->property_type->name }}</option>
                                @else
                                    
                                <option disabled selected>{{ __('translations.labels.select2-placeholder') }}</option>
                                @foreach ($properties as $propertyy )
                                @if (($propertyy->id) == old('property_id'))
                                    <option value="{{ $propertyy->id }}" selected>id: {{ $propertyy->id }}, {{ __('translations.properties.attribute.address') }}: {{ $propertyy->address }},
                                        {{ __('translations.properties.attribute.property_type') }}: {{ $propertyy->property_type->name }}</option>
                                @else
                                    <option value="{{ $propertyy->id }}">id: {{ $propertyy->id }}, {{ __('translations.properties.attribute.address') }}: {{ $propertyy->address }},
                                        {{ __('translations.properties.attribute.property_type') }}: {{ $propertyy->property_type->name }}</option>
                                @endif
                                    
                                @endforeach
                                @endif
                                

                            </select>
                            @error('property_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="offer-offer_status" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.offer_status') }}
                        </label>
                        <div class="col-sm-10">
                            <select class="form-select @error('offer_status_id') is-invalid @enderror" name="offer_status_id"
                            id="offer-offer_status"
                            placeholder="{{ __('translations.labels.select2-placeholder') }}"
                            aria-describedby="offer-offer_status-error">
                                <option selected disabled>{{ __('translations.labels.select2-placeholder') }}</option>
                                @foreach ($offer_statuses as $offer_status )
                                @if (($offer_status->id) == old('offer_status_id'))
                                    <option value="{{ $offer_status->id }}" selected>{{ $offer_status->name }}</option>
                                @else
                                    <option value="{{ $offer_status->id }}">{{ $offer_status->name }}</option>
                                @endif
                                    
                                @endforeach
                                    
                                

                            </select>
                            @error('offer_status_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="offer-title" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.title') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="offer-title" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="offer-start_date" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.start_date') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                            id="offer-start_date" value="{{ old('start_date') }}">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="offer-end_date" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.end_date') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                            id="offer-end_date" value="{{ old('end_date') }}">
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="offer-price" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.price') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="offer-price" value="{{ old('price') }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="offer-comment" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.comment') }}
                        </label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('comment') is-invalid @enderror" name="comment"
                            id="offer-comment" rows="3">{{ old('comment') }}</textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>


                    

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="
                                    @if (isset($property))
                                        {{ route('properties.offers', $property) }}
                                    @else
                                        {{ route('offers.index') }}
                                    @endif
                                    "type="submit" class="btn btn-secondary">
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