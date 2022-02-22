<?php
include('header.php');
include('config.php');
if(isset($_POST['addCart'])){
    myCart();
    header("location:products.php");
}
function myCart(){
    global $products;
    foreach($products as $key => $value){
        $_SESSION['count']=0;
        if($value['id']==$_POST['Val']){
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key1 => $value1){
                    if($value1['id']==$_POST['Val']){
                        $_SESSION['cart'][$key1]['quantity'] += 1;
                        $_SESSION['count']=1;
                        break;
                    }
                }
                if($_SESSION['count']==0){
                    $value['quantity']=1;
                    array_push($_SESSION['cart'],$value);
                }
            }
            else{
                $value['quantity']=1;
                $_SESSION['cart']=array($value);
            }
        }
    }
}
function Display(){
    if(isset($_SESSION['cart'])){
        echo '<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Update</th><th>Delete</th></tr>';
        $_SESSION['total']=0;
        foreach($_SESSION['cart'] as $key2 => $value2){
            $_SESSION['itemprice']=$value2['price']*$value2['quantity'];
            $_SESSION['total']+=$_SESSION['itemprice'];
            echo '<form action="function.php" method="POST"><tr><td>'.$value2['id'].'</td><td>'.$value2['name'].'</td><td>'.$_SESSION['itemprice'].'</td><td><input type="text" name="input-field" value="'.$value2['quantity'].'"><button name="Update">Update</button><td><button name="Delete">Delete</button><input type ="text" hidden name="Val2" value="'.$key2.'"></td></tr></form>';

        }
        echo "<tr><td></td><td>Total</td><td>".$_SESSION['total']."</td><td></td></table>";
        echo "<form action='function.php' method='POST'><button class='empty' name='emptyCart'>Empty Cart</button></form>";
    }
}
if(isset($_POST['Update'])){
    foreach($_SESSION['cart'] as $key3 => $value3){
        if($key3==$_POST['Val2']){ 
            $_SESSION['cart'][$key3]['quantity']=$_POST['input-field'];
            header("location:products.php");
        }
    }
}
if(isset($_POST['Delete'])){
    unset($_SESSION['cart'][$_POST['Val2']]);
    header("location:products.php");
}
if(isset($_POST['emptyCart'])){
    unset($_SESSION['cart']);
    header("location:products.php");
}
include('footer.php');
