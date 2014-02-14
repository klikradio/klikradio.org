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
  
  function print_headers()
  {
    $return = "<!DOCTYPE html>\n<html>\n<head>\n";
    foreach ($this->head as $element)
    {
      $return .= $element . "\n";
    }
    return $return;
  }
  
  function print_content()
  {
    $return = "</head>\n<body>\n";
    $return .= '<div id="wrapper">';
    foreach($this->content as $element)
    {
      $return .= $element . "\n";
    }
    return $return;
  }
  
  function print_closing()
  {
    return "</body>\n</html>";
  }
  
  function title()
  {
    return $this->url->get_title;
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
  
  function add_global_headers()
  {
    $this->add_head('<meta charset="utf-8">');
    $this->add_head('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    $this->add_head('<title>Boss-Man</title>');
    $this->add_head('<link href="/css/bootstrap.min.css" rel="stylesheet">');
    $this->add_head('<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">');
    $this->add_head('<link href="/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">');
    $this->add_head('<link href="/css/plugins/timeline/timeline.css" rel="stylesheet">');
    $this->add_head('<link href="/css/sb-admin.css" rel="stylesheet">');
  }
  
  function add_global_foot_scripts()
  {
    $this->add_content('</div>');
    $this->add_content('<script src="/js/jquery-1.10.2.js"></script>');
    $this->add_content('<script src="/js/bootstrap.min.js"></script>');
    $this->add_content('<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>');
    $this->add_content('<script src="/js/plugins/morris/raphael-2.1.0.min.js"></script>');
    $this->add_content('<script src="/js/plugins/morris/morris.js"></script>');
    $this->add_content('<script src="/js/sb-admin.js"></script>');
    $this->add_content('<script src="/js/demo/dashboard-demo.js"></script>');
  }
  
  function build()
  {
    $this->add_global_headers();
    
    print $this->print_headers();
    
    include(LIB_ROOT . '/backend/elements/topbar.php');
    include(LIB_ROOT . '/backend/elements/navbar.php');
    
    $this->add_global_foot_scripts();
    
    print $this->print_content();
    
    print $this->print_closing();
  }
}
