<?php
$ans = array(
    1 => 'a',  // Q1
    2 => 'a',  // Q2
    3 => 'c',  // Q3
    4 => 'd',  // Q4
    5 => 'a',  // Q5
    6 => 'c',  // Q6
    7 => 'c',  // Q7
    8 => 'c',  // Q8
    9 => 'd',  // Q9
    10 => 'b', // Q10
    11 => 'd', // Q11
    12 => 'a', // Q12
    13 => 'a', // Q13
    14 => 'c', // Q14
    15 => 'b', // Q15
    16 => 'c', // Q16
    17 => 'c', // Q17
    18 => 'a', // Q18
    19 => 'd', // Q19
    20 => 'a'  // Q20
);

$in = array();
for ($i = 1; $i <= 20; $i++) {
   $in[$i] = isset($_POST['q'.$i]) ? $_POST['q'.$i] : null;
}

$score = 0;
for ($i = 1; $i <= 20; $i++) {
    if ($in[$i] !== null && $ans[$i] === $in[$i]) {
        $score++;
    }
}


$conn=mysqli_connect("localhost","root","","quiz");
if($conn-> connect_error){
    die("Connection failed:".$conn-> connect_error);
}
$sql="insert into results values(?,?,?)";
$stmt = $conn->prepare($sql);
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$gender = isset($_COOKIE['gender']) ? $_COOKIE['gender'] : '';
$stmt->bind_param("ssi", $username, $gender, $score);
$stmt->execute();


echo "<h1><center>CONGRATULATIONS</center></h1>";
echo '<div style="max-width:500px;margin:30px auto 0 auto;padding:24px 32px;background:#e0ffe6;border-radius:14px;box-shadow:0 4px 16px rgba(0,0,0,0.08);text-align:center;">
<span style="font-size:2.2em;">🎉</span><br>
<span style="font-size:1.7em;color:#2d3e50;font-weight:700;letter-spacing:1px;">Congratulations!</span><br>
<span style="color:#888;font-size:1.1em;">You have completed the quiz.</span>
</div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="result.css">
</head>
<body>
    <center>
        <table border="1" cellpadding="10">
            <tr>
                <td>Name:</td>
                <td><?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : "Guest"; ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><?php echo isset($_COOKIE['gender']) ? $_COOKIE['gender'] : "Not set"; ?></td>
            </tr>
            <tr>
                <td>Score:</td>
                <td><?php echo $score; ?></td>
            </tr>
            <tr>
                <td>Grade:</td>
                <td>
                <?php 
                    if ($score <= 5) {
                        echo "D";
                    } elseif ($score <= 10) {
                        echo "C";
                    } elseif ($score <= 15) {
                        echo "B";
                    } else {
                        echo "A";
                    }
                ?>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
