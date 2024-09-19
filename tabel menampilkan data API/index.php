<?php
$sumber ='https://dummyjson.com/users?limit=30'; //identifikasi sumber
$konten =file_get_contents($sumber); //mengambil konten
$data=json_decode($konten, true); //konfersi dari json ke array
// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1{
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>Menampilkan data dari api</title>

</head>
<body>
    <h1>Menampilkan Data Dengan API</h1>
    <table>
    <tr>
        <!-- <th>Foto</th> -->
        <th>Nama Lengkap</th><th>Usia</th><th>Jenis Kelamin</th><th>Tanggal Lahir</th><th>Alamat</th>
    </tr>
    <?php
    //inisiasi dari sumber (users) ke variabel row
        foreach ($data['users'] as $row){       
    ?>
    <tr>
        <!-- <td><img src="<?php echo $row['image']?>" alt="ini foto"></td> -->
        <td><?php echo $row['firstName'].' '. $row['lastName']?></td>
        <td><?php echo $row['age']. ' Tahun'?></td>
        <td><?php echo $row['gender']?></td>
        <td><?php echo $row['birthDate']?></td>
        <td><?php echo $row['address']['address'].','.$row['address']['city'] . ', ' . 
         $row['address']['state'] . ' ' . 
         $row['address']['postalCode'] . ', ' . 
         $row['address']['country'];
        ?></td>
    </tr>
<?php }?>
</table>
    
</body>
</html>