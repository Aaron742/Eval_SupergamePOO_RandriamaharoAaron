<?php
namespace Controller;
include('./Supergame/Model/Model.php');
include('./Supergame/View/View.php.php');

use Model\Model;
use View\View;

class Controller {
    private Model $model;
    private ?View $view;

    /**
     * Get the value of model
     *
     * @return Model
     */
    public function getModel(): Model {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param Model $model
     *
     * @return self
     */
    public function setModel(Model $model): self {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of view
     *
     * @return ?View
     */
    public function getView(): ?View {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @param ?View $view
     *
     * @return self
     */
    public function setView(?View $view): self {
        $this->view = $view;
        return $this;
    }

    public function render():void{
        //1. Appel du model pour récupérer les données des articles
        $data = $this->model->findAll();

        //2.Passage des data à la View et son Appel pour afficher les data traitées
        $this->view->setDatas($datas)->displayAll();
    }
}