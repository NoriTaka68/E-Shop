<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountPassWordController extends AbstractController
{
    #[Route('/compte/password', name: 'account_password')]
    public function index(): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);
        return $this->render('account/password.html.twig', [
            'controller_name' => 'AccountPassWordController',
            'form' =>$form->createView(),
        ]);
    }
}
