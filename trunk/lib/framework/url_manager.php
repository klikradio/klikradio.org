<?php

/**
 * This page will handle the urls, domains, sub domains, and slugs for the website.
 *
 * @author codydaig
 */
class URL extends Framework{
  private $domain;
  private $domain_id;
  private $sub_domain_id;
  private $host;
  private $slug;
  private $type;
  private $status;
  
  private $page_id;
  private $page;
  
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
    
   $this->page=$this->get_requested_page();
  }
  
  function get_requested_page()
  {
    // $result = $this->db->query_to_array("SELECT * FROM `pages` WHERE NOT `status`='disabled'");
    $result = $this->db->query("SELECT * FROM `pages` WHERE NOT `status`='disabled'");
    
    foreach($result as $row)
    {
      if($row["slug"] == $this->slug)
      {
        return $row;
      }
      else if((substr_count($row["slug"], "/") == substr_count($this->slug, "/")) && (preg_match($this->create_slug_regex($row["slug"]), $this->slug)))
      {
        return $row;
      }
    }
    $this->error_404();
    return NULL;
  }
  
  function get_requested_page_id()
  {
    return $this->page["id"];
  }
  
  function create_slug_regex($subject)
  {
    $finalpattern = '/\/';
    
    $pieces = explode("/", substr($subject, 1, -1));
    foreach($pieces as $piece)
    {
      if($piece == "*")
      {
        $finalpattern = $finalpattern . "[a-z0-9]*";
      }
      else
      {
        $letters = str_split($piece);
        foreach($letters as $letter)
        {
          $finalpattern = $finalpattern . "[" . $letter . "]";
        }
      }
      
      $finalpattern = $finalpattern . "\/";
    }
    $finalpattern = $finalpattern . '/';
    return $finalpattern;
  }
  
  function error_404()
  {
    print '404 - Page can not be found';
  }
}
