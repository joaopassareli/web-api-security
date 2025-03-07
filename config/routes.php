<?php

declare(strict_types=1);

use Alura\Mvc\Controller\LoginController;
use Alura\Mvc\Controller\LogoutController;
use Alura\Mvc\Controller\NewVideoController;
use Alura\Mvc\Controller\EditVideoController;
use Alura\Mvc\Controller\LoginFormController;
use Alura\Mvc\Controller\VideoFormController;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Controller\JsonVideoListController;
use Alura\Mvc\Controller\NewJsonVideoController;

return [
    'GET|/' => VideoListController::class,
    'GET|/novo-video' => \Alura\Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => NewVideoController::class,
    'GET|/editar-video' => VideoFormController::class,
    'POST|/editar-video' => EditVideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/login' => LoginFormController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class,
    'GET|videos-json' => JsonVideoListController::class,
    'POST/videos' => NewJsonVideoController::class,
];
