<?php

/**
 * Description of session_manager
 *
 * @author codydaig
 */

class Session {
  private $loggedin;
  // private $permissions;
  
  private $db;
  
  function __construct($db)
  {
    $this->db=$db;
    $this->loggedin = $this->is_logged_in();
  }
  
  function is_logged_in()
  {
    return true;
  }
  
  function get_user_id()
  {
    return 1;
  }
  
  function has_permission($page)
  {
    $pid = $page->get_permissions();
    $uid = $this->get_user_id();
    
    $result = $this->db->query("SELECT * FROM `permissions_access` WHERE `pid`='" . $pid . "' && `uid`='" . $uid . "'");
    if(mysqli_num_rows($result)>0)
    {
      return true;
    }
    return false;
  }
}
