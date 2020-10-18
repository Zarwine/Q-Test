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
        $manager = new ContactRepository(DEVDB);

        $messages = $request->request->get("message");
        $ids = array_keys($messages);

        foreach ($ids as $id) {
            //$message = new Contact();//->find($id);
            $message = $manager->find($id);

            if (!$message) {
                echo "Message non trouvé";
            }
            $message->setViewed( ! $message->getViewed() );

            $manager->updateViewed($message);
        }

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
    
}