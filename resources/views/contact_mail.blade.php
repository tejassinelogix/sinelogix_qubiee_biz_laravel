
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
    
    <h2>Enquiry Details</h2>
    <h3>Hi Admin,<br>
            Following user has requested for let's talk.<br><br></h3>
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
                    "<td>" . $user['company'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td>Message :</td>" .
                    "<td>" . $user['message'] . "</td>" .
                    "</tr>" .
                    "</table>" . "<br>".
                    "Thank You<br>".
                    "<b>Xtacky Group</b><br>";
?>
        </body>
</html>