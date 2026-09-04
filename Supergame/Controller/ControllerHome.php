<?php

class ControllerHome extends Controller {

    //METHODES
    public function displayPlayers() {
        $data = $this->getModel()->findAll();
        $this->getView()->setDatas($data);
        $this->getView()->displayAll();
    }

    public function registerPlayer() {
        //Vérifier si je reçoit le formulaire d'inscription
        if(isset($_POST['submitInscription'])){
            //Vérifier les champs vides
            if(empty($_POST['pseudoInscription']) || empty($_POST['score']) || empty($_POST['team'])){
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return;
            }

            //Nettoyer les données
            $pseudo = Utils::sanitize($_POST['pseudoInscription']);
            $score = Utils::sanitize($_POST['score']);

            //Je vais fournir au modèle ces données
            $this->getModel()->setPseudo($pseudo)->setScore($score)->setIdTeam($_POST['team']);

            //Vérifier si le pseudo est libre
            $data = $this->getModel()->findByPseudo();
            if($data){
                $this->getView()->setMessage("Ce pseudo n'est pas disponible.");
                return;
            }

            //Lancement de l'insertion en BDD
            $this->getModel()->add();

            $this->getView()->setMessage("Vous avez bien été enregistré.");
        }
    }
}