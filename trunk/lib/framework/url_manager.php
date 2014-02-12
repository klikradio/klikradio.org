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
  
  private $page_id;
  
  private $db;
  
  function __construct($db, $host, $slug)
  {
    $this->db=$db;
    $this->host=$host;
    $this->slug=$slug;
    
    // Query the Database for the requested host
    $result = $this->db->query_to_array("SELECT * FROM `subdomains` INNER JOIN `domains` ON `subdomains`.`domainid`=`domains`.`id` WHERE `host`='" . $host . "'");
    if($result["aliasid"])
    {
      $result = $this->db->query_to_array("SELECT * FROM `subdomains` INNER JOIN `domains` ON `subdomains`.`domainid`=`domains`.`id` WHERE `id`='" . $result["aliasid"] . "'");
    }
    $this->domain_id=$result["domainid"];
    $this->domain=$result["domain"];
    $this->sub_domain_id=$result["id"];
    $this->type=$result["type"];
    $this->status=$result["status"];
    
    $this->get_requested_page();
  }
  
  function get_requested_page()
  {
    // $result = $this->db->query_to_array("SELECT * FROM `pages` WHERE NOT `status`='disabled'");
    $result = $this->db->query("SELECT * FROM `pages` WHERE NOT `status`='disabled'");
    foreach($result as $row)
    {
      
    }
  }
  
  function get_requested_page_id()
  {
    return $this->page_id;
  }
}
