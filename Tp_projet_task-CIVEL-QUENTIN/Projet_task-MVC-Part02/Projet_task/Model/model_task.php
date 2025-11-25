<?php

function createTask ($bdd,$name_task,$content_task,$date_task,$id_user) {
    try{
        //Prepare
                    $req = $bdd->prepare('INSERT INTO task( name_task, content_task, date_task, id_user) VALUES (?,?,?,?)');

                    $req->bindParam(1,$name_task,PDO::PARAM_STR);
                    $req->bindParam(2,$content_task,PDO::PARAM_STR);
                    $req->bindParam(3,$date_task,PDO::PARAM_STR);
                    $req->bindParam(4,$id_user,PDO::PARAM_INT);

                    // Envoyer la requête
                    $req->execute();

                    

                    return "La tache $name_task a été ajoutée";

    } catch(EXCEPTION $error){
        die($error->getMessage());

    }
}



?>