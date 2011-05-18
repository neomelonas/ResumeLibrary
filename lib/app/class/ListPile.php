<?php
/**
 * @package ResumeLib
 */
/**
 * Description of ListPile
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-15
 * @since 2010-12-15
 */
class ListPile {
    
    private $items;

    public function __construct($ID, $db, $table, $clause=null) {
        $sql = ($clause == null) ? $db->query('SELECT id, item, itype FROM '.$table.' WHERE refID='.$ID) : $db->query('SELECT id, item, itype FROM '.$table.' WHERE refID='.$ID.' AND itype="'.$clause.'"');
        $this->items = array();
        $counter = 0;
        while ($row = $sql->fetch_object()) {
            $counter++;
            $this->items[$counter] = (object) array ("item" => $row->item, "type" => $row->itype);
        }
        $this->items[0] = $counter;
    }

    /**
     * makeList creates an array of the details for a given reference id.
     *
     * Right now, it only works for Professional-subtypes, things with Eponyms.
     * [Education | Experience]
     *
     * @param int $ID
     * @param mysqli $db
     * @param string $table
     * @return array $items
     */
    public static function makeList($ID, $db, $table, $clause=null) {
        $sql = ($clause == null) ? $db->query('SELECT id, item, itype FROM '.$table.' WHERE refID='.$ID) : $db->query('SELECT id, item, itype FROM '.$table.' WHERE refID='.$ID.' AND itype="'.$clause.'"');
        $items = array();
        $counter = 0;
        while ($row = $sql->fetch_object()) {
            $counter++;
            $items[$counter] = (object) array ("item" => $row->item, "type" => $row->itype);
        }
        $items[0] = $counter;
        return $items;
    }

    public function getListItems() {
        return $this->items;
    }

    /**
     * detailsAsList makes an unordered list of the items generated with makeList
     *
     * @param array $item
     * @return string $theOutput Returns the
     */
    public function detailsAsList($item){
        /** @var $theOutput string For holding output. */
        $theOutput = '<ul>';
        for ($counter = 1; $counter <= $item[0]; $counter++) {
            $theOutput.= '<li>'.$item[$counter]->item.'</li>';
        }
        $theOutput .= '</ul>';
        return $theOutput;
    }
}
