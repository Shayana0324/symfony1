<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController{
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
        return new Response(sprintf(
            'future page to add orders"%s"!',
            ucwords(str_replace('-',' ',$slug))
        ));

    }
}