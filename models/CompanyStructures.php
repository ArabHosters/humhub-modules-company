<?php

/**
 * This is the model class for table "CompanyStructures".
 *
 * The followings are the available columns in table 'CompanyStructures':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $address
 * @property string $type
 * @property integer $country
 * @property integer $parent
 *
 * The followings are the available model relations:
 * @property CompanyStructures $parent_company
 * @property CompanyStructures[] $companyStructures
 */
class CompanyStructures extends CActiveRecord {

    public $membersGuids;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'CompanyStructures';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, description', 'required'),
            array('country, parent', 'numerical', 'integerOnly' => true),
            array('type', 'length', 'max' => 15),
            array('address, membersGuids', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, description, address, type, country, parent', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent_company' => array(self::BELONGS_TO, 'CompanyStructures', 'parent'),
            'companyStructures' => array(self::HAS_MANY, 'CompanyStructures', 'parent'),
            'compan_country' => array(self::BELONGS_TO, 'Country', 'country'),
            'companyMembers' => array(self::HAS_MANY, 'Profile', 'company'),
            'departmentMembers' => array(self::HAS_MANY, 'Profile', 'emp_department'),
            'teamMembers' => array(self::HAS_MANY, 'Profile', 'emp_team'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'address' => 'Address',
            'type' => 'Type',
            'country' => 'Country',
            'parent' => 'Parent',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('parent', $this->parent);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CompanyStructures the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getOptions() {
        return array(
            'Company' => 'Company',
            'Head Office' => 'Head Office',
            'Regional Office' => 'Regional Office',
            'Department' => 'Department',
            'Team' => 'Team',
            'Unit' => 'Unit',
            'Sub Unit' => 'Sub Unit',
            'Other' => 'Other',
        );
    }

    public function afterSave() {
        if ($this->scenario == 'edit') {
            if ($this->type == 'Team') {
                $profiles = Profile::model()->findAllByAttributes(array('emp_team' => $this->id));
                foreach ($profiles as $profile) {
                    $profile->emp_team = '';
                    $profile->save();
                }
            } elseif ($this->type == 'Department') {
                $profiles = Profile::model()->findAllByAttributes(array('emp_department' => $this->id));
                foreach ($profiles as $profile) {
                    $profile->emp_department = '';
                    $profile->save();
                }
            }
            foreach (explode(",", $this->membersGuids) as $membersGuids) {

                // Ensure guids valid characters
                $membersGuids = preg_replace("/[^A-Za-z0-9\-]/", '', $membersGuids);

                // Try load user
                $user = User::model()->findByAttributes(array('guid' => $membersGuids));
                if ($user != null) {
                    $member = Profile::model()->findByPk($user->id);
                    if ($this->type == 'Team') {
                        $member->emp_team = $this->id;
                    } elseif ($this->type == 'Department') {
                        $member->emp_department = $this->id;
                    }

                    $member->save();
                }
            }
        }
    }

    public function populateMembersGuids() {
        $this->membersGuids = "";
        if ($this->type == 'Team') {
            foreach ($this->teamMembers as $member) {
                $this->membersGuids .= $member->user->guid . ",";
            }
        }
        if ($this->type == 'Department') {
            foreach ($this->departmentMembers as $member) {
                $this->membersGuids .= $member->user->guid . ",";
            }
        }
    }

}
