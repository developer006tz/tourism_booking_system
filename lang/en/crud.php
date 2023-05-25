<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'toursites' => [
        'name' => 'Toursites',
        'index_title' => 'Toursites List',
        'new_title' => 'New Toursite',
        'create_title' => 'Create Toursite',
        'edit_title' => 'Edit Toursite',
        'show_title' => 'Show Toursite',
        'inputs' => [
            'name' => 'Name',
            'country_id' => 'Country',
            'other_name' => 'Other Name',
            'description' => 'Description',
            'accomodation' => 'Accomodation',
            'region' => 'Region',
            'district' => 'District',
            'distance' => 'Distance',
            'attractions' => 'Attractions',
            'local_price' => 'Local Price',
            'international_price' => 'International Price',
            'time_of_visit' => 'Time Of Visit',
        ],
    ],

    'all_attractions' => [
        'name' => 'All Attractions',
        'index_title' => 'AllAttractions List',
        'new_title' => 'New Attractions',
        'create_title' => 'Create Attractions',
        'edit_title' => 'Edit Attractions',
        'show_title' => 'Show Attractions',
        'inputs' => [
            'toursite_id' => 'Toursite',
            'name' => 'Name',
            'description' => 'Description',
            'distance' => 'Distance',
        ],
    ],

    'all_attractionimages' => [
        'name' => 'All Attractionimages',
        'index_title' => 'AllAttractionimages List',
        'new_title' => 'New Attractionimages',
        'create_title' => 'Create Attractionimages',
        'edit_title' => 'Edit Attractionimages',
        'show_title' => 'Show Attractionimages',
        'inputs' => [
            'attractions_id' => 'Attractions',
            'image' => 'Image',
            'description' => 'Description',
        ],
    ],

    'countries' => [
        'name' => 'Countries',
        'index_title' => 'Countries List',
        'new_title' => 'New Country',
        'create_title' => 'Create Country',
        'edit_title' => 'Edit Country',
        'show_title' => 'Show Country',
        'inputs' => [
            'name' => 'Name',
            'nicename' => 'Nicename',
            'iso' => 'Iso',
        ],
    ],

    'all_accomodations' => [
        'name' => 'All Accomodations',
        'index_title' => 'AllAccomodations List',
        'new_title' => 'New Accomodations',
        'create_title' => 'Create Accomodations',
        'edit_title' => 'Edit Accomodations',
        'show_title' => 'Show Accomodations',
        'inputs' => [
            'toursite_id' => 'Toursite',
            'name' => 'Name',
            'type' => 'Type',
            'sleep_service' => 'Sleep Service',
            'description' => 'Description',
            'local_night_fee' => 'Local Night Fee',
            'international_night_fee' => 'International Night Fee',
            'food_service' => 'Food Service',
            'food_types_and_price' => 'Food Types And Price',
            'is_inside_park' => 'Is Inside Park',
            'distance_to_tour_site' => 'Distance To Tour Site',
            'room_available' => 'Room Available',
        ],
    ],

    'all_accomodationimages' => [
        'name' => 'All Accomodationimages',
        'index_title' => 'AllAccomodationimages List',
        'new_title' => 'New Accomodationimages',
        'create_title' => 'Create Accomodationimages',
        'edit_title' => 'Edit Accomodationimages',
        'show_title' => 'Show Accomodationimages',
        'inputs' => [
            'accomodations_id' => 'Accomodations',
            'type' => 'Type',
            'image' => 'Image',
            'description' => 'Description',
        ],
    ],

    'all_transportation' => [
        'name' => 'All Transportation',
        'index_title' => 'AllTransportation List',
        'new_title' => 'New Transportation',
        'create_title' => 'Create Transportation',
        'edit_title' => 'Edit Transportation',
        'show_title' => 'Show Transportation',
        'inputs' => [
            'toursite_id' => 'Toursite',
            'type' => 'Type',
            'price' => 'Price',
            'distance_covered_in_km' => 'Distance Covered In Km',
            'image' => 'Image',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'country_id' => 'Country',
            'image' => 'Image',
        ],
    ],

    'tourguideagents' => [
        'name' => 'Tourguideagents',
        'index_title' => 'Tourguideagents List',
        'new_title' => 'New Tourguideagent',
        'create_title' => 'Create Tourguideagent',
        'edit_title' => 'Edit Tourguideagent',
        'show_title' => 'Show Tourguideagent',
        'inputs' => [
            'toursite_id' => 'Toursite',
            'title' => 'Title',
            'description' => 'Description',
            'guide_price_per_day' => 'Guide Price Per Day',
            'rating' => 'Rating',
            'distance_covered' => 'Distance Covered',
            'user_id' => 'User',
        ],
    ],

    'all_tourchallenges' => [
        'name' => 'All Tourchallenges',
        'index_title' => 'AllTourchallenges List',
        'new_title' => 'New Tourchallenges',
        'create_title' => 'Create Tourchallenges',
        'edit_title' => 'Edit Tourchallenges',
        'show_title' => 'Show Tourchallenges',
        'inputs' => [
            'user_id' => 'User',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
        ],
    ],

    'all_toursiteimages' => [
        'name' => 'All Toursiteimages',
        'index_title' => 'AllToursiteimages List',
        'new_title' => 'New Toursiteimages',
        'create_title' => 'Create Toursiteimages',
        'edit_title' => 'Edit Toursiteimages',
        'show_title' => 'Show Toursiteimages',
        'inputs' => [
            'toursite_id' => 'Toursite',
            'image' => 'Image',
            'description' => 'Description',
        ],
    ],

    'bookings' => [
        'name' => 'Bookings',
        'index_title' => 'Bookings List',
        'new_title' => 'New Booking',
        'create_title' => 'Create Booking',
        'edit_title' => 'Edit Booking',
        'show_title' => 'Show Booking',
        'inputs' => [
            'user_id' => 'User',
            'toursite_id' => 'Toursite',
            'transportation_id' => 'Transportation',
            'accomodations_id' => 'Accomodations',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
