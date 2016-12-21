<?php

/**
 * This is the model class for table "Country".
 *
 * The followings are the available columns in table 'Country':
 * @property integer $id
 * @property string $code
 * @property string $namecap
 * @property string $name
 * @property string $iso3
 * @property integer $numcode
 */
class Country extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Country';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('numcode', 'numerical', 'integerOnly' => true),
            array('code', 'length', 'max' => 2),
            array('namecap, name', 'length', 'max' => 80),
            array('iso3', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, namecap, name, iso3, numcode', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'code' => 'Code',
            'namecap' => 'Namecap',
            'name' => 'Name',
            'iso3' => 'Iso3',
            'numcode' => 'Numcode',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('namecap', $this->namecap, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('iso3', $this->iso3, true);
        $criteria->compare('numcode', $this->numcode);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Country the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
