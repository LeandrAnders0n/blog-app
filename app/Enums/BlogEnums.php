<?php

namespace App\Enums;

class BlogEnums
{
    //user role for permissions
    const WRITER = 'writer';
    const ADMIN = 'admin';

    //post status
    const IN_PROGRESS= 'in_progress';
    const ACCEPTED ='accepted';
    const REJECTED='rejected';

    //permissions for authorization
    const LIMITED_PERMISSIONS='limited';
    const ALL_PERMISSIONS='all';
    
    //add enums for blog tags
    const TAGS = [
        'MOVIES_AND_TV' => 'Movies and TV',
        'MUSIC' => 'Music',
        'GAMING' => 'Gaming',
        'CELEBRITIES' => 'Celebrities',
        'LIFESTYLE' => 'Lifestyle',
        'TECHNOLOGY' => 'Technology',
        'LATEST' => 'Latest',
    ];
    
    //featured or not featured post
    const FEATURED = 1;
    const NOT_FEATURED = 0;

}
