<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Experience
 *
 * To get all expIDs, SELECT id FROM names n INNER JOIN user_pro up ON up.pro_id=n.id WHERE up.user_id='.$ID.' ORDER BY `end`
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-15
 * @since 2010-12-14
 */
class Experience extends Professional {

    private $position;
    private $details;

    public function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $itemid = $this->getId();
        $this->details = $this->makeList($itemid, $db, 'listly', 'itype=2');
        $this->position = $this->thing;
    }

    public function getDetails(){return $this->details;}

}
