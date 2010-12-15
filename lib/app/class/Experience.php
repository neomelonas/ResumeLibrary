<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Experience
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
        $this->details = $this->makeList($itemid, $db, 'listly');
        $this->position = $this->thing;
    }

    public function getDetails(){return $this->details;}

}
