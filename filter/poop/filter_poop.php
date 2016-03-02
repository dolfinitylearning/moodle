<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Filter converting emoticon texts into images
 *
 * This filter uses the emoticon settings in Site admin > Appearance > HTML settings
 * and replaces emoticon texts with images.
 *
 * @package    filter
 * @subpackage emoticon
 * @see        emoticon_manager
 * @copyright  2010 David Mudrak <david@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class filter_poop extends moodle_text_filter {

    /**
     * Apply the filter to the text
     *
     * @see filter_manager::apply_filter_chain()
     * @param string $text to be processed by the text
     * @param array $options filter options
     * @return string text after processing
     */
    public function filter($text, array $options = array()) {
      
      $text = str_replace('shit', 'poop', $text);
      return $text;

        if (!isset($options['originalformat'])) {
            // if the format is not specified, we are probably called by {@see format_string()}
            // in that case, it would be dangerous to replace text with the image because it could
            // be stripped. therefore, we do nothing
            return $text;
        }
        if (in_array($options['originalformat'], explode(',', get_config('filter_emoticon', 'formats')))) {
            $this->replace_emoticons($text);
        }
        return $text;
    }


}
