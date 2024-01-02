<?php

namespace app\controllers;

use app\core\Controller;

class SideController extends Controller
{
    public static function home(): string
    {
        $params = [
            'name' => 'kutlumbek',
        ];

        return self::render('home', $params);
    }

}