<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
</head>
<body>
    <?php echo "<h1> Welcome ".$_COOKIE['name']."</h1>"; ?>
    <h2>Your notes:</h2>
    <center>
        <table border="1">
            <?php
                $name=$_COOKIE['name'];
                $conn=mysqli_connect("localhost","root","","quiz");
                $sql="SELECT * FROM `$name`";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    while($data=$result->fetch_assoc())
                    {
                        echo "<tr><td colspan=10 >".$data['title']."</td></tr>";
                        echo "<tr><td>".$data['notes']."</td></tr>";
                    }
                }
?>
        </table>
        <br><br>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <table>
                <TR>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Enter title of notes" maxlength="10" required>
                    </td>
                </TR>
                <tr>
                    <td>Text</td>
                    <td>Editor</td>
                </tr>
            </table>
            <br>
            <textarea rows="10" cols="90" name="text" placeholder="Write something" required>Enter notes:</textarea>
            <br>
            <button type="clear">Clear</button>
            <button type="submit" name="submit" value="Submit">Save notes</button>
        </form>
    </center>
    <?php
        if(isset($_POST['submit']))
        {
            $title=$_POST['title'];
            $notes=$_POST['text'];
            $title=filter_var($title,FILTER_SANITIZE_SPECIAL_CHARS);
            $notes=filter_var($notes,FILTER_SANITIZE_SPECIAL_CHARS);
            $sql="INSERT INTO `$name` values('$title','$notes')";
            if($conn->query($sql)===TRUE)
            {
                echo "<h2>Saved successfully</h1>";
            }
            else
            {
                echo "<h2>Something went wrong</h2>";
            }
            $conn->close();
        }
    ?>
</body>
</html>