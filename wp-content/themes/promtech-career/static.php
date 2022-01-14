<?php
/*
Template Name: Статический вывод
*/
 get_header();
   $main = new Main();
   echo $main->init('Employee', '', '')->get_single();
get_footer(); ?>
