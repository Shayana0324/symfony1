<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController{
    /**
     * @Route("/")
     */
    public function home(){
        return new Response('symfony');
    }
    /**
     * @Route("/NewUpdate/{slug}")
     */

    public function show($slug){

        $items=[
            'new pants',
            'new shirt',
            'new suit set',
            'new skirt',
        ];
        return $this->render('article/show.html.twig',[
            'articles'=> ucwords(str_replace('-',' ',$slug)),
            'items'=>$items,
        ]);

    }
}