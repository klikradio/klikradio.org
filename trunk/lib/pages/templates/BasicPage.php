<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasicPage
 *
 * @author codydaig
 */
class BasicPage {
  function __construct($page)
  {
    print '<!html>';
    
    print '<head>';
    foreach($page->get_head() as $element)
    {
      print $element . "\n";
    }
    print '</head>';
    print '<body>';
    
    foreach($page->get_content() as $element)
    {
      print $element . "\n";
    }
    
    print '</body>';
    print "</html>";
  }
}
