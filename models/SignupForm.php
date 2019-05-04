<?php
     
     namespace app\models;
      
     use Yii;
     use yii\base\Model;
      
     /**
      * Signup form
      */
     class SignupForm extends Model
     {
      
         public $id;
         public $email;
         public $password;
         public $password_repeat;
         public $firstname;
         public $lastname;
         public $avatar;
         public $info;
         public $captcha;
      
         /**
          * @inheritdoc
          */
         public function rules()
         {
             return [
                 ['id', 'trim'],
                 ['id', 'required'],
                 ['id', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
                 ['id', 'string', 'min' => 2, 'max' => 255],
                 ['email', 'trim'],
                 ['email', 'required'],
                 ['email', 'email'],
                 ['email', 'string', 'max' => 255],
                 ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
                 ['password', 'required'],
                 ['password', 'string', 'min' => 6],
                 ['password_repeat', 'required'],
                 ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],                 
                 ['firstname', 'trim'],
                 ['firstname', 'required'],
                 ['firstname', 'string', 'max' => 50],
                 ['lastname', 'trim'],
                 ['lastname', 'required'],
                 ['lastname', 'string', 'max' => 50],
                 ['avatar', 'string', 'max' => 50],
                 ['info', 'string', 'max' => 255],
                 ['captcha', 'required'],
                 ['captcha', 'captcha'],
             ];
         }
      
         /**
          * Signs user up.
          *
          * @return User|null the saved model or null if saving fails
          */
         public function signup()
         {
      
             if (!$this->validate()) {
                 return null;
             }
      
             $user = new User();
             $user->id = $this->id;
             $user->email = $this->email;
             $user->firstname = $this->firstname;
             $user->lastname = $this->lastname;
             $user->avatar = $this->avatar;
             $user->info = $this->info;
             $user->level = 10;
             $user->setPassword($this->password);
             return $user->save() ? $user : null;
         }
      
     }