<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/properties.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/properties.js') }}"></script>

    </x-slot>
    <div class="container">
        <h1>{{ __('translations.properties.title') }}</h1>
        <div class="d-flex flex-row-reverse mb-4">

        </div>
        <div id="no-more-tables">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translations.properties.attribute.address') }}</th>
                        <th>{{ __('translations.properties.attribute.property_type') }}</th>
                        <th>{{ __('translations.properties.attribute.area_square_meters') }}</th>
                        <th>{{ __('translations.properties.attribute.rooms') }}</th>
                        <th>{{ __('translations.properties.attribute.floor') }}</th>
                        <th>{{ __('translations.properties.attribute.number_of_floor') }}</th>
                        <th>{{ __('translations.properties.attribute.description') }}</th>
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