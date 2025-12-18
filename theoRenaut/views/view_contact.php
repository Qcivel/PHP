
    <h1>Contact</h1>

    <form action="" class="formulaire" method="prost">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="Votre nom" required minlength="2" maxlength="30">
        
        <label for="prénom">Prénom :</label>
        <input type="text" id="prénom" name="prénom" placeholder="Votre prénom" required minlength="2" maxlength="30">
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="exemple@mail.com" required>

        <label for="tel">Téléphone :</label>
        <input type="tel" id="tel" name="tel" pattern="0[0-9]{9}" placeholder="0123456789">
        
        <label for="message">Message :</label>
        <textarea id="message" name="message" placeholder="Votre message..." required rows="4"></textarea>
        
        <button type="submit" class="btn-form">Envoyer</button>
    </form>



    </div>

