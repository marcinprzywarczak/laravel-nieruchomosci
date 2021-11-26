<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/offers.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/offers.js') }}"></script>

    </x-slot>
    <div class="container">
        <h1>{{ __('translations.offers.title') }}</h1>
        <div class="d-flex flex-row-reverse mb-4">

        </div>
        <div id="no-more-tables">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translations.offers.attribute.property') }}</th>
                        <th>{{ __('translations.offers.attribute.offer_status') }}</th>
                        <th>{{ __('translations.offers.attribute.title') }}</th>
                        <th>{{ __('translations.offers.attribute.start_date') }}</th>
                        <th>{{ __('translations.offers.attribute.end_date') }}</th>
                        <th>{{ __('translations.offers.attribute.price') }}</th>
                        <th>{{ __('translations.offers.attribute.comment') }}</th>
                        <th>{{ __('translations.attribute.created_at') }}</th>
                        <th>{{ __('translations.attribute.updated_at') }}</th>
                        <th>{{ __('translations.attribute.deleted_at') }}</th>
                        <th class="always-visible"></th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</x-app-layout>