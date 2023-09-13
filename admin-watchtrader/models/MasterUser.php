<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $fullname
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string|null $schoole_name
 * @property int|null $id_grade
 * @property int|null $id_city
 * @property string $authKey
 * @property string $timestamp
 */
class MasterUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_user_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','name', 'email', 'telp'], 'required'],
            [[ 'flag'], 'integer'],
            [['password'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'email' => 'Email',
            'telp' => 'Telp Number',
            'approver' => 'Approver',
            'verificator' => 'Verificator',
            'pic' => 'PIC',
            'created_date' => 'Created Date',
            'flag' => 'Flag',
        ];
    }


    public function getAuthKey(){
        return $this->authKey;
    }

    public function getId(){
        return $this->id;
    }
  
    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password){
        return $this->password === $password;
    }
}
