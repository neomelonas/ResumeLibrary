<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Eponym
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
class Eponym {

    private $id; // int
    private $first; // string
    private $middle; // string
    private $last; // string
    private $professional; // string
    private $mAn; // bool
    private $type; // bool
    
    function __construct($ID, $db) {
        $this->id = $ID;
        $sql = $db->query('SELECT name, type, mAn FROM '.thistable.' WHERE id='.$ID.' LIMIT 1');
        while($row=$sql->fetch_object()) { $this->makeName($row->type, $row->name, $row->mAn); }
    }

    private function getFirstName() {
        return $this->first;
    }
    private function getMiddleName() {
        $mname = ($this->mAn) ? '"'.$this->middle.'"' : $this->middle;
        return $mname;
    }
    private function getLastName() {
        return $this->last;
    }
    private function getMAN() {
        return $this->mAn;
    }
    private function getProfessional() {
        return $this->professional;
    }

    private function makeName($p, $n, $m) {
        $this->type = $p;
        if ($p) { // True means person.
            $this->mAn = $m;
            $name = explode(".",$n);
            $this->first = $name[0];
            $this->middle = $name[1];
            $this->last = $name[2];
        }
        else { // Else means Business/Educational thing.
            $this->professional = $n;
        }
    }

    /**
     * getName returns the object's name, be it a person or a place.
     *
     * @param string $style What kind of name do we want?<br>Accepts long | short | link
     * @return string Returns a name
     */
    public function getName($style = 'long') {
        if ($this->type) {
            switch ($style) {
                case 'short':
                    $rname = $this->getFirstName(). ' ' . $this->getLastName();
                    break;
                case 'link':
                    $rname = strtolower(substr($this->getFirstName(),0,1)). ' ' .strtolower(substr($this->getMiddleName(),0,1)) . ' ' . strtolower($this->getLastName());
                    break;
                default:
                    $rname = $this->getFirstName(). ' ' .$this->getMiddleName() . ' ' . $this->getLastName();
                    break;
            }
        }
        else $rname = $this->professional;
        return $rname;
    }
}
