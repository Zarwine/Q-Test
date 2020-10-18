<?php

namespace App\Controllers;

use App\Services\Form;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function showHome()
    {
        ob_start();
        $form = new Form();
        
        include dirname(__DIR__) . '../../views/header.php';
        include sprintf(dirname(__DIR__) . '../../views/home.php');
        include dirname(__DIR__) . '../../views/footer.php';
        return new Response(ob_get_clean());
    }
    public function showAdmin()
    {    
        $repo = new ContactRepository(DEVDB);
        ob_start();
        $messages = $repo->findAll();
        include dirname(__DIR__) . '../../views/header.php';
        include sprintf(dirname(__DIR__) . '../../views/admin.php');
        include dirname(__DIR__) . '../../views/footer.php';
        return new Response(ob_get_clean());
    }
}
