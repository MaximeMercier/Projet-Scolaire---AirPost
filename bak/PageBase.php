<?php
class PageBase {
    private $style=array();//tableau pour y mettre les styles à charger
    private $script=array();
    private $titre;
    private $entete;
    private $menu;
    private $contenu;
    private $pied ;

    public function __construct($t){
        $this->titre = $t;
    }

    public function setContenu($c){
        $this->contenu = $c;
    }
    public function getContenu(){
        Return $this->contenu ;
    }

    //manière PHP de faire les accesseurs de type SET
    public function __set($propriete, $valeur){
        switch ($propriete){
            case 'style':{
                $this->style[count($this->style)] = $valeur;
                break;
            }
            case 'script':{
                $this->script[count($this->script)] = $valeur;
                break;
            }
            case 'titre':
                {
                    $this->titre = $valeur;
                    break;
                }
            case 'contenu':{
                    $this->contenu = $valeur;
                    break;
            }
        }
    }


    /**************Gestion des styles **************************/
    /* Insertion des feuilles de style */
    private function affiche_style(){

        foreach ($this->style as $s){
            echo "<link rel='stylesheet' type='text/css' href='Style/".$s.".css'/>\n";
        }
    }
    /********************Gestion des scripts ********************/
    /* Insertion des script JAVASCRIPT */
    private function affiche_script() {
        foreach ($this->script as $s) {
            echo "<script type='text/javascript' src='Script/".$s.".js'></script>\n";
        }
    }
    /***********Gestion de l'entete ***************************/
    protected function affiche_entete() {
        $this->entete = '<header>BTS S.I.O (Services Informatiques aux Organisations)</header>';
        echo $this->entete ;

    }
    /********Gestion du pied de page ************************/
    private function affiche_pied_page() {
        $this->pied ='<footer>copyright Lycée Chevrollier - étudiants de première année SLAM</footer>	' ;
        echo $this->pied ;


    }
    /************Gestion du menu ***********************/
    //protected car elle sera modifiée dans la classe mère
    public function affiche_menu() {

        $this->menu='<ul>
				<li><a href="index.php">Accueil</a></li>
			</ul>';
        echo $this->menu;
    }

    public function afficher(){
        ?>
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <title> <?php echo $this->titre;?> </title>
            <meta charset="UTF-8" />
            <meta name="keywords" lang="fr" content="BTS,SIO,informatique,etude, technicien" />
            <meta name="description" content="Description du BTS Services Informatiques aux Organisations (S.I.O)." />
            <?php $this->affiche_style();?>
            <?php $this->affiche_script();?>
        </head>
        <body>

        <div id="global">
            <div id="entete"><?php $this->affiche_entete();?></div>
            <div id="centre">
                <div id="navigation">
                    <?php $this->affiche_menu();?>
                </div>
                <div id="contenu">
                    <?php echo $this->contenu;?>

                    <?php $this->affiche_pied_page();?>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
    }
}
?>