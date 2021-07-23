<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error: connect error");
    }

    include('connect.php');
    $name = $_POST['name'];
    $passowrd = $_POST['password'];

             $sql = "select * from user where stud_id = '$name' and pw ='$passowrd'";
             $result = mysqli_query($con,$sql);
             $rows=mysqli_num_rows($result);
             if($rows){
			      while($row = mysqli_fetch_assoc($result))
                  {    
				    if("{$row['type']}"=="user"){
					     header("refresh:0;url=LMS_home.html?id={$row['stud_id']}&hash={$row['blockchain_code']}");
					}else{
						 header("refresh:0;url=LMS_admin_home.html?id={$row['stud_id']}");
					}
                   } 
                   exit;
             }else{

                echo "
                    <script>
                           window.location.href='LMS_wrong_password.html';
                    </script>

                ";
             }           
    mysqli_close($con);
?>
