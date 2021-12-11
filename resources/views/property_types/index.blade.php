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
                        <th>{{ __('translations.property_types.attribute.owner') }}</th>
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
                            <td>
                                @if (isset($property_type->owner))
                                    {{ $property_type->owner->name }}
                                @endif
                                </td>
                            <td>{{ $property_type->created_at }}</td>
                            <td>{{ $property_type->updated_at }}</td>
                            <td>{{ $property_type->deleted_at }}</td>
                            <td>{{ $property_type->properties_count }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="action buttons">
                                    @can('update', $property_type)
                                        <x-datatables.action-link class="btn btn-primary"
                                            url="{{ route('property_types.edit', $property_type) }}"
                                            title="{{ __('translations.property_types.label.edit')}}">
                                            <i class="bi-pencil"></i>
                                        </x-action-link>
                                    @endcan
                                    @can('delete', $property_type)
                                        <x-confirm
                                            :action="route('property_types.destroy', $property_type)" method="DELETE"
                                            :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-danger me-2"
                                            :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                            icon="question"
                                            :message="__('translations.property_types.label.destroy-question', ['name' => $property_type->name] )" 
                                            button-class="btn btn-danger" :button-title="__('translations.property_types.label.destroy')">
                                            <i class="bi bi-trash"></i>
                                        </x-confirm>
                                    @endcan
                                    @can('restore', $property_type)
                                        <x-confirm
                                            :action="route('property_types.restore', $property_type)" method="PUT"
                                            :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-success me-2"
                                            :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                            icon="question"
                                            :message="__('translations.property_types.label.restore-question', ['name' => $property_type->name] )" 
                                            button-class="btn btn-success" :button-title="__('translations.property_types.label.restore')">
                                            <i class="bi bi-trash"></i>
                                        </x-confirm>   
                                    @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>