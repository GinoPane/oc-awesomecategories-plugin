<?php

return [
    'plugin' => [
        'name' => 'Awesome Categories',
        'description' => 'Add some awesomeness to your blog categories'
    ],
    'form' => [
        'awesome_section' => [
            'label' => 'Style customization',
            'comment' => 'Some styling bits for your awesome categories'
        ],
        'awesome_icon' => [
            'label' => 'Icon',
            'placeholder' => 'Select icon...'
        ],
        'awesome_class' => [
            'label' => 'Custom CSS class list (separated by spaces if more than one)'
        ],
        'awesome_color' => [
            'label' => 'Color'
        ],
    ]
];
