<?php
    $conn=mysqli_connect("localhost","root","","moviewebsite");
    if(!$conn){
        die("Connection failed".mysqli_connect_error());
    }
    if(isset($_POST['query'])){
        $search =$_POST['query'];
        $query_voucher ="SELECT * FROM voucher WHERE name LIKE '{$search}%'";
    }else{
        $query_voucher="SELECT * FROM voucher ORDER BY id LIMIT 0,10";
    }

    $result =mysqli_query($conn,$query_voucher);
    if(mysqli_num_rows($result)>0){
        $output="
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Discount Percentage</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        ";
        
        while($row =mysqli_fetch_assoc($result)){
            $output.="
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['code']}</td>
                    <td>{$row['discount_percentage']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <button class='text-center bg-warning rounded '>Update</button>
                    </td>
                    <td>
                        <button class='text-center bg-danger rounded  '>Delete</button>
                    </td>
                </tr>
            ";

        }
        $output.="</tbody>";
        echo $output;

        
    }else{
        echo "<p>Not Found Data</p>";
    }
?>