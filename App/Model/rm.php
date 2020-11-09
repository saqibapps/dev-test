<?php

class rm {
    
    public function getCharacters( $atts = false ) {

        $api_request = new ApiRequests();
        
        $data = [];
        if (isset( $atts ) && !empty( $atts['page_number' ] ) ) {
            $response = $api_request -> get_characters( $atts['page_number'] ) ;
        } else {
            $response = $api_request -> get_characters( ) ;
        }

        $response = $response->response_data;
        $response = json_decode( $response );
        
        $chars = []; 
        foreach ( $response->results as $k => $char ) {
            $url = '/rm/character/' . $char->id;
            $chars[$char->id] = ['name'=>$char->name, 'image'=>$char->image, 'url'=>$url ] ;
        }

        if( !empty($response->info->prev) ) {
            $prev =  '/rm/characters/page/' . (string)($atts['page_number']-1);
        } else {
            $prev = '';
        }
        
        if( !empty($response->info->next) ) {
            $next = '/rm/characters/page/' . (string)($atts['page_number']+1);
        } else {
            $next = '';
        }
        
        $data['chars'] = $chars;
        $data['info'] = [ 'count' => $response->info->count, 'pages'=>$response->info->pages, 'prev' => $prev, 'next' => $next ];

        return $data;
    }
    
    public function getCharacter( $id ) {

        $api_request = new ApiRequests();
        $response = $api_request->get_character( $id ) ;        
        $char_response = json_decode( $response->response_data );

        $charid = $char_response->id;
        $charname = $char_response->name;
        $charimage = $char_response->image;
        $charurl = $char_response->url;
        $chargender = $char_response->gender;
        $charspecies = $char_response->species;
        $charstatus = $char_response->status;
        $charepisodes = $this->process_episodes( $char_response->episode );

        $chars = ['id'=>$charid,'name'=>$charname, 'image'=>$charimage, 'url'=>$charurl,
                    'gender'=> $chargender, 'species'=>$charspecies, 'status' => $charstatus, 'episodes' => $charepisodes
        ] ;

        

        return $chars;
    }
    
    
    public function process_episodes( $episodes ) {

        $eps = [] ;
        
        foreach ( $episodes as $k => $url ) {
            
            $tx=explode('/',$url);

            $eps[] = [ 'episode_num'=>$tx[5], 'url'=>$url ];
        }
        
        return $eps;
    }
    
    
    /*public function smarty_implemetation() {
        
        require_once 'App/libs/smarty/libs/Smarty.class.php';
        $smarty = new Smarty();
        $smarty->template_dir = "../App/View";
        $smarty->compile_dir = '../App/View/tmp';
        
        $smarty->assign( 'character', $chars ) ;
        $chars['smarty'] = $smarty ;
        
    }*/

}

























