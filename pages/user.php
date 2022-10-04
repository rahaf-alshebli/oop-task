<?php 

    include_once('../includes/connection.php');

    class User extends Connection
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function check_login($email, $password) 
        {
            $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
            $query = $this->connection->query($sql);

            if($query->num_rows > 0)
            {
                $row = $query->fetch_array();
                $_SESSION['role'] = $row['role'];

                if($row["role"] =="Admin")
                {
                    $_SESSION['login']=$_POST['email'];
                    $_SESSION['username']=$row["firstname"]." ".$row["lastname"];
                    header("Location: ../main/index.php");
                    die();
                }
                if($row["role"] == "SuperAdmin")
                {
                    $_SESSION['login']=$_POST['email'];
                    $_SESSION['username']=$row["firstname"]." ".$row["lastname"];
                    header("Location: ../main/superadmin.php");
                    die();
                }
                if($row["role"]=="user")
                {
                    $_SESSION['login']=$_POST['email'];
                    $_SESSION['username']=$row["firstname"]." ".$row["lastname"];
                    header("Location: ../user/");
                    die();
                }
                return $row['id'];
            }
            else
            {
                return false;
            }
        }

        public function escape_string($value)
        {
            return $this->connection->real_escape_string($value);
        }
    }

    $user = new User();
 
    if(isset($_POST['login']))
    {
        $email = $user->escape_string($_POST['email']);
        $password = $user->escape_string($_POST['pass']);
    
        $auth = $user->check_login($email, $password);
    
        if(!$auth)
        {
            $_SESSION['message'] = 'Invalid username or password';
            header('location:login.php');
        }
        else
        {
            $_SESSION['user'] = $auth;
            //header('location: ../index.php');
   
        }
    }
    else
    {
        $_SESSION['message'] = 'You need to login first';
        header('location:login.php');
    }
?>