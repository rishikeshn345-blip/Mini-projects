<?php
$username=$_POST['username'];
$username=htmlspecialchars($username);
$gender=$_POST['gender'];
setcookie("username",$username);
setcookie("gender",$gender);
echo '<div style="max-width:500px;margin:30px auto 0 auto;padding:24px 32px;background:#fffbe6;border-radius:14px;box-shadow:0 4px 16px rgba(0,0,0,0.08);text-align:center;">
<span style="font-size:2.2em;">👋</span><br>
<span style="font-size:1.5em;color:#2d3e50;font-weight:600;letter-spacing:1px;">Welcome, ' . $username . '!</span><br>
<span style="color:#888;font-size:1.1em;">Get ready to test your IQ!</span>
</div>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
        <link rel="stylesheet" href="questions.css">
</head>
<body>
    <hr>
    <center><h2>🧠 IQ Test – 20 MCQs</h2></center>
    <hr>
    <form method="post" action="result.php">
        <label>1. Which number should come next in the series? <br>2, 6, 12, 20, 30, ?</label><br>
        <input type="radio" name="q1" value="a" required>a. 36<br>
        <input type="radio" name="q1" value="b" required>b. 40<br>
        <input type="radio" name="q1" value="c"  required>c. 42<br>
        <input type="radio" name="q1" value="d" required>d. 44<br><br>
        <label>2. If 3 cats catch 3 mice in 3 minutes, how many cats are needed to catch 100 mice in 100 minutes?</label><br>
        <input type="radio" name="q2" value="a" required>a. 3<br>
        <input type="radio" name="q2" value="b" required>b. 9<br>
        <input type="radio" name="q2" value="c" required>c. 33<br>
        <input type="radio" name="q2" value="d" required>d. 100<br><br>

        <label>3. Which word does NOT belong?</label><br>
        <input type="radio" name="q3" value="a" required>a. Apple<br>
        <input type="radio" name="q3" value="b" required>b. Banana<br>
        <input type="radio" name="q3" value="c" required>c. Carrot<br>
        <input type="radio" name="q3" value="d" required>d. Mango<br><br>

        <label>4. Find the odd one out:</label><br>
        <input type="radio" name="q4" value="a">a. Circle<br>
        <input type="radio" name="q4" value="b">b. Triangle<br>
        <input type="radio" name="q4" value="c">c. Square<br>
        <input type="radio" name="q4" value="d">d. Cube<br><br>

        <label>5. If ALL BLOOPS are RAZZIES and ALL RAZZIES are LUMPS, then are ALL BLOOPS definitely LUMPS?</label><br>
        <input type="radio" name="q5" value="a">a. Yes<br>
        <input type="radio" name="q5" value="b">b. No<br>
        <input type="radio" name="q5" value="c">c. Cannot say<br>
        <input type="radio" name="q5" value="d">d. Only some<br><br>

        <label>6. What is 25% of 2/5 of 200?</label><br>
        <input type="radio" name="q6" value="a">a. 10<br>
        <input type="radio" name="q6" value="b">b. 15<br>
        <input type="radio" name="q6" value="c">c. 20<br>
        <input type="radio" name="q6" value="d">d. 25<br><br>

        <label>7. Which number is missing? <br>1, 4, 9, 16, 25, ?, 49</label><br>
        <input type="radio" name="q7" value="a">a. 30<br>
        <input type="radio" name="q7" value="b">b. 35<br>
        <input type="radio" name="q7" value="c">c. 36<br>
        <input type="radio" name="q7" value="d">d. 40<br><br>

        <label>8. If 5x = 20, then x = ?</label><br>
        <input type="radio" name="q8" value="a">a. 2<br>
        <input type="radio" name="q8" value="b">b. 3<br>
        <input type="radio" name="q8" value="c">c. 4<br>
        <input type="radio" name="q8" value="d">d. 5<br><br>

        <label>9. Which pair is related in the same way as Book : Reading?</label><br>
        <input type="radio" name="q9" value="a">a. Knife : Cutting<br>
        <input type="radio" name="q9" value="b">b. Pen : Drawing<br>
        <input type="radio" name="q9" value="c">c. Shoes : Walking<br>
        <input type="radio" name="q9" value="d">d. All of the above<br><br>

        <label>10. A clock shows 3:15. What is the angle between the hour and minute hands?</label><br>
        <input type="radio" name="q10" value="a">a. 0°<br>
        <input type="radio" name="q10" value="b">b. 7.5°<br>
        <input type="radio" name="q10" value="c">c. 30°<br>
        <input type="radio" name="q10" value="d">d. 45°<br><br>

        <label>11. Which is the next letter in the series? A, C, F, J, O, ?</label><br>
        <input type="radio" name="q11" value="a">a. Q<br>
        <input type="radio" name="q11" value="b">b. R<br>
        <input type="radio" name="q11" value="c">c. S<br>
        <input type="radio" name="q11" value="d">d. U<br><br>

        <label>12. Find the missing term: 2, 6, 12, 20, 30, ?</label><br>
        <input type="radio" name="q12" value="a">a. 36<br>
        <input type="radio" name="q12" value="b">b. 40<br>
        <input type="radio" name="q12" value="c">c. 42<br>
        <input type="radio" name="q12" value="d">d. 48<br><br>

        <label>13. If "TABLE" is coded as "GZYOV", then "CHAIR" will be coded as:</label><br>
        <input type="radio" name="q13" value="a">a. XSVRO<br>
        <input type="radio" name="q13" value="b">b. XSRVO<br>
        <input type="radio" name="q13" value="c">c. XVSRO<br>
        <input type="radio" name="q13" value="d">d. XROSV<br><br>

        <label>14. What comes next in the sequence? M, T, W, T, F, ?</label><br>
        <input type="radio" name="q14" value="a">a. M<br>
        <input type="radio" name="q14" value="b">b. S<br>
        <input type="radio" name="q14" value="c">c. S (Saturday)<br>
        <input type="radio" name="q14" value="d">d. N<br><br>

        <label>15. Which one is a prime number?</label><br>
        <input type="radio" name="q15" value="a">a. 9<br>
        <input type="radio" name="q15" value="b">b. 11<br>
        <input type="radio" name="q15" value="c">c. 15<br>
        <input type="radio" name="q15" value="d">d. 21<br><br>

        <label>16. If you rearrange the letters CIFAIPC, you get the name of a:</label><br>
        <input type="radio" name="q16" value="a">a. Country<br>
        <input type="radio" name="q16" value="b">b. City<br>
        <input type="radio" name="q16" value="c">c. Ocean<br>
        <input type="radio" name="q16" value="d">d. River<br><br>

        <label>17. What is the missing number? 7, 14, 28, 56, ?</label><br>
        <input type="radio" name="q17" value="a">a. 84<br>
        <input type="radio" name="q17" value="b">b. 100<br>
        <input type="radio" name="q17" value="c">c. 112<br>
        <input type="radio" name="q17" value="d">d. 120<br><br>

        <label>18. In a certain code, if CAT = 24 and DOG = 26, then FISH = ?</label><br>
        <input type="radio" name="q18" value="a">a. 42<br>
        <input type="radio" name="q18" value="b">b. 40<br>
        <input type="radio" name="q18" value="c">c. 38<br>
        <input type="radio" name="q18" value="d">d. 36<br><br>

        <label>19. Choose the correct analogy: Hand : Glove :: Foot : ?</label><br>
        <input type="radio" name="q19" value="a">a. Sock<br>
        <input type="radio" name="q19" value="b">b. Shoe<br>
        <input type="radio" name="q19" value="c">c. Sandal<br>
        <input type="radio" name="q19" value="d">d. All of the above<br><br>

        <label>20. Which figure completes the pattern? ⬜ 🔺 ⬜ 🔺 ⬜ ?</label><br>
        <input type="radio" name="q20" value="a">a. 🔺<br>
        <input type="radio" name="q20" value="b">b. ⬜<br>
        <input type="radio" name="q20" value="c">c. 🔺⬜<br>
        <input type="radio" name="q20" value="d">d. None<br><br>

       <center>
         <input type="submit" value="Submit">
       </center>
    </form>
</div>

    </div>
</body>
</html>