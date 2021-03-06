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
    <title>LURX | Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/addProduct.css" />

</head>
<body>
    <div class="nav"><div class="logo"><a id="logo" href="/index.html">LURX</a></div><form id="logo" action="../includes/signout.php" method="POST"><button class="logout" type="submit" name="submit">Logout</button></form></div>

    <div class="container">
        <div class="form_title">Add New Product</div>
        <form class="product_form" action="/includes/POST/setProduct.php" method="POST">
            <div class="name_div">
                <div class="input_title">Name</div>
                <div class="input_div">
                    <input class="textbox" name="name">
                </div>
            </div>
            <div class="brand_div">
                    <div class="input_title">Brand</div>
                    <div class="input_div">
                            <input class="textbox" name="brand">
                        </div>
            </div>
            <div class="image_div">
                    <div class="input_title">Image URL</div>
                    <div class="input_div">
                            <input class="textbox" name="imageURL">
                        </div>
            </div>
            <div class="price_info_div">
                <div class="price_div">
                        <div class="input_title">Price</div>
                        <div class="input_div">
                                <input class="textbox" name="price">
                            </div>
            </div>
                <div class="sale_price_div">
                    <div class="input_title">Sale Price</div>
                <div class="input_div">
                    <input class="textbox" name="salePrice">
            </div>
                </div>
            </div>
            <div class="options_div">
                <div class="option_wrapper"><input type="hidden" name="delivery" value="0" /><input type="checkbox" class="optionsRadio" value="1" name="delivery"><div>Free Delivery</div></div>
                <div class="option_wrapper"><input type="hidden" name="sale" value="0" /><input type="checkbox" class="optionsRadio" value="1" name="sale"><div>On Sale</div></div>
            </div>
            <div class="id_div">
                    <div class="input_title">Product ID: </div>
                    <div class="id_text_div">
                            <input class="textbox" id="prod_id" disabled="disabled">
                        </div>
            </div>
            <div class="btn_container">
                    <div class="submit">
                        <button class="submit_btn" type="submit" name="add" value="true">Add Product</button>
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