<?php

require_once __DIR__ . '/Supergame/Utils/Utils.php';
require_once __DIR__ . '/Supergame/Model/Model.php';
require_once __DIR__ . '/Supergame/Model/ModelPlayer.php';
require_once __DIR__ . '/Supergame/Controller/Controller.php';
require_once __DIR__ . '/Supergame/Controller/ControllerHome.php';
require_once __DIR__ . '/Supergame/View/View.php';
require_once __DIR__ . '/Supergame/View/ViewHome.php';

use Utils\Utils;
// use Model\ModelPlayer;
use View\View;
use Controller\ControllerHome;
use View\ViewHome;

$controllerHome = new ControllerHome(new ModelPlayer(Utils::connect()), new ViewHome("Supergames"));
$controllerHome->registerPlayer();
$controllerHome->displayPlayers();
$controllerHome->render();