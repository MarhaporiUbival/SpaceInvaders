<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <style>
        h2{
            color: white;
            text-align: center;
        }

        body{
            background-color: black;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
            color: black;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            background-color: white;
        }

        th {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <h2>Scoreboard</h2>
    <table>
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php
        $servername = "mysql.caesar.elte.hu";
        $dbname = "klevi";
        $username = "klevi";
        $password = "rSrzfCUdHYsJHo3P";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch scores and usernames
        $sql = "SELECT username, score FROM Scoreboard ORDER BY score DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $rank = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rank . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "</tr>";
                $rank++;
            }
        } else {
            echo "<tr><td colspan='3'>No scores found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>