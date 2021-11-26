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
    'property_types' => 
    [
        'title' => 'Typy nieruchomości',
        'attribute' =>
        [
            'name' => 'nazwa',
            'address' => 'adres',
            'count_properties' => 'ilość nieruchomości'
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
    ]
];