<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/offers.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/offers.js') }}"></script>
        {!! 
            JsValidator::formRequest('App\Http\Requests\Offers\OfferRequest')
         !!}
    </x-slot>


    <div class="container">
        <h1>{{ __('translations.offers.title') }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    @if (isset($edit) && $edit === true)
                    {{ __('translations.offers.label.edit') }}
                    @else
                    {{ __('translations.offers.label.create') }}
                    @endif
                   </h5>
                <form id="offers-form" method="POST"
                    action="
                            @if (isset($property))
                                @if (isset($edit) && $edit === true)
                                    {{ route('properties.update_offer', [$property, $offer]) }}
                                @else
                                    {{ route('properties.store_offer', $property) }}
                                @endif
                            @else
                                @if (isset($edit) && $edit === true)
                                    {{ route('offers.update', $offer) }}
                                @else
                                    {{ route('offers.store') }}
                                @endif
                                
                            @endif
                            ">
                    @if (isset($edit) && $edit === true)
                        @method('PATCH')
                    @endif
                    @csrf

                    <div class="row mb-3">
                        <label for="offer-property" class="col-sm-2 col-form-label">
                            {{ __('translations.offers.attribute.property') }}
                        </label>
                        <div class="col-sm-10">
                            <select class="form-select @error('property_id') is-invalid @enderror" name="property_id"
                            id="offer-property"
                            data-placeholder="{{ __('translations.labels.select2-placeholder') }}"
                            aria-describedby="offer-property-error">
                                <option></option>
                                @if (isset($property))
                                    <option value="{{ $property->id }}" selected>id: {{ $property->id }}, {{ __('translations.properties.attribute.address') }}: {{ $property->address }},
                                        {{ __('translations.properties.attribute.property_type') }}: {{ $property->property_type->name }}</option>
                                @else
                                    
                                    @if (isset($properties))
                                        <option value="{{ $properties->id }}" selected>
                                            id: {{ $properties->id }}, {{ __('translations.properties.attribute.address') }}: {{ $properties->address }},
                                        {{ __('translations.properties.attribute.property_type') }}:
                                        </option>
                                    @elseif (isset($offer))
                                        <option value="{{ $offer->property_id }}" selected>
                                            id: {{ $offer->property->id }}, {{ __('translations.properties.attribute.address') }}: {{ $offer->property->address }},
                                            {{ __('translations.properties.attribute.property_type') }}: {{ $offer->property->property_type->name }}
                                        </option>
                                        
                                    @endif
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
                            data-placeholder="{{ __('translations.labels.select2-placeholder') }}"
                            aria-describedby="offer-offer_status-error">
                                <option></option>
                                @if (isset($offer_status))
                                    <option value="{{ $offer_status->id }}" selected>
                                        {{ $offer_status->name }}
                                    </option>
                                @elseif (isset($offer))
                                    <option value="{{ $offer->offer_status_id }}" selected>
                                        {{ $offer->offer_status->name }}
                                    </option>
                                @endif
                                    
                                

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
                            id="offer-title" 
                            @if (isset($offer))
                                value = "{{ $offer->title }}"
                            @else
                                value="{{ old('title') }}"
                            @endif
                            >
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
                            id="offer-start_date"
                            @if (isset($offer))
                                value = "{{ $offer->start_date }}"
                            @else
                                value="{{ old('start_date') }}"
                            @endif
                            >
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
                            id="offer-end_date" 
                            @if (isset($offer))
                                value = "{{ $offer->end_date }}"
                            @else
                                value="{{ old('end_date') }}"
                            @endif
                            >
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
                            id="offer-price" 
                            @if (isset($offer))
                                value = "{{ $offer->price }}"
                            @else
                                value="{{ old('price') }}"
                            @endif
                            >
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
                            id="offer-comment" rows="3">@if (isset($offer)){{ $offer->comment }}@else{{ old('comment') }}@endif</textarea>
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
                                @if (isset($edit) && $edit===true)
                                    {{ __('translations.buttons.update') }}
                                @else
                                    {{ __('translations.buttons.store') }}
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>