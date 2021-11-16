<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<h3>Using CSS to style an HTML Form</h3>

<div class="w3-container w3-padding-64">
    <form action="processForm.php" method="post">
        <input class="w3-input w3-padding-16" type="text" name="full_name" placeholder="Your name..">

        <input class="w3-input w3-padding-16" type="text" name="email" placeholder="Your email..">

        <input class="w3-input w3-padding-16" type="date" name="birthday" placeholder="Your birthday..">


        <select class="w3-input w3-padding-16" name="gender">
            <option value="1">nam</option>
            <option value="0">nu</option>
        </select>

        <input class="w3-input w3-padding-16" type="text" name="address" placeholder="Your address..">

        <input type="submit" style="margin-top: 10px" value="Submit">
    </form>
</div>

</body>
</html>

