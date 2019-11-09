<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
    
    <h2>Expert Enquiry Details</h2>
    <h3>Hi Admin,<br>
            Following user has requested for hire expert.<br><br></h3>
<?php echo "<table border=1>" .
                    "<tr>" .
                    "<td>Name:</td>" .
                    "<td>" . $user['name'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Email:</td>" .
                    "<td>" . $user['email'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Phone No:</td>" .
                    "<td>" . $user['mobile'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Company :</td>" .
                    "<td>" . $user['subject'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Token:</td>" .
                    "<td>" . $user['token'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Product Name:</td>" .
                    "<td>" . $user['product_name'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Product Price:</td>" .
                    "<td>" . $user['product_price'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Message :</td>" .
                    "<td>" . $user['comment'] . "</td>" .
                    "</tr>" .
                    "</table>" . "<br>".
                    "Thank You<br>".
                    "<b>Xtacky Group</b><br>";
?>
        </body>
</html>