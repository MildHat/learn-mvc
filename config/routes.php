<?php

return [
    // NewsController
    //'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', // actionView in NewsController
    'news/([0-9]+)' => 'news/view/$1', // actionView in NewsController
    'news' => 'news/index', // actionIndex in NewsController
];