<?php

include('./Supergame/Utils/Utils.php');
include('./Supergame/Model/Model.php');
include('./Supergame/Model/ModelPlayer.php');
include('./Supergame/View/View.php');
include('./Supergame/View/ViewHome.php');
include('./Supergame/Controller/Controller.php');
include('./Supergame/Controller/ControllerHome.php');

use Utils\Utils;
use Model\ModelPlayer;
use View\ViewHome;
use Controller\ControllerHome;

$controllerHome = new ControllerHome(new ModelPlayer(Utils::connect()), new ViewHome("Supergames"));
$controllerHome->registerPlayer();
$controllerHome->render();