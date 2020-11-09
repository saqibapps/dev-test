<?php

class ApiRequests {
    
    public function get_characters( $page_number = false ) {
        $request = new request();
        $urlbuilder = new urlbuilder();
        $apiservice = new apiservice();
        
        $action = !empty( $page_number ) ? 'character?page=' . $page_number : 'character' ;
        
        $params = array(
            'action' => $action
        );
        
        $request->url = $urlbuilder->buildUrl($params);
        
        $response = $apiservice->apirequest( $request );
        
        return $response;
    }
    
    public function get_character( $id ) {
        $request = new request();
        $urlbuilder = new urlbuilder();
        $apiservice = new apiservice();
        
        $params = array(
            'action' => 'character/'.$id
        );
        $request->url = $urlbuilder->buildUrl($params);
        
        $response = $apiservice->apirequest( $request );
        
        return $response;
    }
    
}