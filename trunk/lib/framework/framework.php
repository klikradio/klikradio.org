<?php

/**
 * Description of framework
 * 
 * The core essentials and functions for the framework
 * (common stuff)
 *
 * @author codydaig
 */
class Framework {
  function printme()
  {
    print "Hello! I'm Cody, and i'm buried in the Framework!";
  }
  
  public static function fix_slashes($str)
  {
    if(is_array($str))
    {
      foreach($str as $key => $value)
      {
        $str[$key]=self::fix_slashes($str[$key]);
      }
      return $str;
    }
    return stripslashes($str);
 }
}
