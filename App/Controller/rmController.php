<?php

class rmController extends Controller {
    
    public function index( $id=false, $name=false ) {
        
        $this -> view( 'rm/index' ) ;
        $this -> view -> set_page_title( 'Rick and Morty' );
        $this -> view -> render();
    }
    
    public function characters ($id=false , $page_number = false) {
        $atts = ['id'=>$id, 'page_number'=>$page_number];
        $this->model('rm');
        $this->view( 'rm' . DIRECTORY_SEPARATOR . 'characters', [ 'characters' => $this->model->getCharacters($atts)] ) ;
        $this->view->render();
    }
    
    public function character( $id ) {
        $this->model('rm');
        $this->view( 'rm' . DIRECTORY_SEPARATOR . 'character', [ 'character' => $this->model->getCharacter( $id )] ) ;
        $this->view->render();
    }
    
    
    
}