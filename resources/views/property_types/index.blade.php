<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/property_types.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/property_types.js') }}"></script>

    </x-slot>
    <div class="container">
        <h1>{{ __('translations.property_types.title') }}</h1>
        <div class="d-flex flex-row-reverse mb-4">
            <a href="{{ route('property_types.create') }}"
            type="button"
            class="btn btn-light"
            role="button">
            {{ __('translations.property_types.label.create') }}
            </a>
        </div>
        <div id="no-more-tables">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translations.property_types.attribute.name') }}</th>
                        <th>{{ __('translations.attribute.created_at') }}</th>
                        <th>{{ __('translations.attribute.updated_at') }}</th>
                        <th>{{ __('translations.attribute.deleted_at') }}</th>
                        <th>{{ __('translations.property_types.attribute.count_properties') }}</th>
                        <th class="always-visible"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property_types as $property_type )
                        <tr>
                            <td>{{ $property_type->id }}</td>
                            <td>{{ $property_type->name }}</td>
                            <td>{{ $property_type->created_at }}</td>
                            <td>{{ $property_type->updated_at }}</td>
                            <td>{{ $property_type->deleted_at }}</td>
                            <td>{{ $property_type->properties_count }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>