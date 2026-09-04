<?php

require_once __DIR__ . '/Supergame/Utils/Utils.php';
require_once __DIR__ . '/Supergame/Model/Model.php';
require_once __DIR__ . '/Supergame/Model/ModelPlayer.php';
require_once __DIR__ . '/Supergame/View/View.php';
require_once __DIR__ . '/Supergame/View/ViewHome.php';
require_once __DIR__ . '/Supergame/Controller/Controller.php';
require_once __DIR__ . '/Supergame/Controller/ControllerHome.php';

use Utils\Utils;
use Model\ModelPlayer;
use Controller\ControllerHome;
use View\ViewHome;

$controllerHome = new ControllerHome(new ModelPlayer(Utils::connect()), new ViewHome("Supergames"));
$controllerHome->registerPlayer();
$controllerHome->render();