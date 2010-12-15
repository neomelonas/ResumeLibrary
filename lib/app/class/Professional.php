<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Professional
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
abstract class Professional extends Location implements ListPile{

    protected $timeframe;

    public function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $sql = $db->query('SELECT start, end FROM '.thistable.' WHERE id='.$ID.' LIMIT 1');
        /* @var $start DateTime */
        /* @var $end DateTime */
        while($row=$sql->fetch_object()) { $start = $row->start; $end = $row->end;}
        $end = ($end == null) ? 'Present' : date("F, Y", strtotime($end));
        $this->timeframe = ($start == null) ? null : date("F, Y", strtotime($start)). ' &#8211; ' .$end;
    }
    /**
     * makeList creates an array of the details for a given reference id.
     *
     * Right now, it only works for Professional-subtypes, things with Eponyms.
     * [Education | Experience ]
     *
     * @param int $ID
     * @param mysqli $db
     * @param string $table
     * @return array $items
     */
    public function makeList($ID, $db, $table){
        $items = array();
        $counter=0;
        $sql=$db->query('SELECT item, itype FROM `'.$table.'` WHERE refID='.$ID);
        while($row=$sql->fetch_object()) {
            $counter++;
            $items[$counter] = (object) array('item'=>$row->item, 'type'=>$row->itype);
        }
        $items[0] = $counter;
        return $items;
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
        print_r($item);
        for ($counter = 1; $counter < $item[0]; $counter++) {
            $theOutput.= '<li>'.$item[$counter]->item.'</li>';
        }
        $theOutput .= '</ul>';
        return $theOutput;
    }
}
