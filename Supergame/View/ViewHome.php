<?php
namespace View;


class ViewHome extends View {
    private ?string $message = '';
    private ?array $datas;

    public function setMessage(?string $message): self {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the value of datas
     *
     * @return ?array
     */
    public function getDatas(): ?array {
        return $this->datas;
    }

    /**
     * Set the value of datas
     *
     * @param ?array $datas
     *
     * @return self
     */
    public function setDatas(?array $datas): self {
        $this->datas = $datas;
        return $this;
    }

    public function displayMain(): ViewHome {
        ob_start();
?>
            <main>
                <h2>Ajout de joueur</h2>
                    <form action="" method="post">
                        <label for="pseudoInscription">Votre Pseudo<input type="text" id="pseudoInscription" name="pseudoInscription"></label>
                        <label for="score">Votre score<input type="text" id="score" name="score"></label>
                        <select name="team" id="team">
                            <option value="">--Veuillez choisir une option--</option>
                            <option value="1">Aucune</option>
                            <option value="2">Dream Team</option>
                            <option value="3">Team Rocket</option>
                        </select>
                        <input type="submit" name="submitInscription" value="S'enregistrer">
                    </form>
                    <p><?php echo $this->message ?></p>
            <h2>Liste des joueurs</h2>
                <ul>
<?php  
                // inclusion de la boucle foreach effectuer en 1. (plus haut) au sein du template HTML mis en buffer
                foreach($this->getDatas() as $row){
?>
                    <li>Pseudo : <?= $row['pseudo'] ?> - Score : <?= $row['score'] ?> - Equipe : <?= $row['team'] ?></li>
<?php    
                }
?>
                </ul>
            </main>
        
<?php
        //Récupération du buffer dans la propriété $this->buffer
        $this->setBuffer(ob_get_clean());
        return $this;
    }

    public function displayAll(): void {
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}