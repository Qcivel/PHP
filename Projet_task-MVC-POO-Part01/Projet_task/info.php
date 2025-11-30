<?php
//Démarer la Session
session_start();

//IMPORT DE RESSOURCE
include './Model/UsersModel.php';
include './utils/functions.php';
include './View/header.php';
include './View/view_compte.php';
include './View/footer.php';

class InfoController {
    //ATTRIBUTS
    private string $title = 'Mon Compte Utilisateur';
    private string $style ='./src/style/style-info.css';
    private string $message='';
    private string $firstname='';
    private string $lastname='';
    private Users $model;
    private Header $header;
    private CompteView $compte;
    private Footer $footer;

    

    //CONSTRUCTEUR
    public function __construct(){
        $this->model = new Users(new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)));

        $this->header = new Header();
        $this->compte = new CompteView();
        $this->footer = new Footer();

    }
    //GETTER ET SETTER


    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of style
     *
     * @return string
     */
    public function getStyle(): string {
        return $this->style;
    }

    /**
     * Set the value of style
     *
     * @param string $style
     *
     * @return self
     */
    public function setStyle(string $style): self {
        $this->style = $style;
        return $this;
    }

    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the value of firstname
     *
     * @return string
     */
    public function getFirstname(): string {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname(string $firstname): self {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get the value of lastname
     *
     * @return string
     */
    public function getLastname(): string {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param string $lastname
     *
     * @return self
     */
    public function setLastname(string $lastname): self {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get the value of model
     *
     * @return Users
     */
    public function getModel(): Users {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param Users $model
     *
     * @return self
     */
    public function setModel(Users $model): self {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of header
     *
     * @return Header
     */
    public function getHeader(): Header {
        return $this->header;
    }

    /**
     * Set the value of header
     *
     * @param Header $header
     *
     * @return self
     */
    public function setHeader(Header $header): self {
        $this->header = $header;
        return $this;
    }

    /**
     * Get the value of compte
     *
     * @return CompteView
     */
    public function getCompte(): CompteView {
        return $this->compte;
    }

    /**
     * Set the value of compte
     *
     * @param CompteView $compte
     *
     * @return self
     */
    public function setCompte(CompteView $compte): self {
        $this->compte = $compte;
        return $this;
    }

    /**
     * Get the value of footer
     *
     * @return Footer
     */
    public function getFooter(): Footer {
        return $this->footer;
    }

    /**
     * Set the value of footer
     *
     * @param Footer $footer
     *
     * @return self
     */
    public function setFooter(Footer $footer): self {
        $this->footer = $footer;
        return $this;
    }
    //METHODS
    public function update(){
        //TRAITEMENT DU FORMULAIRE DE MISE A JOUR
        if(isset($_POST['update'])){
            $firstname = '';
            $lastname = '';

            if(!empty($_POST['firstname'])){
                $firstname = sanitize($_POST['firstname']);
            }
            if(!empty($_POST['lastname'])){
                $lastname = sanitize($_POST['lastname']);
            }

            //Création de l'objet de connexion
            $user = $this->getModel();

            //Création de l'objet Users à partir de la class Users
            // $user = new Users($bdd);

            //Je remplis mon objet avec les données dont j'ai besoin
            $user->setFirstname($firstname)->setLastname($lastname)->setIdUser($_SESSION['id']);

            //J'utilise la méthode de l'objet updateUser() pour qu'il mette à jour les données de mon utilisateur en BDD
            $message = $user->updateUser();
        }
    }

        public function displayInfo(){
            //Lancement des traitements des formulaires
            $this->update();

            //Lancement de l'affichage du header
            echo $this->getHeader()->setTitle($this->getTitle())->setStyle($this->getStyle())->renderHeader();

            //Lancement de l'affichage de l'info
            echo $this->getCompte()->setMessage($this->getMessage())->renderCompte();

            //Lancement de l'affichage du footer
            echo $this->getFooter()->setContent("<p>Bienvenue sur l'Accueil de info</p>")->renderFooter();

        }
    
}


$compte = new InfoController();
$compte->displayInfo();




?>

