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
                <h5 class="card-title">
                    @if (isset($edit) && $edit === true)
                        {{ __('translations.offer_statuses.label.edit') }}
                    @else
                        {{ __('translations.offer_statuses.label.create') }}
                    @endif
                </h5>
                <form id="offer_statuses-form" method="POST"
                    @if (isset($edit) && $edit === true)
                        action="{{ route('offer_statuses.update', $offer_status) }}"
                    @else
                        action="{{ route('offer_statuses.store') }}"
                    @endif >
                    @if (isset($edit) && $edit === true)
                        @method('PATCH')
                    @endif
                    @csrf
                    <div class="row mb-3">
                        <label for="offer_status-name" class="col-sm-2 col-form-label">
                            {{ __('translations.offer_statuses.attribute.name') }}
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="offer_status-name" 
                            @if (isset($offer_status))
                                value="{{ $offer_status->name }}"
                            @else
                                value="{{ old('name') }}"
                            @endif
                            >
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