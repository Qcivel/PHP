


<h1>Mes taches</h1>

<form action="" method="post">
    <label for="name_task">Tache à ajouter :</label>
    <input type="text" name="name_task" id="name_task">
    <label for="content_task" name="content_task" id="content_task" >Contenu :</label>
    <input type="text" name="content_task" id="content_task">
    <label for="date_task" >Date de la tache :</label>
    <input type="date" name="date_task" id="date_task">
    <input type="submit" name="addTask" value="Ajouter">
</form>
<?php echo $message ?>

