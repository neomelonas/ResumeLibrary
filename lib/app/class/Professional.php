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

    function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $sql = $db->query('SELECT thing FROM '.thistable.' WHERE id='.$ID.' LIMIT 1');
        while($row=$sql->fetch_object()) { $this->thing=$row->thing; }
    }

}
?>
