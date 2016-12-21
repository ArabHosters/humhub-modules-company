<?php

/**
 * This is the model class for table "fetchmail_comment".
 *
 * The followings are the available columns in table 'fetchmail_comment':
 * @property integer $id
 * @property string $message
 * @property string $object_model
 * @property integer $object_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class FetchmailComment extends HActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'fetchmail_comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('message, object_model, object_id, created_at, created_by, updated_at, updated_by', 'required'),
            array('object_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('object_model', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, message, object_model, object_id, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(static::BELONGS_TO, 'User', 'created_by')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'message' => 'Message',
            'object_model' => 'Object Model',
            'object_id' => 'Object',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
        $criteria->compare('message', $this->message, true);
        $criteria->compare('object_model', $this->object_model, true);
        $criteria->compare('object_id', $this->object_id);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FetchmailComment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Checks if this content addon can be changed
     * 
     * @return boolean
     */
    public function canWrite()
    {
        if ($this->created_by == Yii::app()->user->id) {
            return true;
        }

        return false;
    }
    
    public function canDelete()
    {
        if ($this->created_by == Yii::app()->user->id) {
            return true;
        }

        return false;
    }
    
}
