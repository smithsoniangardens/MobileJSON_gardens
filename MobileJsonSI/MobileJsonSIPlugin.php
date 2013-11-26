<?php

class MobileJsonSIPlugin extends Omeka_Plugin_AbstractPlugin
{
   protected $_filters = array(
      'response_contexts',
      'action_contexts' );

   public function filterResponseContexts( $contexts )
   {
      $contexts['mobile-json'] = array(
         'suffix' => 'mjson',
         'headers' => array( 'Content-Type' => 'application/json' ) );
      return $contexts;
   }

   public function filterActionContexts( $contexts, $args ) {
      $controller = $args['controller'];

      if( is_a( $controller, 'ItemsController' ) or
          is_a( $controller, 'TourBuilder_ToursController' ) )
      {
         $contexts['browse'][] = 'mobile-json' ;
         $contexts['show'][] = 'mobile-json' ;
      }

      return $contexts;
   }
}