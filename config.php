<?php
function sentize($string) {
    return htmlentities(strip_tags($string), ENT_QUOTES, 'UTF-8');
}

class DB{

    private $host       = 'localhost';
    private $username   = 'DBusername';
    private $password   = 'y5cWMfohVk8T5twJ';
    private $database   = 'stempro';
    
    protected $Jigo;
    
    public function __construct(){

        if (!isset($this->Jigo)) {
            
            $this->Jigo = new mysqli($this->host, $this->username, $this->password, $this->database);
                      
        }    
        
        return $this->Jigo;
    }
}
?>