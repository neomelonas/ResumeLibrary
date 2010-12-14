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
abstract class Professional extends Location{

    protected $thing;
    protected $timeframe;

    function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $sql = $db->query('SELECT thing, start, end FROM '.thistable.' WHERE id='.$ID.' LIMIT 1');
        while($row=$sql->fetch_object()) { $this->thing=$row->thing; $start = $row->start; $end = $row->end;}
        $end = ($end == null) ? 'Present' : date("F, Y", strtotime($end));
        $this->timeframe = ($start == null) ? null : date("F, Y", strtotime($start)). ' &#8211; ' .$end;
    }

}
?>
