<?php
/**
 * @package ResumeLib
 */
/**
 * Description of User
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
class User extends Location{
    
    private $information;

    function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $this->information = (object) array();

        $sql = $db->query('SELECT email, website, twitter FROM user WHERE id='.$ID. ' LIMIT 1');
        while($row=$sql->fetch_object()){
            $this->information->email = $row->email;
            $this->information->web = $row->website;
            $this->information->twitter = '@<a href="http://twitter.com/'.$row->twitter.'">'.$row->twitter.'</a>';
        }
    }
    public function __get($name) {
        return $this->information->$name;
    }
}
?>
