<?php

namespace App\Controllers;

use App\Services\Validator;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ContactsController
{
    public function createNewMessage(Request $request): object
    {        
        if (isset($request->request)) {
            if (!empty($request->request)) {
                $manager = new ContactRepository(DEVDB);
                $validator = new Validator;
                $errors = [];
                $canGoToDB = true;
                $username = $request->request->get("username");
                $email = $request->request->get("email");
                $message = $request->request->get("message");
                $ip = $request->getClientIp();


                array_push($errors, $validator->isName($username));
                array_push($errors, $validator->isMail($email));
                array_push($errors, $validator->isMessage($message));

                foreach ($errors as $error) {
                    if ($error != NULL) {
                        $canGoToDB = false;
                    }
                }

                if ($canGoToDB === true) {
                    $manager->create($username, $email, $message, $ip);
                } else {
                    foreach ($errors as $error) {
                        if ($error != NULL) {
                            echo $error;
                        }
                    }                    
                }

            } else {
                echo "Erreur";
            }
        }        
        $response = new RedirectResponse('home');
        return $response;        
    }

    public function toggleViewedMessageStatut(Request $request): object
    {
        $id = $request->get('id');
        $manager = new ContactRepository(DEVDB);
        $message = $manager->find($id);

        if (!$message) {
            echo "Message non trouvé";
        } else {
            $message->setViewed(!$message->getViewed());
            $manager->updateViewed($message);
        }
        
        $response = new RedirectResponse("http://" . $request->server->get('HTTP_HOST') . "/admin");
        return $response;
    }
}
