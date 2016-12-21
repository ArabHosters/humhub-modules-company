<?php

/**
 * ProfileFieldTypeEmpStatus handles text area profile fields.
 *
 * @package humhub.modules_core.user.models
 * @since 0.5
 */
class ProfileFieldTypeEmpStatus extends ProfileFieldType {

    /**
     * Rules for validating the Field Type Settings Form
     *
     * @return type
     */
    public function rules() {
        return array(
                #array('maxLength, alphaNumOnly', 'safe'),
        );
    }

    /**
     * Returns Form Definition for edit/create this field.
     *
     * @return Array Form Definition
     */
    public function getFormDefinition($definition = array()) {
        return parent::getFormDefinition(array(
                    get_class($this) => array(
                        'type' => 'form',
                        'title' => Yii::t('UserModule.models_ProfileFieldTypeEmpStatus', 'Text area field options'),
                        'elements' => array(
                        )
        )));
    }

    /**
     * Saves this Profile Field Type
     */
    public function save() {

        $columnName = $this->profileField->internal_name;

        // Try create column name
        if (!Profile::model()->columnExists($columnName)) {
            $sql = "ALTER TABLE profile ADD `" . $columnName . "` int(11);";
            $this->profileField->dbConnection->createCommand($sql)->execute();
        }

        parent::save();
    }

    /**
     * Returns the Field Rules, to validate users input
     *
     * @param type $rules
     * @return type
     */
    public function getFieldRules($rules = array()) {

        $rules[] = array($this->profileField->internal_name, 'safe');

        return parent::getFieldRules($rules);
    }

    /**
     * Return the Form Element to edit the value of the Field
     */
    public function getFieldFormDefinition()
    {
        return array($this->profileField->internal_name => array(
                'type' => 'dropdownlist',
                'class' => 'form-control',
                'items' => $this->getSelectItems(),
                'prompt'=> Yii::t('UserModule.models_ProfileFieldTypeSelect', 'Please select:'),
        ));
    }

    /**
     * Returns a list of possible options
     * 
     * @return Array
     */
    public function getSelectItems()
    {
        $items = CHtml::listData(EmploymentStatus::model()->findAll(), 'id', 'name');
        return $items;
    }

    /**
     * Returns value of option
     * 
     * @param User $user
     * @param Boolean $raw Output Key
     * @return String
     */
    public function getUserValue($user, $raw = true)
    {
        $internalName = $this->profileField->internal_name;
        $value = $user->profile->$internalName;

        if (!$raw) {
            $options = $this->getSelectItems();
            if (isset($options[$value])) {
                return Yii::t($this->profileField->getTranslationCategory(), $options[$value]);
            }
        }

        return $value;
    }
}

?>
