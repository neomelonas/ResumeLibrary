<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Location
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
class Location extends Eponym {

    private $location; // object from "array"
    private $phone; // int? string? THINK ABOUT IT.

    private $name; //string, only if needed.
    private $location; // object from "array"
    private $phone; // int? string? THINK ABOUT IT.

    function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $this->location = (object) array();
        $sql = $db->query('SELECT street1, street2, city, state, zip, type, phone FROM '.thistable.' WHERE id='.$ID.' LIMIT 1');
        while ($row=$sql->fetch_object()) {
            $this->location->street = $row->street1;
            $this->location->streetalt = $row->street1;
            $this->location->city = $row->city;
            $this->location->state = $row->state;
            $this->location->zip = $row->zip;
            $this->phone = $row->phone;
        }
    }

    public function getLocation() { return $this->location; }
    public function getPhone() { return $this->phone; }

    public function getProLoc() {
        return $this->location->city.', '.$this->location->state;
    }

}
?>
