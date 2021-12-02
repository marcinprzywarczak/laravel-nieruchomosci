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
    'labels' => [],
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
        'attribute'=>
        [
            'name' => 'nazwa',
            'count_offers' => 'ilość ofert',
        ]

    ],
    "properties" =>
    [
        'title' => 'Nieruchomości',
        'attribute'=>
        [
            'address' => 'adres',
            'area_square_meters' => 'powierzchnia',
            'rooms' => 'pokoje',
            'floor' => 'piętro',
            'number_of_floor' => 'liczba pięter',
            'description' => 'opis',
            'property_type' => 'typ nieruchomości',
        ]
    ],
    "offers" =>
    [
        'title' => 'Oferty',
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
    ]

];