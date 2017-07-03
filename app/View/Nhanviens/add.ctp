<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="error_add">
        <?php if(isset($errors))
                {
                    foreach($errors as $error)
                    {
                        echo $error[0];
                    }
                } 
        ?>
    </div>
  
    </body>
</html>