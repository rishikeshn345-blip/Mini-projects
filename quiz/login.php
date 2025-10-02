<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
        <link rel="stylesheet" href="login.css">
</head>
<body>
    <center>
        <h1>Test your IQ</h1>
    </center>
    <HR>
    <h2>About us:</h2>
    <ul>
        <li>This is a online flatform to test your IQ.</li>
        <li>There are 20 questions which you have to answer.</li>
        <li>All questions are of the mcq formet.</li>
        <li>We are trying to find high iq people people around the world.</li>
        <li>Login and give the quiz.</li>
        <li>If score less than 5 grade is D</li>
        <li>If score less than 10 and greater than 5 grade is C</li>
        <li>If score less than 15 and greater than 10 grade is B</li>
        <li>If score is grater than 15 then grade is A</li>
    </ul>
    <hr>
    <center>
        <form method="post" action="questions.php">
            <lebal for="username">Username:</lebal>
            <input type="text" name="username" placeholder="Enter your username" required>
            <br>
            <lebal for="gender">Gender:</lebal>
            <input type="radio" name="gender" value="male" required>Male:
            <input type="radio" name="gender" value="femail" required>Femail:
            <br>
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
</html>

<?php

?>