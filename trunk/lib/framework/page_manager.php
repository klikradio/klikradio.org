<?php

/**
 * Description of page_manager
 *
 * @author codydaig
 */
class PAGE extends Framework{
  private $url;
  
  private $head=array();
  private $content=array();
  
  function __construct($url)
  {
    $this->url=$url;
  }
  
  function add_head($line)
  {
    array_push($this->head, $line);
  }
  
  function add_content($line)
  {
    array_push($this->content, $line);
  }
  
  function get_head()
  {
    return $this->head;
  }
  
  function get_content()
  {
    return $this->content;
  }
  
  function add_element($element)
  {
    require_once(LIB_ROOT . '/pages/elements/' . $element . ".php");
    new $element($this);
  }
  
  function build_page()
  {
    $template = $this->url->get_template();
    require_once(LIB_ROOT . '/pages/templates/' . $template . '.php');
    new $template($this);
  }
}
