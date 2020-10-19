<div class="container main-container">
    <div class="home-title">
        <h1>Bienvenue sur ce test technique</h1>
    </div>
    <img class="home-img" src="https://picsum.photos/1024/512" />
    <div class="form-container">
            <h3>Contactez nous</h3>   
            <form action="new" method="POST">
                <?php $form->setInput(
                 "name",
                 "Nom",
                 "input",
                 "text",
                 "username",
                 "Entrez votre nom"
                 ); ?>
                <?php $form->setInput(
                 "email",
                 "Adresse email",
                 "input",
                 "text",
                 "email",
                 "Entrez votre email"
                 ); ?>
                <?php $form->setInput(
                 "message",
                 "Message",
                 "textarea",
                 "text",
                 "message",
                 "Entrez votre message"
                 ); ?>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
    </div>
</div>
