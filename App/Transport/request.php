<?php

class request {
    
    public $apikey = null;
    public $apipassword = null;
    public $apiauthorization = '';
    public $method = http_verbs::GET;
    public $url = '' ;
    public $protocol = http_protocols::HTTPS;
    public $headers = array();
    public $body = array();
    public $timeout = 8440;
    public $content_type = 'application/json';
    public $content_length = 0;
    
    
    
    public function create_request_header() {
        $this->apikey = null ;
        $this->apipassword = null;
        $this->apiauthorization = '';
        
        $this->request_header($this->apikey, $this->apipassword, $this->apiauthorization);
    }
    
    public function request_header( $apikey, $apipass, $apiauth ) {
        $this->headers = [
            'ApiKey'=> $apikey,
            'ApiPassword' => $apipass,
            'Authorization' => $apiauth,
            'Content-Type' => $this->content_type,
            'Content-Length' => $this->content_length
        ];
    }
    
    public function create_context_request( $emptybody = false  ) {
        
        $this->create_request_header(  );
        
        if ($this->content_type === 'application/json') {
            
            $body = json_encode($this->body);
            $this->headers['Content-Length'] = strlen($body);
        }
        
        $args = array(
            'method' => $this->method,
            'headers' => $this->headers,
            'body' => $body
        );
        
        if( $emptybody == true ) {
            unset($this->headers['Content-Length'] ) ;
            $args = array(
                'method' => $this->method,
                'headers' => $this->headers
            );
        }
        return $args;
    }
    
    
    
    
}