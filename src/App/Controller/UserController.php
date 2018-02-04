<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 03.02.18
 * Time: 16:54
 */

namespace App\App\Controller;

use App\App\Entity\Users;
use App\App\Form\FilterType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Tests\Compiler\D;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function var_dump;

class UserController extends Controller
{
    /**
     * @Route("/")
     */
    public function showUsers()
    {


        $em = $this->getDoctrine()->getRepository(Users::class);
        $users = $em->findAll();
        $form = $this->createForm(FilterType::class);
//        var_dump($this->getDoctrine()->getManager()->getClassMetadata(Users::class));
        return $this->render('user/show.html.twig', [
            'users' => $users,
            'filter_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/create")
     */
    public function createUser()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $user */
        $user = new Users();

        $user->setEmail('user@mail.com');
        $user->setLastVisit(new DateTime());
        $user->setPassword('0000');
        $user->setRegDate(new DateTime());
        $user->setRole('ROLE_USER');

        $em->persist($user);
        $em->flush();

        return new Response('user was successfully created!', 201);
    }
}