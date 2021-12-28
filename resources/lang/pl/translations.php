<?php

return[
    'menu' =>[
        'log-viewer' => 'Logi'
    ],
    'attribute' =>
    [
        'created_at' => 'utworzono',
        'updated_at' => 'zaktualizowano',
        'deleted_at' => 'usunięto'
    ],
    'labels' => [
        'select2-placeholder' => 'Wybierz opcję'
    ],
    'buttons' =>
    [
        'cancel' => 'Anuluj',
        'store' => 'Dodaj',
        'update' => 'Aktualizuj',
        'yes' => 'Tak',
        'no' => 'Nie'
    ],
    'property_types' => 
    [
        'title' => 'Typy nieruchomości',
        'label' =>
        [
            'create' => 'Dodanie nowego typu nieruchomości',
            'edit' => 'Edycja danych typu nieruchomości',
            'destroy' => 'Usunięcie typu nieruchomości',
            'destroy-question' => 'Czy na pewno usunąc typ nieruchomości :name?',
            'restore' => 'Anulowanie usunięcia typu nieruchomości',
            'restore-question' => 'Czy anulować usunięcie typu nieruchomości :name?',
        ],
        'attribute' =>
        [
            'name' => 'nazwa',
            'address' => 'adres',
            'count_properties' => 'ilość nieruchomości',
            'owner' => 'właściciel'
        ],
        'flashes' =>
        [
            'success' =>
            [
                'stored' => 'Dodano typ nieruchomości :name',
                'updated' => 'Zaktualizowano typ nieruchomości :name',
                'nothing-changed' => 'Dane typu nieruchomosci :name nie zmieniły się',
                'destroy' => 'Typ nieruchomości :name został usunięty',
                'restore' => 'Usunięcie typu nieruchomości :name zostało anulowane',
            ]
        ]
    ],
    "offer_statuses" =>
    [
        'title' => 'Statusy ofert',
        'label' =>
        [
            'create' => 'Dodanie nowego statusu oferty',
            'edit' => 'Edycja danych statusu oferty',
            'destroy' => 'Usunięcie statusu oferty',
            'destroy-question' => 'Czy na pewno usunąc status oferty :name?',
            'restore' => 'Anulowanie usunięcia statusu oferty',
            'restore-question' => 'Czy anulować usunięcie statusu oferty :name?',
        ],
        'attribute'=>
        [
            'name' => 'nazwa',
            'count_offers' => 'ilość ofert',
        ],
        'flashes' =>
        [
            'success' =>
            [
                'stored' => 'Dodano status oferty :name',
                'updated' => 'Zaktualizowano status oferty :name',
                'nothing-changed' => 'Dane statusu oferty :name nie zmieniły się',
                'destroy' => 'Status oferty :name został usunięty',
                'restore' => 'Usunięcie statusu oferty :name zostało anulowane',
            ]
        ]

    ],
    "properties" =>
    [
        'title' => 'Nieruchomości',
        'label' =>
        [
            'create' => 'Dodanie nowej nieruchomości',
            'offers' => 'Wyświetl oferty dla tej nieruchomości',
            'edit' => 'Edycja danych nieruchomości',
            'destroy' => 'Usunięcie nieruchomości',
            'destroy-question' => 'Czy na pewno usunąc nieruchomośc o adresie :address?',
            'restore' => 'Anulowanie usunięcia nieruchomości',
            'restore-question' => 'Czy anulować usunięcie nieruchomości o adresie :address?',
        ],
        'attribute'=>
        [
            'address' => 'adres',
            'area_square_meters' => 'powierzchnia',
            'rooms' => 'pokoje',
            'floor' => 'piętro',
            'number_of_floor' => 'liczba pięter',
            'description' => 'opis',
            'property_type' => 'typ nieruchomości',
            'owner' => 'właściciel'
        ],
        'flashes' =>
        [
            'success' =>
            [
                'stored' => 'Dodano nieruchomość o id :id i adresie :address',
                'updated' => 'Zaktualizowano nieruchomość o adresie :address',
                'nothing-changed' => 'Dane nieruchomości o adresie :address nie zmieniły się',
                'destroy' => 'Nieruchomość o adresie :address została usunięta',
                'restore' => 'Usunięcie nieruchomości o adresie :address zostało anulowane',
            ]
        ]
    ],
    "offers" =>
    [
        'title' => 'Oferty',
        'label' =>
        [
            'create' => 'Dodanie nowej oferty',
            'edit' => 'Edycja danych oferty',
            'destroy' => 'Usunięcie oferty',
            'destroy-question' => 'Czy na pewno usunąc ofertę o tytule :title?',
            'restore' => 'Anulowanie usunięcia oferty',
            'restore-question' => 'Czy anulować usunięcie oferty o tytule :title?',
        ],
        'attribute' =>
        [
            'property' => 'nieruchomość',
            'offer_status' => 'status oferty',
            'title' => 'tytuł',
            'start_date' => 'data wystawienia',
            'end_date' => 'data zakończenia',
            'price' => 'cena',
            'comment' => 'uwagi',
        ],
        'flashes' =>
        [
            'success' =>
            [
                'stored' => 'Dodano ofertę o id :id dla nieruchomości o id :property_id',
                'updated' => 'Zaktualizowano ofertę o tytule :title',
                'nothing-changed' => 'Dane oferty o tytule :title nie zmieniły się',
                'destroy' => 'Oferta o tytule :title została usunięta',
                'restore' => 'Usunięcie oferty o tytule :title zostało anulowane',
            ]
        ]
    ]

];