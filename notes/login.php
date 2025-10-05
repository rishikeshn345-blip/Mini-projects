<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h2>Warning: There is no forgot password to provide max security so plese do remember your password.</h2>
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="name" maxlength="10" required>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" maxlength="25" required>
                </td>
            </tr>
        </table>
        <button type="reset">Reset</button>
        <input type="submit" name="submit" value="Submit">
    </form>
    </div>
<?php
if(isset($_POST['submit']))
{
    $conn=mysqli_connect("localhost","root","","quiz");
    $name=$_POST['name'];
    $name=filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS);
    $password=$_POST['password'];
    $password=filter_var($password,FILTER_SANITIZE_SPECIAL_CHARS);
    $sql="SELECT * FROM users WHERE name='$name'";
    setcookie("name",$name);
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        $sql="SELECT * FROM USERS WHERE name='$name' AND password='$password'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            echo "<h2>LOGGED IN press continue to go to create notes</h2>";
            echo "<form method='post' action='edit.php'><button type='submit'>Continue</button></form>";
        }
        else
        {
            echo "<h1>Invalied username or password!</h1>";
        }
    }
    else
    {
        $sql="INSERT INTO users VALUES('$name','$password')";
        if($conn->query($sql)===TRUE)
        {
            echo "<h2>Created new account press continue to go to create notes</h2>";
            echo "<form method='post' action='edit.php'><button type='submit'>Continue</button></form>";
        }
        $sql="CREATE TABLE `$name` (title VARCHAR(10), notes VARCHAR(500))";
        $conn->query($sql);
    }
    $conn->close();
}
?>
</body>
</html>