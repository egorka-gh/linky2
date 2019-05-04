<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /*
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    */
    
    const ROLE_USER = 10;
    const ROLE_ADMIN = 100;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'firstname', 'lastname', 'email', 'pass'], 'required'],
            [['level'], 'integer'],
            [['id', 'firstname', 'lastname', 'email', 'avatar'], 'string', 'max' => 50],
            [['pass', 'info'], 'string', 'max' => 255],
            ['email', 'email'],
            [['email'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'pass' => 'Pass',
            'avatar' => 'Avatar',
            'info' => 'Info',
            'level' => 'Role',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function avartas()
    {
        $rows = array();
        $files = array_slice(scandir('../web/img/user/'), 2);
        $pattern = '/\w+(\.png)$/ui';
        for ($i = 0; $i < count($files); $i++) {
            if(preg_match($pattern, $files[$i]) == 1 ){
                $rows[]=$files[$i]; 
            }
        }
        return $rows;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    /*
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }
    */

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function getRole()
    {
        return $this->level;
    }

    public function getIsadmin()
    {
        return $this->role == static::ROLE_ADMIN;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
        return password_verify($password, $this->pass);
    }

    public function setPassword($password)
    {
        $this->pass = password_hash ($password, PASSWORD_DEFAULT);
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['comment_sender_name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorites::className(), ['user' => 'id']);
    }

    public function getPublications()
    {
        return $this->hasMany(Publications::className(), ['user' => 'id']);
    }

}
