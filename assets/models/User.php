<?php
include("Database.php");
class User extends Database
{
  public function login(){
    $nickname = $_POST['login'];
    $connection = $this->connect()->prepare("SELECT * FROM users WHERE username_user = :nickname_user");
    $connection->bindParam(':nickname_user', $nickname);
    $connection->execute();
    $user = $connection->fetch();
    if ($user && password_verify($_POST['password'], $user['password_user'])) {
      session_start();
      $_SESSION['username_user'] = $nickname;
      $_SESSION['img_user'] = $user['img_user'];
      $_SESSION['bio_user'] = $user['bio_user'];
      $_SESSION['name_user']= $user['name_user'];
      $_SESSION['email_user'] = $user['email_user'];
      $_SESSION['id_user'] = $user['Id_user'];
      header('Location: ./confirmation');
    } else {
      // echo 'Invalid nickname or password';
      header('Location: ./login');
    }
  }
  public function register(){
    $name = $_POST['nameRegister'];
    $nickname = $_POST['nicknameRegister'];
    $password = password_hash($_POST['pswdRegister'],  PASSWORD_DEFAULT);
    $email = $_POST['emailRegister'];
    $bio = $_POST['bioRegister'];
    $newImg = $this->newNameImg('profilePictureRegister');
    $existName = $this->connect()->prepare("SELECT * FROM users WHERE nickname_user = :nickname_user");
    $existName->bindValue(':nickname_user', $nickname);
    $existName->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM users WHERE email_user = :email_user");
    $existEmail->bindValue(':email_user', $email);
    $existEmail->execute();
    $nicknameExist = $existName->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist != false) {
      header('Location: ./register');
    } else if ($emailExist != false) {
      header('Location: ./register');
    } else {
      $register = $this->connect()->prepare("INSERT INTO users (name_user, username_user, password_user, email_user, bio_user, img_user) VALUES (:name_user, :username_user, :password_user, :email_user, :bio_user, :img_user )");
      $register->bindParam(':name_user', $name);
      $register->bindParam(':username_user', $nickname);
      $register->bindParam(':password_user', $password);
      $register->bindParam(':email_user', $email);
      $register->bindParam(':bio_user', $bio);
      $register->bindParam(':img_user', $newImg);
      $register->execute();
      session_start();
      $_SESSION['username_user'] = $nickname;
      $_SESSION['bio_user'] = $bio;
      $_SESSION['img_user'] = $newImg;
      $_SESSION['name_user']= $nickname;
      $_SESSION['email_user'] = $email;
      move_uploaded_file($_FILES['profilePictureRegister']['tmp_name'], './uploadImg/'.$newImg);
      $fetchID= $this->connect()->prepare("SELECT Id_user FROM users WHERE username_user = :usernameToGrab");
      $fetchID->bindParam(':usernameToGrab', $nickname);
      $fetchID->execute();
      $transfert = $fetchID->fetch();
      $_SESSION['id_user']= $transfert[0]['Id_user'];
      header('Location: ./confirmation');
    }
  }
  public function logout(){
    session_start();
    session_destroy();
    header('Location: ./');
  }
  public function pswdReset(){
    if (isset($_POST['email'])) {
      $password = uniqid();
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $subject = 'Mot de passe oublié';
      $message = "Bonjour, voici votre nouveau mot de passe : $password";
      $headers = 'Content-Type: text/plain; charset="UTF-8"';

      if (mail($_POST['email'], $subject, $message, $headers)) {
        $stmt = $this->connect()->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->execute([$hashedPassword, $_POST['email']]);
        echo "E-mail envoyé";
      } else {
        echo "Une erreur est survenue";
      }
    }
  }
  private function newNameImg($target){
    $explodeName = explode('.', $_FILES[$target]['name']);
    $extension = strtolower(end($explodeName));
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if (in_array($extension, $extensions)) {
      $uniqueName = $this->random_string(10);
      $img_file = $uniqueName.".".$extension;
      $_FILES[$target]['name']=$img_file;
      return $img_file;
    }
  }
  private function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
  }
  public function editAccount(){
    if(!session_start()){
      session_start();
    }
    $id = $_SESSION['id_user'];
    $fileToRemove = $_SESSION['img_user'];
    $addSelect = array();
    $editImg = $this->newNameImg('profilePictureEditAccount');
    if (isset($_FILES['profilePictureEditAccount']) && !empty($_FILES['profilePictureEditAccount'])) {
      array_push($addSelect, ', img_user = :img_user');
    }
    $addSelections = implode(" ", $addSelect);
    $existNickname = $this->connect()->prepare("SELECT * FROM users WHERE nickname_user = :nickname_user");
    $existNickname->bindParam(':nickname_user', $_POST['nicknameEditAccount']);
    $existNickname->execute();
    $existEmail = $this->connect()->prepare("SELECT * FROM users WHERE email_user = :email_user");
    $existEmail->bindParam(':email_user', $_POST['emailEditAccount']);
    $existEmail->execute();
    $nicknameExist = $existNickname->fetch();
    $emailExist = $existEmail->fetch();
    if ($nicknameExist == $_POST['nicknameEditAccount']) {
      header('Location: ./editAccount');
    } else if ($emailExist == $_POST['emailEditAccount']) {
      header('Location: ./editAccount');
    } else {
      $Edit = $this->connect()->prepare('UPDATE users SET name_user = :name_user, username_user = :nickname_user, email_user = :email_user, bio_user = :bio_user ' . $addSelections . ' WHERE id_user = :id_user');
      $Edit->bindParam(':id_user', $id);
      $Edit->bindParam(':name_user', $_POST['nameEditAccount']);
      $Edit->bindParam(':nickname_user', $_POST['nicknameEditAccount']);
      $Edit->bindParam(':email_user', $_POST['emailEditAccount']);
      $Edit->bindParam(':bio_user', $_POST['bioEditAccount']);
      $_SESSION['name_user'] = $_POST['nameEditAccount'];
      $_SESSION['nickname_user'] = $_POST['nicknameEditAccount'];
      $_SESSION['email_user'] = $_POST['emailEditAccount'];
      $_SESSION['bio_user'] = $_POST['bioEditAccount'];
      // if (isset($_POST['pswdEdit']) && !empty($_POST['pswdEdit'])) {
      //   $Edit->bindParam(':password_user', $password);
      // }
      if (isset($_FILES['profilePictureEditAccount']) && !empty($_FILES['profilePictureEditAccount']['name'])) {
        $Edit->bindParam(':img_user', $editImg);
        unlink('./uploadImg/'.$fileToRemove);
        move_uploaded_file($_FILES['profilePictureEditAccount']['tmp_name'], './uploadImg/'.$editImg);
        $_SESSION['img_user'] = $editImg;
      }
      $Edit->execute();
      header('Location: ./confirmation');
    }
  }
}