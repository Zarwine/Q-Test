<?php
namespace App\Controllers;

use App\Repository\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;

class ContactsController 
{
    public function createNewMessage(Request $request)
    {  
        $manager = new ContactRepository(DEVDB);

        if (isset($request->request)) {
            if (!empty($request->request)) {

                $username = $request->request->get("username");
                $email = $request->request->get("email");
                $message = $request->request->get("message");
                $ip = $_SERVER['REMOTE_ADDR'];

                $manager->create($username, $email, $message, $ip);
            } else {
                echo "Erreur";
            }
        }

        header("Location: home");
    }

    public function toggleViewedMessageStatut(Request $request)
    {  
        $id = $request->get('id');

        $manager = new ContactRepository(DEVDB);

        $message = $manager->find($id);

        if(!$message) {
            echo "Message non trouvé";
        } else {
            $message->setViewed( ! $message->getViewed() );
            $manager->updateViewed($message);
        }

        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin");
    }
    
}