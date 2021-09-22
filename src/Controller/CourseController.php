<?php

namespace App\Controller;

use App\Entity\ListeEntity;
use App\Form\CourseFormType;
use App\Repository\ListeEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CourseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ListeEntityRepository $repo, Request $request): Response
    {
        $courses = $repo->findAll();
        $newCourses = new ListeEntity();
        $newCourses->setIsBuy(false);
        $formCourse = $this->createForm(CourseFormType::class, $newCourses);
        $formCourse->handleRequest($request);
        if ($formCourse->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newCourses);
            $em->flush();
            return $this->redirectToRoute('index');
        }
        return $this->render('course/index.html.twig', [
            'courses' => $courses,
            'formCourse'=> $formCourse->createView()
        ]);
    }

    /**
     * @Route("/buy/{id}", name="buy")
     */
    public function buy(ListeEntity $list, ListeEntityRepository $repo, Request $request): Response
    {
        $list->setIsBuy(!$list->getIsBuy());
        $em = $this->getDoctrine()->getManager();
        $em->persist($list);
        $em->flush();
        return $this->index($repo, $request);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(ListeEntity $list, ListeEntityRepository $repo, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($list);
        $em->flush();
        return $this->index($repo, $request);
    }
}
