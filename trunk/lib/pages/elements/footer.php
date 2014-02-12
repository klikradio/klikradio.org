<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of footer
 *
 * @author codydaig
 */
class footer extends PAGE{
  function __construct($page)
  {
    $page->add_content('The Generic Footer For Every Page &copy; 2014');
  }
}
