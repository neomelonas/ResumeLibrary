<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Education
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
class Education extends Professional {

    private $degree;

    public function  __construct($ID, $db) {
        parent::__construct($ID, $db);
        $this->degree = $this->thing;
    }
}
