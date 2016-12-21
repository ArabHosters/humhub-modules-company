<?php

/**
 * @package humhub.modules_core.admin.forms
 * @since 0.5
 */
class ImapMailingSettingsForm extends CFormModel {

    public $imapusername;
    public $imappassword;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('imapusername, imappassword', 'required'),
            array('imapusername, imappassword', 'length', 'max' => 255),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'imapusername' => Yii::t('AdminModule.forms_MailingSettingsForm', 'Username'),
            'imappassword' => Yii::t('AdminModule.forms_MailingSettingsForm', 'Password'),
        );
    }

}
