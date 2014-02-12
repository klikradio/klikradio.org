<?php

/**
 * Description of page_manager
 *
 * @author codydaig
 */
class PAGE extends URL{
  private $url;
  
  function __construct($DB)
  {
    parent::__construct($DB, $_SERVER["HTTP_HOST"], $_SERVER["REQUEST_URI"]);
    
    print $this->get_requested_page_id();
  }
}
