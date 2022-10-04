<?php 
    require_once("../includes/connection.php");

    $conn = new Connection();

    $noEmp = $conn->connection->query("SELECT COUNT(id) AS Emp_Count FROM user");
    $totalSal = $conn->connection->query("SELECT SUM(salary) AS Total_Salary FROM user");
    $highestSal = $conn->connection->query("SELECT MAX(salary) AS Max_Salary FROM user");
    $lowestSal = $conn->connection->query("SELECT MIN(salary) AS Min_Salary FROM user");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats</title>

    <link href="../css/style.css" rel="stylesheet">

</head>
<body>
    <div class="centerPanel">
        <div class="cardBox">
            <div class="card">
                <div>
                    <?php 
                        $data = $noEmp->fetch_array();
                    ?>
                    <div class="numbers"><?php echo $data['Emp_Count']; ?></div>
                    <div class="cardName"># of Employees</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php 
                        $data = $totalSal->fetch_array();
                    ?>
                    <div class="numbers">$<?php echo $data['Total_Salary']; ?></div>
                    <div class="cardName">Total Salary</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php 
                        $data = $highestSal->fetch_array();
                    ?>
                    <div class="numbers">$<?php echo $data['Max_Salary']; ?></div>
                    <div class="cardName">Highest Salary</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php 
                        $data = $lowestSal->fetch_array();
                    ?>
                    <div class="numbers">$<?php echo $data['Min_Salary']; ?></div>
                    <div class="cardName">Lowest Salary</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>