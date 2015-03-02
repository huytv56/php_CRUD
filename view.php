<html>
<head>
    <title>User Manager</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <form method="post" action="controller.php">
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <input type="hidden" name="insert" value="yes" />
                    <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-certificate"></i> Insert Record</button>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Read</div>
            <div class="panel-body">
                <?php
                $query="select * from user";
                $result=mysql_query($query);
                if(mysql_num_rows($result)>0){
                    echo "<table class='table table-bordered'";
                    echo "<thead>";
                    echo "<th>Id</th>";
                    echo "<th>Username</th>";
                    echo "<th>Password</th>";
                    echo "<th>Modify</th>";
                    echo "<th>Delete</th>";
                    echo "</thead>";
                    while($row=mysql_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['password']."</td>";
                        echo "<td><a href='controller.php?operation=edit&id=" .$row['id']."&username=".$row['username']."&password=".$row['password']."'><i class='glyphicon glyphicon-edit'></i></a></td>";
                        echo "<td><a href='controller.php?operation=delete&id=" .$row['id']."'><i class='glyphicon glyphicon-trash' style='color: red;'></i></a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<center>No Records Found!</center>";
                }

                ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">Update</div>
            <div class="panel-body">
                <?php

                if(isset($_GET['operation'])){
                    if($_GET['operation']=="edit"){
                        ?>
                        <form method="post" action="controller.php">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $_GET['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password" value="<?php echo $_GET['username'] ?>">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                            <input type="hidden" name="update" value="yes" />
                            <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                        </form>
                    <?php
                    }}
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>