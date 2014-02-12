<?php

/**
 * This page will handle the urls, domains, sub domains, and slugs for the website.
 *
 * @author codydaig
 */
class URL {
  private $domain;
  private $sub_domain;
  private $host;
  private $slug;
  
  private $db;
  
  function __construct($db, $host, $slug)
  {
    $this->db=$db;
    $this->host=$host;
    $this->slug=$slug;
    
    // Query the Database for the requested host
    $result = $this->db->query("SELECT * FROM `subdomains` INNER JOIN `domains` ON `subdomains`.`domainid`=`domains`.`id` WHERE `host`='" . $host . "'");
    var_dump(mysqli_fetch_array($result));
  }
}
