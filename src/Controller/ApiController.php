<?php

namespace App\Controller;

use App\Entity\ListeEntity;
use App\Repository\ListeEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/api", name="api")
 */
class ApiController extends AbstractController
{

    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig');
    }

    /**
     * @Route("/courses", name="courses", methods={"GET"})
     */
    public function courses(ListeEntityRepository $repo): Response
    {
        return $this->json($repo->findAll());
    }

    /**
     * @Route("/course", name="course", methods={"POST"})
     */
    public function course(Request $request, EntityManagerInterface $em): Response
    {
        $obj = $request->getContent();
        $nom = json_decode($obj)->nom;
        $list = new ListeEntity();
        $list->setNom($nom);
        $list->setIsBuy(false);
        $em->persist($list);
        $em->flush();
        return $this->json($list);
    }
}
