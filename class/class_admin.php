<?php 

class admin {
    private $id;
    private $Email;
    private $Password;
    private $super_admin;


    public function __construct( $id, $Email, $Password, $super_admin = "0") 
    {
        $this->id = $id;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->super_admin = $super_admin;
 
    }

    

    



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Get the value of Password
     */ 
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Get the value of super_admin
     */ 
    public function getSuper_admin()
    {
        return $this->super_admin;
    }
}