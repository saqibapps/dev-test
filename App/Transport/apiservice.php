<?php



class apiservice {
    
    public function api_remote_request ( $url, $params ) {
        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ['data'=>$output, 'code'=>$code];
    }
    
    
    public function apirequest( request $request ) {
        
        if( $request->url != null ) {
            
            if( $request->method == http_verbs::GET ) {
                $args = $request -> create_context_request( $emptybody = true ) ;
            } else {
                $args = $request -> create_context_request( ) ;
            }
        }
        
        $response = $this->api_remote_request( $request->url, $args );
        $response = $this->process_response($response);
        
        return $response;
    }
    
    public function process_response( $response ) {
        
        $response_code = isset( $response ) ? $response['code'] : null ;
        $response_data = isset( $response ) ? $response['data'] : null ;
        
        //messaging
        //error handling
        
        return (object) [ 'response_code' => $response_code, 'response_data' => $response_data, 'Errors'=>'Errors' ];
    }
    
}