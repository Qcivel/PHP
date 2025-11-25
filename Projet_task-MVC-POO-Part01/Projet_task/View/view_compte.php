
<?php
class CompteView{
    //Atribut 
    private string $message='';

    //Constructeur
    public function __construct(){}

    //GETTER ET SETTER
    public function getMessage(): string { return $this->message; }
    public function setMessage(string $message): self { $this->message = $message; return $this; }

    //METHOD
    public function renderCompte (){
        
            $acceuil ="
                <p>Pseudo :  {$_SESSION['nickname']}</p>
                <p>Email :  {$_SESSION['email']}</p>
                <p>Role :  {$_SESSION['role']}</p>

                <h2>Mise à Jour Utilisateur</h2>
                <form action='' method='post'>
                    <label for='firstname'>Prenom :</label><input id='firstname' type='text' name='firstname'>
                    <label for='lastname'>Nom :</label><input id='lastname' type='text' name='lastname'>
                    <input type='submit' name='update' value='Mettre à Jour'>
                </form>
                <p>".$this->getMessage()."</p>";

                return "<h1>Voici Vos Infos</h1>".$acceuil;

    }
}
