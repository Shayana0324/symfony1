<?php 
namespace App\Controller;

use App\Entity\Details;
use App\Entity\UserDetails;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleController extends AbstractController{
      /**
      * @Route("/",name="homepage", methods={"GET","POST"})
      */
      public function home(){
          if(isset($_POST)){
            $us_details=new UserDetails();
              $email=$_POST["email"];
              $pw=$_POST["password"];

          }
        return $this->render('article/signup.html.twig');  
      }
      
      /**
     * @Route("/signup/success", name="add_movie", methods={"GET","POST"})
     */
    public function movie(Request $request){
        if(isset($_POST["email_id"])){
        $u_details=new Details();
        $form=$this->createFormBuilder($u_details)
        ->add('movie',TextType::class,array('label'=>'Movie')) 
        ->add('Add',SubmitType::class)
        ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $form->getData();
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($u_details);
            $entityManager->flush();

            return $this->redirectToRoute('add');
        }             
             return $this->render('article/movie.html.twig',array(
                'form' => $form->createView()
                )
             );

    }
}
  
    /**
     * @Route("/login",name="login", methods={"GET","POST"})
     */
    public function login(){
        return $this->render('article/login.html.twig');
    }
     
   /**
    * @Route ("/login/successful", name="show_list")
    */
    public function show(){
        if(isset($_POST["email"])){
        $movie=$this->getDoctrine()->getRepository(Details::class)->findalAll();
        }
        return $this->render('article/all.html.twig',array('movies'=>$movie));
    }

    /**
     * @Route ("/movie/edit/{id}", name="edit_movie", methods={"GET","POST"})
     */
    public function edit(Request $request, $id){
        $u_details=new Details();
        $u_details=$this->getDoctrine()->getRepository(Details::class)->find($id);

        $form = $this->createFormBuilder($u_details)
        ->add('movie', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('save', SubmitType::class, array(
          'label' => 'Update',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('show_list');
      }

      return $this->render('article/edit.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/movie/{id}", name="movie_show")
     */
    public function show_all($id) {
        $u_details = $this->getDoctrine()->getRepository(Details::class)->find($id);
  
        return $this->render('article/show.html.twig', array('movie' => $u_details));
      }

    /**
     * @Route("/movie/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id){
        $u_details = $this->getDoctrine()->getRepository(Details::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($u_details);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();
      }

    

   
}
