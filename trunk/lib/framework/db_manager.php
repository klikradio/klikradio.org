<?php

/**
 * Handle All Interactions with the Database
 *
 * @author codydaig
 */
class DB {
  private $conn;
  
  private $host;
  private $user;
  private $pass;
  private $name;
  private $persistent;
  
  private $query_count;
  
  // Connect to Database
  function __construct($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB, $PERSISTENT=false)
  {
    $this->host = $SQLHOST;
    $this->user = $SQLUSER;
    $this->pass = $SQLPASS;
    $this->name = $SQLDB;
    $this->persistent = $PERSISTENT;
    
    // Connect to the Database
    if($PERSISTENT)
    {
      $this->conn = mysqli_pconnect($this->host, $this->user, $this->pass, $this->name);
    }
    else
    {
      $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }

    // Check Database Connection
    if (mysqli_connect_errno())
    {
      print "Failed to connect to MySQL: " . mysqli_connect_error();
      die();
    }
  }
  
  // Query the Database
  function query($sql)
  {
    $this->query_count++;
    $query=mysqli_query($this->conn, $sql);
    if($query===FALSE)
    {
      // QUERY FAILED
    }
    return $query;
  }
  
  function get_query_count()
  {
    return $this->query_count;
  }
}
