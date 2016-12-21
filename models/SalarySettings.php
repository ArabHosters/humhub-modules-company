<?php

class SalarySettings extends CFormModel {

    public $late_attendance;
    public $late_attendance_component;
    public $late_attendance_from;
    public $late_attendance_to;
    public $late_attendance_amount;
    public $late_attendance_amount_fixed;
    public $late_attendance_amount_specified;
    public $late_attendance_triger;
    public $late_attendance_note;
    public $absence_add_to;
    public $absence_component;
    public $absence_amount;
    public $absence_triger;
    public $absence_amount_specified;
    public $absence_amount_fixed;
    public $absence_note;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('late_attendance,late_attendance_component,late_attendance_amount, late_attendance_from,late_attendance_to,late_attendance_triger', 'required', 'on' => 'late_attendance'),
            array('absence_add_to,absence_component,absence_amount,absence_triger', 'required', 'on' => 'absence'),
            array('late_attendance_amount_specified, late_attendance_amount_fixed, late_attendance_note, absence_amount_specified, absence_amount_fixed, absence_note', 'safe'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'late_attendance' => 'Add Late attendance deduction to salary component',
        );
    }

}
