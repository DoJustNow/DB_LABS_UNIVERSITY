<?php
return [
    '/'       => [
        'controller' => 'HomeController',
        'action'     => 'showCompetitionResults',
    ],
    '/create' => [
        'controller' => 'CompetitionResultController',
        'action'     => 'create',
    ],
    '/update' => [
        'controller' => 'CompetitionResultController',
        'action'     => 'update',
    ],
    '/delete' => [
        'controller' => 'CompetitionResultController',
        'action'     => 'delete',
    ],
    '/edit'   => [
        'controller' => 'CompetitionResultController',
        'action'     => 'showEditForm',
    ],
    '/add'    => [
        'controller' => 'CompetitionResultController',
        'action'     => 'showAddForm',
    ],
];