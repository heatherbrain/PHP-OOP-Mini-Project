<?php
class User{
  private $_db = null;
  private $_formItem = [];

  public function validasiInsert($formMethod){
    $validate = new Validate($formMethod);

    $this->_formItem['username'] = $validate->setRules('username',
    'Username', [
      'required' => true,
      'sanitize' => 'string'
    ]);

    $this->_formItem['email'] = $validate->setRules('email',
    'Email', [
      'numeric' => true,
      'min_value' => 0
    ]);

    $this->_formItem['password'] = $validate->setRules('password',
    'Password', [
      'numeric' => true,
      'min_value' => 0
    ]);
  }

  public function validasi($formMethod){
    $validate = new Validate($formMethod);

      $this->_formItem['username'] = $validate->setRules('username','Username',[
        'sanitize' => 'string',
        'required' => true,
        'min_char' => 4,
        'regexp' => '/^[A-Za-z0-9]+$/',
        'unique' => ['user','username'],
      ]);

      $this->_formItem['password'] = $validate->setRules('password','Password',[
        'sanitize' => 'string',
        'required' => true,
        'min_char' => 6,
        'regexp' => '/[A-Za-z]+[0-9]|[0-9]+[A-Za-z]/'
      ]);

      $this->_formItem['ulangipassword'] =
        $validate->setRules('ulangipassword','Ulangi password',[
        'sanitize' => 'string',
        'required' => true,
        'matches' => 'password'
      ]);

      $this->_formItem['email'] = $validate->setRules('email','Email',[
        'sanitize' => 'string',
        'required' => true,
        'email' => true
      ]);

      if(!$validate->passed()) {
        return $validate->getError();
      }
  }

  public function getItem($item){
    return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
  }

  public function getItemById($id){
    $this->_db = DB::getInstance();
    $condition = 'where id = ' . $id;
    $userDetail = $this->_db->get('user', $condition);
    return $userDetail[0];
  }

  public function insert(){
    $this->_db = DB::getInstance();
    $newUser = [
      'username' => $this->getItem('username'),
      'email' => $this->getItem('email'),
      'password' => password_hash($this->getItem('password'),PASSWORD_DEFAULT),
    ];
    return $this->_db->insert('user',$newUser);
  }

  public function validasiLogin($formMethod){
    $validate = new Validate($formMethod);

      $this->_formItem['username'] = $validate->setRules('username','Username',[
        'sanitize' => 'string',
        'required' => true
      ]);

      $this->_formItem['password'] = $validate->setRules('password','Password',[
        'sanitize' => 'string',
        'required' => true
      ]);

      if(!$validate->passed()) {
        return $validate->getError();
      } else {
        $this->_db = DB::getInstance();
        $this->_db->select('password');
        $result = $this->_db->getWhereOnce('user',['username','=',
                  $this->_formItem['username']]);

        if(empty($result) || !password_verify($this->_formItem['password'],
        $result->password)) {
          $pesanError[] = 'Maaf, username / password salah';
          return $pesanError;
        }
      }
  }

  public function update($id){
    $newUser = [
      'username' => $this->getItem('username'),
      'email' => $this->getItem('email'),
      'email' => $this->getItem('password')
    ];
    $this->_db->update('user',$newUser,['id','=',$id]);
  }
  
  public function delete($id){
    $this->_db->delete('user',['id','=',$id]);
  }
  

  public function login(){
    $_SESSION["username"] = $this->getItem('username');
    $_SESSION["email"] = $this->getItem('email');
    header("Location: tableuser.php");
  }

  public function cekUserSession(){
    if (!isset($_SESSION["username"])) {
      header("Location: login.php");
   }
  }

  public function logout(){
    unset($_SESSION["username"]);
    header("Location: login.php");
  }

  public function generateId($id){
    $this->_db = DB::getInstance();
    $result = $this->_db->getWhereOnce('user',['id','=',$id]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function generate($username){
    $this->_db = DB::getInstance();
    $result = $this->_db->getWhereOnce('user',['username','=',$username]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function validasiUbahPassword($formMethod){
    $validate = new Validate($formMethod);

      $this->_formItem['passwordlama'] = $validate->
      setRules('passwordlama','Password lama',[
        'sanitize' => 'string',
        'required' => true,
      ]);

      $this->_formItem['passwordbaru'] = $validate->
      setRules('passwordbaru','Password baru',[
        'sanitize' => 'string',
        'required' => true,
        'min_char' => 6,
        'regexp' => '/[A-Za-z]+[0-9]|[0-9]+[A-Za-z]/'
      ]);

      $this->_formItem['ulangipasswordbaru'] = $validate->
      setRules('ulangipasswordbaru','Ulangi password baru',[
        'sanitize' => 'string',
        'required' => true,
        'matches' => 'passwordbaru'
      ]);

      if(!$validate->passed()) {
        return $validate->getError();
      } else {
        $this->_db = DB::getInstance();
        $this->_db->select('password');
        $result = $this->_db->getWhereOnce('user',['username','=',
                                            $this->_formItem['username']]);

        if(empty($result) || !password_verify($this->_formItem['passwordlama'],
        $result->password)) {
          $pesanError[] = 'Maaf, password lama anda tidak sesuai';
          return $pesanError;
        }
      }
  }

  public function ubahPassword(){
    $newUserPassword = [
      'password' => password_hash($this->getItem('passwordbaru'),
                    PASSWORD_DEFAULT)
    ];
    $this->_db->update('user',$newUserPassword,['username','=',
    $this->_formItem['username']]);
  }

}
