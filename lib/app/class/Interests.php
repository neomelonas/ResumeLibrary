<?php
/**
 * @package ResumeLib
 */
/**
 * Description of Interests
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-14
 * @since 2010-12-14
 */
class Interests extends ListPile {
    
    private $interests;

    public function __construct($ID, $db, $table) {
        $this->interests = $this->makeList($ID, $db, $table, 'itype = "3"');
    }

    public function getInterests(){
        return $this->interests;
    }
}
?>
