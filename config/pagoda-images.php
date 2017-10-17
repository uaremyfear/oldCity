<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Image Paths and Settings
    |--------------------------------------------------------------------------
    |
    |
    | We set the config here so that we can keep our controllers clean.
    | Configure each image type with an image path.
    |
    */

        'pagodaImage' => [
            'destinationFolder'     => '/images/pagodas/',
            'destinationThumbnail'      => '/images/pagodas/thumbnails/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/images/pagodas/',
            'thumbnailPath'         => '/images/pagodas/thumbnails/thumb-',
            'thumbHeight'           => 120,
            'thumbWidth'            => 120,
        ],

        'subcontentImage' => [
            'destinationFolder'     => '/images/subcontents/',
            'destinationThumbnail'      => '/images/subcontents/thumbnails/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/images/subcontents/',
            'thumbnailPath'         => '/images/subcontents/thumbnails/thumb-',
            'thumbHeight'           => 100,
            'thumbWidth'            => 400,            
        ],
];