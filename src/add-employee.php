<?php

session_start();

if (empty($_SESSION['username'])){
    header("Location: ../index.html");
    exit();
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LURX | Add Employee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/addEmployee.css" />

</head>
<body>
    <div class="nav"><div class="logo"><a id="logo" href="/index.html">LURX</a></div><form id="logo" action="../includes/signout.php" method="POST"><button class="logout" type="submit" name="submit">Logout</button></form></div>

    <div class="container">
        <div class="form_title">Add New Employee</div>
        <form class="product_form" action="/includes/POST/setEmployee.php" method="POST">
            <div class="first_div">
                <div class="input_title">First Name</div>
                <div class="input_div">
                    <input class="textbox" name="first">
                </div>
            </div>
            <div class="last_div">
                    <div class="input_title">Last Name</div>
                    <div class="input_div">
                            <input class="textbox" name="last">
                        </div>
            </div>
            <div class="email_div">
                    <div class="input_title">Email</div>
                    <div class="input_div">
                            <input class="textbox" name="email">
                        </div>
            </div>
            <div class="address_div">
                        <div class="input_title">Address</div>
                        <div class="input_div">
                                <input class="textbox" name="address">
                            </div>
            </div>
            <div class="phone_div">
                    <div class="phone">
                        <div class="input_title">Phone</div>
                        <div class="input_div">
                            <input class="textbox_phone" name="phone">
                        </div>
                    </div>
                    <div class="type">
                        <div class="input_title">Type</div>
                        <div class="input_div">
                        <select class="textbox_phone" name="type">
                            <option value="Full">Full</option>
                            <option value="Part">Part</option>
                            <option value="Casual">Casual</option>
                            <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="btn_container">
                    <div class="submit">
                        <button class="submit_btn" type="submit" name="add" value="true">Add Employee</button>
                    </div>
                    <div class="cancel">
                        <button class="cancel_btn" type="submit" name="add" value="false">Cancel</button>
                    </div>
                </div>
        </form>
</div>
        

    </div>
</body>
<footer>

</footer>
</html>