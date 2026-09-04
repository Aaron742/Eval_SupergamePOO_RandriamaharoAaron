<?php

namespace Model;

use PDO;

class Model {
    //ATTRIBUT
    private PDO $bdd;

    //CONSTRUCTOR
    public function __construct(PDO $bdd){
        $this->bdd = $bdd;
    }

    //GETTER ET SETTER
    public function getBDD():PDO{
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     *
     * @param PDO $bdd
     *
     * @return self
     */
    public function setBdd(PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
}