<div>
    <h1>Connexion</h1>
    <fieldset>
        <form action="/?c=user&a=login" method="post">
            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" minlength="6" maxlength="255" required>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" minlength="8" maxlength="55" required>

            <input type="submit" name="submit" required>
        </form>
    </fieldset>
</div>
