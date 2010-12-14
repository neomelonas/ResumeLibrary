<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Experience
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
class Experience extends Professional {

    private $position;

    function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $this->position = $this->thing;
    }

    public function theTest() {
        echo $this->getName();
        echo ' '. $this->getProLoc() . ' '. $this->timeframe ;
    }
}
?>