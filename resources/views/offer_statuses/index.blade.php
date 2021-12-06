<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/offer_statuses.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/offer_statuses.js') }}"></script>

    </x-slot>
    <div class="container">
        <h1>{{ __('translations.offer_statuses.title') }}</h1>
        <div class="d-flex flex-row-reverse mb-4">
            <a href="{{ route('offer_statuses.create') }}"
            type="button"
            class="btn btn-light"
            role="button">
            {{ __('translations.offer_statuses.label.create') }}
            </a>
        </div>
        <div id="no-more-tables">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translations.offer_statuses.attribute.name') }}</th>
                        <th>{{ __('translations.attribute.created_at') }}</th>
                        <th>{{ __('translations.attribute.updated_at') }}</th>
                        <th>{{ __('translations.attribute.deleted_at') }}</th>
                        <th>{{ __('translations.offer_statuses.attribute.count_offers') }}</th>
                        <th class="always-visible"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offer_statuses as $offer_status )
                        <tr>
                            <td>{{ $offer_status->id }}</td>
                            <td>{{ $offer_status->name }}</td>
                            <td>{{ $offer_status->created_at }}</td>
                            <td>{{ $offer_status->updated_at }}</td>
                            <td>{{ $offer_status->deleted_at }}</td>
                            <td>{{ $offer_status->offers_count }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="action buttons">
                                @can('offer_statuses.store')
                                    <x-datatables.action-link class="btn btn-primary"
                                        url="{{ route('offer_statuses.edit', $offer_status) }}"
                                        title="{{ __('translations.offer_statuses.label.edit')}}">
                                        <i class="bi-pencil"></i>
                                    </x-action-link>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>