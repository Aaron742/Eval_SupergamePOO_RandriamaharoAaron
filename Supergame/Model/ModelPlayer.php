<?php



class ModelPlayer extends Model {
    private ?int $id;
    private ?string $pseudo;
    private ?int $score;
    private ?string $team;
    private ?int $idTeam;
    

    //GETTERS ET SETTERS
    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return ?string
     */
    public function getPseudo(): ?string {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param ?string $pseudo
     *
     * @return self
     */
    public function setPseudo(?string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of score
     *
     * @return ?int
     */
    public function getScore(): ?int {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param ?int $score
     *
     * @return self
     */
    public function setScore(?int $score): self {
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of team
     *
     * @return ?string
     */
    public function getTeam(): ?string {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @param ?string $team
     *
     * @return self
     */
    public function setTeam(?string $team): self {
        $this->team = $team;
        return $this;
    }

    /**
     * Get the value of idTeam
     *
     * @return ?int
     */
    public function getIdTeam(): ?int {
        return $this->idTeam;
    }

    /**
     * Set the value of idTeam
     *
     * @param ?int $idTeam
     *
     * @return self
     */
    public function setIdTeam(?int $idTeam): self {
        $this->idTeam = $idTeam;
        return $this;
    }

    //METHODES
   public function findAll():?array{
        try{
            $req = $this->getBDD()->prepare('SELECT p.id, p.pseudo, p.score, t.id_team FROM player p INNER JOIN team t ON t.id_team = t.id_team');

            //2. Exécution de la requête
            $req->execute();

            //3. Return des données utilisateurs
            return $req->fetchAll(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function findByPseudo():?array{
        try{
            $req = $this->getBDD()->prepare('SELECT p.id, p.pseudo, p.score, t.id_team FROM player p INNER JOIN team t ON t.id_team = t.id_team WHERE p.pseudo = ?');

            $req->bindParam(1, $pseudo, PDO::PARAM_STR);

            //2. Exécution de la requête
            $req->execute();

            //3. Return des données utilisateurs
            return $req->fetchAll(PDO::FETCH_ASSOC);
            
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function add() {
        try {
            $req = $this->getBDD()->prepare('INSERT INTO player(pseudo, score, id_team) VALUES(?, ?, ?)');

            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);

            $req->execute();
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }   
    }

    public function delete() {
        try {
            $req = $this->getBDD()->prepare('DELETE FROM player WHERE id = ?');

            $req->bindParam(1,$this->id,PDO::PARAM_INT);

            $req->execute();
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }   
    }

    public function update() {
        try {
            $req = $this->getBDD()->prepare('UPDATE player SET pseudo =' . $this->pseudo . ', score =' . $this->score . ', id_team =' . $this->idTeam . ' WHERE id = ?');

            $req->bindParam(1,$this->id,PDO::PARAM_STR);

            $req->execute();
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }   
    }

    
}