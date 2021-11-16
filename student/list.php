<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
    <form action="list.php" method="get">
        <input type="text" name="keyword" placeholder="Enter something to search">
        <input type="submit" value="Search">
        <a href="list.php">Clear File</a>
    </form>
    <div class="w3-container">
    <table class="w3-table-all">
        <thead>
        <tr class="w3-green">
            <th>full_name</th>
            <th>email</th>
            <th>birthday</th>
            <th>gender</th>
            <th>address</th>
        </tr>
        </thead>
    <?php
        $keyword = '';
        if (isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername,$username,$password,$dbname);

        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM form";
        $search_title = '';
        if ($keyword != null && strlen($keyword) > 0){
            $sql .= " where full_name like '%$keyword%'";
            $search_title .= "Search result for keyword '$keyword'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            echo "<h1>$search_title</h1>";
            while ($row = $result->fetch_assoc()){
                echo "<tr> " ."<td> " .$row["full_name"]. " </td>".
            "<td> " .$row["email"]. " </td>".
            "<td> " .$row["birthday"]. " </td>".
            "<td> " .$row["gender"]. " </td>".
            "<td> " .$row["address"]. " </td>".
                "<tr> ";
            }
        } else {
            echo "0 result";
        }
        $conn->close();
    ?>
    </table>
</div>
</body>
</html>