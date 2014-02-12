<?php

/**
 * This page will handle the urls, domains, sub domains, and slugs for the website.
 *
 * @author codydaig
 */
class URL {
  private $domain;
  private $domain_id;
  private $sub_domain_id;
  private $host;
  private $slug;
  private $type;
  private $status;
  
  private $db;
  
  function __construct($db, $host, $slug)
  {
    $this->db=$db;
    $this->host=$host;
    $this->slug=$slug;
    
    // Query the Database for the requested host
    $result = $this->db->query("SELECT * FROM `subdomains` INNER JOIN `domains` ON `subdomains`.`domainid`=`domains`.`id` WHERE `host`='" . $host . "'");
    $result=  mysqli_fetch_array($result);
    if($result["aliasid"])
    {
      $result = $this->db->query("SELECT * FROM `subdomains` INNER JOIN `domains` ON `subdomains`.`domainid`=`domains`.`id` WHERE `id`='" . $result["aliasid"] . "'");
      $result=  mysqli_fetch_array($result);
    }
    $this->domain_id=$result["domainid"];
    $this->domain=$result["domain"];
    $this->sub_domain_id=$result["id"];
    $this->type=$result["type"];
    $this->status=$result["status"];
  }
  
  }
}
