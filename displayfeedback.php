<!DOCTYPE html>
<html>
 <head>
    <title> Feedback</title>
    <style type="text/css">
        table {
        border-collapse: collapse;
        width: 100%;
        color: green;
        font-family: monospace;
        font-size: 25px;
        text-align:left;

        }
        th{
            background-color:green;
            color:white;
        }
        tr:ntn-child(even) {background-color: #f2f2f2}
        
        </style>
</head>
<body>
    <h1>Feeback Stored in Database</h1>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Feedback</th>
        <th></th>
    </tr>

    <?php
    
    $conn = mysqli_connect("localhost", "root", "", "projects");
    if ($conn -> connect_error){
        die("Failed to connect:". $conn-> connect_error);
    }

    $sql ="SELECT firstName, lastName, feedback from feedback";
    $result = $conn -> query($sql);

    if ($result -> num_rows >0){
        while ($row = $result -> fetch_assoc()){
            echo "<tr><td>". $row["firstName"] ."</td><td>". $row["lastName"] . "</td><td>" . $row["feedback"] . "</td></tr>" ;
        }
        echo "</table>";
    }
    else{
        echo "0 results";
    }

    $conn-> close();

    ?>
</table>

</body>
</html>
