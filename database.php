<?php
//create server connection
$servername = "cssql.seattleu.edu";
$username = "ll_azhao4";
$password = "Cpsc3300Azhao4";
$database = "ll_azhao4";
$connection = mysqli_connect($servername, $username, $password, $database);

//check successful connection
if(!$connection)
{
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully to cssql server <br>";

$sql = $_POST["query"];
echo "Your query was " . $sql . "<br>";
$query = explode(" ", $sql);

$result = mysqli_query($connection, $sql);

//select
if (strcasecmp(strval($query[0]), "SELECT") == 0)
{
    if (mysqli_num_rows($result) > 0)
    {
        echo "<table border = '1'>\n";
        while($row = mysqli_fetch_row($result))
        {
            echo "<tr>\n";
            for ($i = 0; $i < mysqli_num_fields($result); $i++)
            {
                echo "<td>" . $row[$i] . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    }
    else
    {
        echo "0 results";
    }
}
//delete
else if (strcasecmp(strval($query[0]), "DELETE") == 0)
{
    if ($result)
    {
        echo "Record deleted successfully";
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}
//update
else if (strcasecmp(strval($query[0]), "UPDATE") == 0)
{
    if ($result)
    {
        echo "Record updated successfully";
    }
    else
    {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
//insert
else if (strcasecmp(strval($query[0]), "INSERT") == 0)
{
    if ($result)
    {
        echo "New records created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
else
{
    echo "Invalid command";
}

mysqli_free_result($result);
mysqli_close($connection);
?>