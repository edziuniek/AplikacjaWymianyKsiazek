<?php

namespace FrontendBundle\Controller;

use AppBundle\Entity\Edition;
use AppBundle\Form\EditionFormType;
use Doctrine\ORM\EntityManagerInterface;
use FrontendBundle\Repository\EditionRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class EditionController extends Controller
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var EditionRepository
     */
    private $editionRepository;

    /**
     * EditionController constructor.
     * @param TokenStorageInterface $tokenStorage
     * @param EntityManagerInterface $entityManager
     * @param EditionRepository $editionRepository
     */





    /**
     * @Route("/editions/create", name="editions_create")
     */
    public function createAction(Request $request)
    {
        if(!$this->tokenStorage->getToken()->getUser()->hasRole('ROLE_USER')){
            return $this->redirectToRoute('pages_home');
        }
        $tokenStorage= $request->request->get('tokenStorage');
        $form = $this->createForm(EditionFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->tokenStorage->getToken()->getUser();
            $edition = Edition::create(
                $form->get('title')->getData(),
                $form->get('description')->getData(),
                $form->get('points')->getData(),
                $form->get('fileUrl')->getData(),
                $user
            );

            $this->entityManager->persist($edition);
            $this->entityManager->flush();

            return $this->redirectToRoute('editions_create');
        }

        return $this->render('@Frontend/editions/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
