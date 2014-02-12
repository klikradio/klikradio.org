<?php

/**
 * Description of HomePage
 *
 * @author codydaig
 */
class HomePage extends PAGE {
  function __construct($url)
  {
    parent::__construct($url);
    
    $this->config();
    
    $this->build_page();
  }
  
  function config()
  {
    $this->add_head("<title>YoTesta</title>");
    
    $this->add_content("<h1>SiteTitleCanBeHere</h1>");
    
    $this->add_element('footer');
  }
}
