<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Coursework
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-16
 * @since 2010-12-16
 */
class Coursework extends ListPile {

    private $interests;

    public function __construct($ID, $db, $table) {
        $this->interests = $this->makeList($ID, $db, $table, 'itype = "4"');
    }

    public function getCourses(){
        return $this->interests;
    }
}
?>
