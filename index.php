<?php

use Utils\Utils;
use Model\ModelPlayer;
use View\ViewHome;
use Controller\ControllerHome;

$controllerHome = new ControllerHome(new ModelPlayer(Utils::connect()), new ViewHome('Salut'));
$controllerHome->registerPlayer();
$controllerHome->displayPlayers();
$controllerHome->render();