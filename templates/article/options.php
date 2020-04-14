<?php

 
public function show($slug){

    $options=[
        'watched movies',
        'pending movies',
        'new movies',
    ];
    
    return $this->render('article/show.html.twig',[
        'articles'=> ucwords(str_replace('-',' ',$slug)),
        'options'=>$options,
    ]);

}
?>