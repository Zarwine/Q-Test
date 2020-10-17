<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class ContactsController 
{
    public function createNewMessage(Request $request)
    {  
        header("Location: home");
    }
    
}