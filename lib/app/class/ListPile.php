<?php
/**
 * @package ResumeLib
 */
/**
 * Description of ListPile
 *
 * @author neo melonas <neo@neomelonas.com>
 * @version 2010-12-15
 * @since 2010-12-15
 */
interface ListPile {
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
    public function makeList($ID, $db, $table);
    /**
     * detailsAsList makes an unordered list of the items generated with makeList
     *
     * @param array $item
     * @return string $theOutput Returns the
     */
    public function detailsAsList($item);
}
