<?php

namespace App\Controller;

use App\Repository\ConferenceRepository;//
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;//

class ConferenceController extends AbstractController
{
    // #[Route('/conference', name: 'app_conference')]
    #[Route('/', name: 'homepage')]
   
    public function index(Environment $twig, ConferenceRepository $conferenceRepository): Response
    // public function index(Request $request): Response
    {
        // $greet = '';
        // if ($name = $request->query->get('hello')) {
        //     $greet = sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
        // }

        // return new Response(<<<EOF
        //     <html>
        //         <body>
        //             $greet
        //             <img src="/images/under-construction.gif" />
        //         </body>
        //     </html>
        //     EOF
        // );
        return new Response($twig->render('conference/index.html.twig', [
                'conferences' => $conferenceRepository->findAll(),
        ]));
    }
}