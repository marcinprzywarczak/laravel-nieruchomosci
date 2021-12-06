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
        'store' => 'Dodaj'
    ],
    'property_types' => 
    [
        'title' => 'Typy nieruchomości',
        'label' =>
        [
            'create' => 'Dodanie nowego typu nieruchomości'
        ],
        'attribute' =>
        [
            'name' => 'nazwa',
            'address' => 'adres',
            'count_properties' => 'ilość nieruchomości'
        ],
        'flashes' =>
        [
            'success' =>
            [
                'stored' => 'Dodano typ nieruchomości :name',
            ]
        ]
    ],
    "offer_statuses" =>
    [
        'title' => 'Statusy ofert',
        'label' =>
        [
            'create' => 'Dodanie nowego statusu oferty'
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
            ]
        ]

    ],
    "properties" =>
    [
        'title' => 'Nieruchomości',
        'label' =>
        [
            'create' => 'Dodanie nowej nieruchomości',
            'offers' => 'Wyświetl oferty dla tej nieruchomości'
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
        ],
        'flashes' =>
        [
            'success' =>
            [
                'stored' => 'Dodano nieruchomość o id :id i adresie :address',
            ]
        ]
    ],
    "offers" =>
    [
        'title' => 'Oferty',
        'label' =>
        [
            'create' => 'Dodanie nowej oferty'
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
            ]
        ]
    ]

];