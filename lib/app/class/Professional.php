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
abstract class Professional extends Location {

    protected $timeframe;
    /**
     *
     * @param int $ID
     * @param mysqli $db The database connection. Mysqli ONLY, 'cause.
     */
    public function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $sql = $db->query('SELECT start, end FROM names n INNER JOIN user_pro up ON up.pro_id=n.id WHERE up.user_id='.$ID.' ORDER BY `end`');
        /* @var $start DateTime */
        /* @var $end DateTime */
        while($row=$sql->fetch_object()) { $start = $row->start; $end = $row->end;}
        $start = ($start == null) ? null : date("F, Y", strtotime($start));
        $end = ($end == null) ? 'Present' : date("F, Y", strtotime($end));
        $this->timeframe = ($start != $end) ? $start . ' &#8211; ' .$end : $start;
    }
}
