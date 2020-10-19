# Réaliser une page de contact en utilisant le pattern MVC

Le but de ce projet est de réaliser 2 pages : 
- Une homepage <br> 
Cette page contient du contenu aléatoire (un titre aléatoire et des paragraphes aléatoires) avec un formulaire de contact en bas de la page. Les champs présents dans ce formulaire seront :
    - Un email obligatoire (et bien formatée)
    - Un nom obligatoire
    - Un message obligatoire (contenant au moins 50 caractères)
<br><br>
- Une page contenant la liste des messages envoyés (provenant du formulaire de contact) <br>
Cette page est un tableau disposé comme ceci :

| Id         | Nom              | Adresse e-mail    | Message                                                                   |                                                                  |
| --         | --               | --                | --                                                                        | --                                                               |
| 1          | Jacques Dupond   | jd@domain.com     |  Bla bla bla [bouton toggle "Afficher plus" / " Afficher moins "]         | [bouton toggle " Marqué comme lu " / " Marqué comme non lu "]    |
| 2          | Eric Martin      | em@domain.com     |  Bla bla bla [bouton toggle "Afficher plus" / " Afficher moins "]         | [bouton toggle " Marqué comme lu " / " Marqué comme non lu "]    |
<br>

Le **bouton toggle " Afficher plus " / " Afficher moins "** doit être fait avec du JavaScript vanilla.<br>
Le **bouton toggle " Marqué comme lu " / " Marqué comme non lu "** renvoie sur une route qui met à jour le contact

## Contraintes techniques 
- Créer une base de données sqlite contenant une seule table `contacts` contenant l'adresse IP du rédacteur du message
- Ne pas utiliser Symfony
- Utiliser seulement le composant HttpFoundation de Symfony (https://github.com/symfony/http-foundation) qui contient l'objet Request et Response
- Utiliser seulement le composant Routing de Symfony (https://github.com/symfony/routing)
- Utiliser cette arborescence :
    - src 
        - Controllers
            - HomeController.php 
            - ContactsController.php
        - Services
            - Form.php (**classe servant à créer le formulaire dans views/home.html.php**)
            - Validator.php (**classe servant à valider les formulaires**)
        - Repository
            - ContactRepository.php (**classe servant à manipuler les contacts**)
    - database (http://www.finalclap.com/faq/170-php-sqlite-pdo)
        - database_dev (**base de données sqlite pour le dév**)
        - database_test (**base de données sqlite pour les tests**)
    - config
        - database.php (**retournant un array qui contient les credentials à la BD**)
    - public
        - index.php (**les routes doivent être déclarées ici**)
    - migrations
        - create_contact_table.php
    - views
        - home.html.php
        - admin
            - contacts.html.php
    - tests (**doit contenir des tests du type : je crée une requête et j'analyse la réponse**)
    - composer.json (**passer par un autoload de type PSR-4 (src/ ==> App\\)** : https://www.grafikart.fr/tutoriels/autoload-php-psr-510)

**Zoom sur le fichier public/index.php**
```php
<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;


//require autoload

//declaration of routes (read the README.md of https://github.com/symfony/routing)

//execution of request (read the README.md of https://github.com/symfony/routing)
//...
if ($parameters) {
    $response = //execute of request from controller 
}
else {
    $response = new Response('Content not found', Response::HTTP_NOT_FOUND, ['content-type' => 'text/html']);
}

$response->send();

```


## Petit plus 
- L'utilisation de Bootstrap et d'avoir les 2 pages assez jolies
- L'utilisation d'un fichier " layout.html.php " qui factorise le tronc commun entre les 2 pages (home.html.php et contacts.html.php)
- Toute autre amélioration divers

## Conclusion
Le projet devra être remis au sein d'un dépôt git avec un fichier README.md clair et concis donnant le plus d'informations possibles pour la bonne exécution du projet.
Si des questions se présentent, je suis disponible par mail : -------.
