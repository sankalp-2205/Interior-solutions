<?php
    session_start();
    include('connection.php');
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['phonenumber'];
    $password2 = $_POST['password2'];
    if(empty($_POST["username"]))
    {
        echo "nousername";
        exit;
    }
    if(strlen($username) < 6)
    {
        echo "toosmall";
        exit;
    };
    if(strlen($contact) !== 10)
    {
        echo "toosmallcontact";
        exit;
    };
    if(empty($_POST["name"]))
    {
        echo "noname";
        exit;
    }
    if(empty($_POST["email"]))
    {
        echo "noemail";
        exit;
    }
        else
        {
            $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                echo "invalidemail";
                exit;
            }
        }
        if(empty($_POST["password"]))
        {
            $errors .= $nopassword;
            echo "nopassword";
            exit;
        }
    elseif(!(strlen($_POST["password"])>6))
    {
        echo "invalidpassword";
        exit;
    }
    else
    {
        if(empty($_POST["password2"]))
        {
            echo "noconfirmpassword";
            exit;
        }
            elseif($_POST["password"] !== $_POST["password2"])
             {
                 echo "passwordsdidnotmatch";
                 exit;
             }
        }
    if(empty($_POST["phonenumber"]))
    {
        echo "nocontact";
        exit;
    }

    $username = $link ->real_escape_string($username); 
    $name = $link ->real_escape_string($name); 
     $password = $link ->real_escape_string($password);
     $email = $link ->real_escape_string($email);
     $contact = $link ->real_escape_string($contact);
     $sql = "SELECT * FROM users WHERE username = '$username'";
     if($result = $link ->query($sql))
     {
         if($result->num_rows > 0)
         {
             echo "usernameexists";
         exit;
         }
     }
     $sql = "SELECT * FROM users WHERE email = '$email'";
     if($result = $link ->query($sql))
    {
        if($result->num_rows > 0)
        {
            echo "emailexists";
        exit;
        }
    }
    $sql = "SELECT * FROM users WHERE contact = '$contact'";
    if($result = $link ->query($sql))
   {
       if($result->num_rows > 0)
       {
           echo "contactexists";
       exit;
       }
   }
   $avatar_num = rand(1,20);
   $avatar = "avatar".$avatar_num;

   $sql = "INSERT INTO users (username,password,name, email, contact,avatar) VALUES ('$username','$password','$name','$email','$contact','$avatar')";
   if($link->query($sql))
   {
       $_SESSION['username'] = $username;
       echo "success";
   }
?>