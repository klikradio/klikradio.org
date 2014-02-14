<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends Backend{
  
  function __construct($url) {
    parent::__construct($url);
  }
  
  function config()
  {
    $this->add_head("");
  }
  
  function build()
  {
    
  }
}