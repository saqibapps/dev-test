<?php


class urlbuilder {
    
    private $rm_api_domain = 'https://rickandmortyapi.com/' ;
    
    public function buildUrl( $params = false ) {
        
        $url = $this->rm_api_domain . 'api/';
        
        $action = $params['action'];
        
        return $url .= $action ;
    }
    
    public static function getApiUrl() {
        return $this->rm_api_domain;
    }
    
    
}