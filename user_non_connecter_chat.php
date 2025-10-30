<?php if ($isLogged): ?>
    <form method="POST" action="">
        <input type="text" name="message" placeholder="Écrivez votre message..." required>
        <button type="submit">Envoyer</button>
    </form>
<?php else: ?>
    <p style="text-align:center; color:gray; font-style:italic;">
        Connectez-vous pour envoyer un message.
    </p>
<?php endif; ?>
