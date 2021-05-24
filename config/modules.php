<?php

use app\modules\city\City;
use app\modules\feedback\Feedback;
use app\modules\user\User;

return [
    'city' => [
        'class' => City::class,
    ],
    'feedback' => [
        'class' => Feedback::class,
    ],
    'user' => [
        'class' => User::class,
    ],
];
