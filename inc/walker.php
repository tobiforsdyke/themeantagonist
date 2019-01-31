<?php

// Collection of Walker classes

class Walker_Nav_Primary extends Walker_Nav_menu {
  //ul generation
  function start_lvl( &$output, $depth ){
    $indent = str_repeat("\t",$depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
  }
  //li a span class generation
  // function start_el(  ){
  //
  // }
  //closing li a and span
  // function end_el(){}

  //closing of the ul
  // function end_lvl(){}
}

?>
