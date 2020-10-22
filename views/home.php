<div class="container main-container">
    <div class="home-title">
        <h1>Bienvenue sur ce test technique</h1>
    </div>
    <img class="home-img" src="https://picsum.photos/1024/512" />
    <div class="home-p">
        <p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.

            Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.

            Haec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum longius ea tempestate distinebatur, iussus comes orientis Nebridius contractis undique militaribus copiis ad eximendam periculo civitatem amplam et oportunam studio properabat ingenti, quo cognito abscessere latrones nulla re amplius memorabili gesta, dispersique ut solent avia montium petiere celsorum.
        </p>
        <div class="home-random-element">
            <p>Ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum lon</p>
            <p>Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis,</p>
            <p>Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et </p>
        </div>
    </div>
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
                "Entrez votre message - 50 caractères minimum"
            ); ?>
            <br>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>