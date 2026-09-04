<?php
namespace Controller;


class ControllerHome extends Controller {

    //METHODES
    public function displayPlayers() {
        $data = $this->getModel()->findAll();
        $this->getView()->setDatas($data);
        $this->getView()->displayAll();
    }

    public function registerPlayer() {
        if(isset($_POST['submitInscription'])){
            //Vérifier les champs vides
            if(empty($_POST['pseudoInscription']) || empty($_POST['score']) || empty($_POST['team'])){
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return;
            }

            $pseudo = Utils::sanitize($_POST['pseudoInscription']);
            $score = Utils::sanitize($_POST['score']);

            $this->getModel()->setPseudo($pseudo)->setScore($score)->setIdTeam($_POST['team']);

            $data = $this->getModel()->findByPseudo();
            if($data){
                $this->getView()->setMessage("Ce pseudo n'est pas disponible.");
                return;
            }

            $this->getModel()->add();

            $this->getView()->setMessage("Vous avez bien été enregistré.");
        }
    }
}