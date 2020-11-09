<?php

class View {
    
    protected $view_file;
    protected $view_data;
    protected $page_title;
    
    public function __construct( $view_file, $view_data ) {

        $this->view_file = $view_file;
        $this->view_data = $view_data;

    }
    
    public function set_page_title( $title ) {
        $this->page_title = $title;
    }
    
    public function render() {
        if( file_exists( VIEW . $this->view_file . '.phtml' ) ) {
            include VIEW . $this->view_file . '.phtml' ;
        }
        if( file_exists( VIEW . $this->view_file . '.tpl' ) ) {
            include VIEW . $this->view_file . '.tpl' ;
        }
    }
    
    public function get_view_data() {
        return $this->view_data;
    }
    
}