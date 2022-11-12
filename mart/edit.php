<?php
	session_start();
	if (isset($_SESSION['nama_depan']))
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body, html{
            flex: 1;
            margin: 0;
            background-image: url(https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000);
            background-repeat: no-repeat;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 7px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid red;
            box-sizing: border-box;
        }
        input[type=submit]{
            padding: 10px 100px;
            margin-top: 10px;
            background-color: red;
            color: white;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
        .button{
            text-align: center;
        }
        .parent{
            margin: auto;
            padding: 10px;
            height: 800px;
            width: 500px;
            background-color: white;
        }
        .parent2{
            margin-left: 50px;
            margin-right: 50px;
        }
        img{
            width: 150px;
            height: 100px;
        }
    </style>
</head>
<body>
<?php
	include "koneksi.php";
    $KodeOrder = $_GET['KodeOrder'];
	$sql="select * from db_order where id_order = '$KodeOrder'";
	$query=mysqli_query($koneksi,$sql); 
    $data=mysqli_fetch_assoc($query);
?>
    <div class="parent">
        <h1 style="text-align: center;">EDIT</h1>
        <div class="parent2">
            <form name="formuser" method="POST" action="edituser.php" enctype="multipart/form-data">
                <input type="hidden" name="id_order" value="<?php echo $data['id_order']?>">
                <label>Nama :</label>
                <input type="text" name="customer_name" value="<?php echo $data['customer_name']?>">
                <label>Nama Produk :</label>
                <input type="text" name="product_name" value="<?php echo $data['product_name']?>">
                <label>Gambar Produk :</label><br><br>
                <img src="<?php echo $data['image']; ?>"><br><br>
                <label>Ganti Gambar :</label><br><br>
                <input type="file" name="image" value=""><br><br>
                <label>Tanggal :</label>
                <input type="text" name="date" value="<?php echo $data['date']?>">
                <label>Harga :</label>
                <input type="text" name="price" value="<?php echo $data['price']?>">
                <label>Banyak Produk :</label>
                <input type="text" name="number" value="<?php echo $data['number']?>">
                <label>Total Harga :</label>
                <input type="text" name="total_price" value="<?php echo $data['total_price']?>">
                <div class="button">
                    <input type="submit" value="EDIT">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    }
	else
	{
		echo "<script>
		alert ('Maaf anda tidak bisa akses halaman ini');
		location.href='login.php';
			
		</script>";	
	}
?>