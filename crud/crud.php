
<?php
$conn=mysqli_connect('localhost','root','','student');
if (isset($_POST['submit'])){
// $id=$_POST['id'];
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];

$sqli="INSERT INTO student_info(name,number,email) VALUES ('$name','$number','$email')";
$query = mysqli_query($conn,$sqli);
if($query == TRUE){
    echo "Data Inserted";
}else{
    echo "Not Inserted";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" style="background-color:tomato;width:13%;border-radius:10px;">
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name">
        </div><br>
        <div>
            <label for="number">Number:</label><br>
            <input type="number" name="number">
        </div><br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email">
        </div>
        <input type="submit" value="INSERT" name="submit">

    </form>
    
</body>
</html>