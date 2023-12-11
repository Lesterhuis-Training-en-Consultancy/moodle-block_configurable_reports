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
 * Configurable Reports a Moodle block for creating customizable reports
 *
 * @copyright  2020 Juan Leyva <juan@moodle.com>
 * @package    block_configurable_reports
 * @author     Juan leyva <http://www.twitter.com/jleyvadelgado>
 */
class plugin_roleusersn extends plugin_base {

    public function init(): void {
        $this->fullname = get_string('roleusersn', 'block_configurable_reports');
        $this->type = 'numeric';
        $this->form = true;
        $this->reporttypes = ['courses'];
    }

    /**
     * Summary
     *
     * @param object $data
     * @return string
     */
    public function summary(object $data): string {
        return format_string($data->columname);
    }



    // Data -> Plugin configuration data.
    // Row -> Full course row c->id, c->fullname, etc...
    public function execute($data, $row, $user, $courseid, $starttime = 0, $endtime = 0) {
        $courseid = $row->id;
        $context = cr_get_context(CONTEXT_COURSE, $courseid);

        return count_role_users($data->roles, $context);
    }

}
