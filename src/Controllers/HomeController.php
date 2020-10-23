<?php

namespace App\Controllers;

use App\Services\Form;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function showHome(): object
    {
        ob_start();
        $form = new Form();  
        include sprintf(dirname(__DIR__) . '../../views/home.php');        
        return new Response(ob_get_clean());
    }
    
    public function showAdmin(): object
    {    
        $repo = new ContactRepository(DEVDB);
        ob_start();
        $messages = $repo->findAll();
        include sprintf(dirname(__DIR__) . '../../views/admin.php');
        return new Response(ob_get_clean());
    }
}
