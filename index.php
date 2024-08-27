<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: blue;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php 
            include "db_connect.php";

            $sql1 = "SELECT id, fname, lname, title, start_year, phone, email, street_address, postal_code, city 
                     FROM employees 
                     WHERE start_year BETWEEN 2006 AND 2009";
        
            $result1 = $conn->query($sql1);
        
            if ($result1->num_rows > 0) {
                echo "<ul>";
                while($row = $result1->fetch_assoc()) {
                    echo "<li>" . $row["fname"] . " " . $row["lname"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "No employees found who started between 2006 and 2009.";
            }


            $sql2 = "SELECT id, fname, lname, title, start_year, phone, email, street_address, postal_code, city FROM employees";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>id</th>
                        <th>fname</th>
                        <th>lname</th>
                        <th>title</th>
                        <th>start_year</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>street_address</th>
                        <th>postal_code</th>
                        <th>city</th>
                      </tr>";
                while($row = $result2->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["fname"] . "</td>
                            <td>" . $row["lname"] . "</td>
                            <td>" . $row["title"] . "</td>
                            <td>" . $row["start_year"] . "</td>
                            <td>" . $row["phone"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["street_address"] . "</td>
                            <td>" . $row["postal_code"] . "</td>
                            <td>" . $row["city"] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
        
        <script src=""></script>
    </body>
</html>
