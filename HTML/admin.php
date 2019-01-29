<?php
session_start();

if (!empty($_SESSION['username'])){
    //require('includes/html/hp/index.html');
} else {
    header("Location: ../index.html");
    exit();
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LURX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/admin.css" />
    <script src="js/admin.js"></script>

</head>
<body>
    <div class="nav"><div class="logo"><a id="logo" href="/index.html">LURX</a></div><form id="logo" action="../includes/signout.php" method="POST"><button class="logout" type="submit" name="submit">Logout</button></form></div>

    <div class="container">
        <div id="white_space"></div>
        <div class="product_dashboard">
            <div class="product_search">
                <input class="input" id="input" type="text" placeholder="Search" id="searchInput">
                <button class="searchBtn" id="searchBtn" onblur="search()"><img class="searchBtnImg" src="assets/search-icon.png"></button>
            </div>
            <div class="product_count">
                   
                        <div class="counter_text">
                            <div class="count_text" id="counter"></div><div class="count_text">Employees</div>
                        </div>
                   
            </div>
            <div class="product_sort">
                <div class="sort_box">Type: 
                    <select class="sort_select" id="sort_select" onchange="sortBySelect()">
                            <option value="0" selected>All</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>
                            <option value="3">Casual</option>
                    </select> 
                    <svg class="down_arrow"></svg>
                </div>
                
            </div>
        </div>
        <hr>
        <div class="grid" id="grid">
            <table class="employee_table">
                <thead class="employee_table_head">
                    <th>First</th>
                    <th>Last</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Address</th>
                </thead>
                <tbody class="tbody" id="tbody">
                </tbody>
            </table>
        </div>
        <hr>
        <div class="white_space_bottom">

        </div>
        <div class="add_objects_container">
            <div class="add_product">
                <form class="link" action="/add-product.php"><button class="btn" type="submit" name="type" value="product">Add New Product</button></form>
            </div>
            <div class="add_employee">
            <form class="link" action="/add-employee.php"><button class="btn" type="submit" name="type" value="employee">Add New Employee</button></form>
            </div>
        </div>

    </div>
</body>
<footer>

</footer>
</html>
