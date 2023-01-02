<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/offers.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/offers.js') }}"></script>

    </x-slot>
    <div class="container">
        <h1>{{ __('translations.offers.title') }}</h1>
        @if (!isset($trashed))
            <div class="d-flex flex-row-reverse mb-4">
            <a href=" 
                @if (isset($property))
                    {{ route('properties.create_offer', $property) }}
                @else
                    {{ route('offers.create') }}
                @endif "
            type="button"
            class="btn btn-light"
            role="button">
            {{ __('translations.offers.label.create') }}
            </a>
            </div>
        @endif
        
        <div id="no-more-tables">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translations.offers.attribute.offer_status') }}</th>
                        @if (!isset($property))
                            <th>{{ __('translations.offers.attribute.property') }}</th>
                        @endif
                        
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
                <tbody>
                    @foreach ($offers as $offer )
                        <tr>
                            <td>{{ $offer->id }}</td>
                            
                            <td>{{ $offer->offer_status->name }}</td>
                            @if (!isset($property))
                                <td>{{ $offer->property->id }}</td>
                            @endif
                            
                            <td>{{ $offer->title }}</td>
                            <td>{{ $offer->start_date }}</td>
                            <td>{{ $offer->end_date }}</td>
                            <td>{{ $offer->price }}</td>
                            <td>{{ $offer->comment }}</td>
                            <td>{{ $offer->created_at }}</td>
                            <td>{{ $offer->updated_at }}</td>
                            <td>{{ $offer->deleted_at }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="action buttons">
                                @can('offers.store')
                                @if ($offer->deleted_at === null)
                                    @if (isset($property))
                                        <x-datatables.action-link class="btn btn-primary"
                                            url="{{ route('properties.edit_offer', [$property, $offer]) }}" 
                                            title="{{ __('translations.offers.label.edit')}}">
                                            <i class="bi-pencil"></i>
                                        </x-action-link>

                                        <x-confirm
                                            :action="route('properties.destroy_offer', [$property, $offer])" method="DELETE"
                                            :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-danger me-2"
                                            :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                            icon="question"
                                            :message="__('translations.offers.label.destroy-question', ['title' => $offer->title] )" 
                                            button-class="btn btn-danger" :button-title="__('translations.offers.label.destroy')">
                                            <i class="bi bi-trash"></i>
                                        </x-confirm>
                                        
                                    @else
                                        <x-datatables.action-link class="btn btn-primary"
                                            url="{{ route('offers.edit', $offer) }}" 
                                            title="{{ __('translations.offers.label.edit')}}">
                                            <i class="bi-pencil"></i>
                                        </x-action-link>

                                        <x-confirm
                                            :action="route('offers.destroy', $offer)" method="DELETE"
                                            :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-danger me-2"
                                            :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                            icon="question"
                                            :message="__('translations.offers.label.destroy-question', ['title' => $offer->title] )" 
                                            button-class="btn btn-danger" :button-title="__('translations.offers.label.destroy')">
                                            <i class="bi bi-trash"></i>
                                        </x-confirm>
                                    @endif

                                @else
                                    @if (isset($property))
                                    <x-confirm
                                        :action="route('properties.restore_offer', [$property, $offer])" method="PUT"
                                        :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-success me-2"
                                        :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                        icon="question"
                                        :message="__('translations.offers.label.restore-question', ['title' => $offer->title] )" 
                                        button-class="btn btn-success" :button-title="__('translations.offers.label.restore')">
                                        <i class="bi bi-trash"></i>
                                    </x-confirm> 
                                        
                                    @else
                                    <x-confirm
                                        :action="route('offers.restore', $offer)" method="PUT"
                                        :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-success me-2"
                                        :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                        icon="question"
                                        :message="__('translations.offers.label.restore-question', ['title' => $offer->title] )" 
                                        button-class="btn btn-success" :button-title="__('translations.offers.label.restore')">
                                        <i class="bi bi-trash"></i>
                                    </x-confirm> 
                                    @endif
                                @endif
                                    
                                @endcan
                               
                                
                                
                                
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>