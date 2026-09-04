<?php 


class View {

    private ?string $title;
    private ?string $buffer;

    public function __construct(?string $title = "Supergame"){
        $this->title = $title;
    }

    /**
     * Get the value of buffer
     *
     * @return ?string
     */
    public function getBuffer(): ?string {
        return $this->buffer;
    }

    /**
     * Set the value of buffer
     *
     * @param ?string $buffer
     *
     * @return self
     */
    public function setBuffer(?string $buffer): self {
        $this->buffer = $buffer;
        return $this;
    }

    //METHODES
    public function displayHeader(): View {
        ob_start();
?>
        <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title> <?php echo $this->title ?></title>
                <link rel="stylesheet" href="./src/css/style.css">
            </head>
            <body>
                <header>
                    <nav>
                        <a href="#">Salut</a>
                    </nav>
                </header>
<?php
        $this->buffer = ob_get_clean();
        return $this;
    }

    public function displayFooter(): View {
      ob_start();
?>
            <footer>
               <p> <?php echo "Salut le Monde !" ?> </p>
            </footer>
        </body>
        </html>
<?php 
        $this->buffer = ob_get_clean(); //récupération le contenu du buffer et j'efface le buffer

        return $this;
    }

    public function display():void{
        echo $this->buffer; //affichage du contenu en mémoire tampon
    }
    
}