<?php
    

    if(isset($_POST['submit']))
    {
        $products=simplexml_load_file('products.xml');
        $product=$products->addChild('product');
        $product->addAttribute('id',$_POST['id']);
        $product->addChild('name',$_POST['name']);
        $product->addChild('price',$_POST['price']);

        file_put_contents('products.xml',$products->asXML());

        header("location:index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        form
        {
            border:5px solid red;
            width:300px;
            height:200px;
            padding:20px;
        }

    </style>
</head>
<body>
    <form method="post" action=" ">
    <LABEL for="id">Product-id:</LABEL>
    <input type="text" name="id" required> <br> <br>

    <LABEL for="name">Name:</LABEL>
    <input type="text" name="name" required><br> <br>

    <LABEL for="price">Price:</LABEL>
    <input type="text" name="price" required><br> <br>

    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>