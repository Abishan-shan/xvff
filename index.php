 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> crud</title>

    <style>

        button
        {
            margin-bottom:20px;
        }
        table
        {
            border:1px solid red;
            
        }

    </style>
 </head>
 <body>
        <a href="add.php"><button>Create product</button></a>

<?php $products=simplexml_load_file('products.xml');
                echo "no of products:".count($products); ?>


        <table border="1" cellspacing="0" cellpadding="5">

        <tr>
            <td>id</td>
            <td>name</td>
            <td>price</td>
            <td>EDITE</td>
            <td>DELETE</td>
        </tr>

        <?php  
                

                foreach($products -> product as $product)
                {

            ?>

        <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->price?></td>
                    <td><a href="edite.php? action=edite&amp;id=<?php echo $product['id'] ?>">Edite</a></td>
                    <td><a href="index.php? action=del&amp;id=<?php echo $product['id'] ?>">Delete</a></td>
        </tr>
            <?php }?>
        </table>
 </body>
 </html>

 <?php  
    if(isset($_GET['action']) && $_GET['action']=="del")
    {
        $id=$_GET['id'];
        $index=0;
        $i=0;
        
        foreach($products -> product as $product)
        {
            if($product['id']==$id)
            {
                $index=$i;
                break;

            }
            $i++;
        }

        unset($products -> product[$index]);
        file_put_contents('products.xml',$products ->asXML());
       header("location:index.php");
    }
 
 ?>