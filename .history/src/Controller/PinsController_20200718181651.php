<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Repository\PinRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(PinRepository $pinRepository) :Response
    {
       
        $pins=$pinRepository->FindBy([], ['createdAt'=> 'DESC']);
        
        return $this->render('pins/index.html.twig',compact('pins'));
    }

    /**
     * @Route("/pins/create", name="app_home")
     */
    public function create() :Response
    {
        $form=$this->createFormBuilder()
            ->add('title')
            ->add('description')
            ->getForm()
        ;

        return $this->render('pins/create.html.twig');
    }

     /**
     * @Route("/pins/{id<[0-9]+>}", name="app_pins_show")
     */
    public function show(Pin $pin) :Response
    {
        return $this->render('pins/show.html.twig', compact('pin'));
    }
}
