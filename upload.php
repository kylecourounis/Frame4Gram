<?php
$tmp_name = $_FILES["image"]["tmp_name"];
$name = basename($_FILES["image"]["name"]);

move_uploaded_file($tmp_name, "uploads/".$name);

print "
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
    
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='scripts/html2canvas.min.js'></script>
<script type='text/javascript'>
    function save()
    {
        html2canvas(document.querySelector('#frame')).then(canvas => 
        {
            var newDiv = document.createElement('div'); 
            newDiv.setAttribute('id', 'newImg');

            var image = new Image();
            image.src = canvas.toDataURL('image/png');

            newDiv.appendChild(image);

            var currentDiv = document.getElementById('frame'); 
            document.body.insertBefore(newDiv, currentDiv); 

            $('#frame').hide();
        });
    }
</script>

<style>
#user_img {
    background-image: url('"."uploads/".$name."');

    width: 598px;
    height: 537px;
    display: inline-block; 
    margin: 20 19 auto;
    vertical-align: middle;
    z-index: 1; position: fixed;
}

#frame {
    background-image: url(template.png);

    width: 640px;
    height: 640px;

    background-position: center;
    background-size: cover; 
    z-index: 2; position: fixed;
}

</style>

</head>
<body>
    <br>
    <input type='submit' value='Save' onclick='save()'>
    <br>
    <br>
    <div id='frame'>
        <img id='user_img' src='"."uploads/".$name."' />
    </div>
</body>
<html>
";

// unlink("uploads/".$name);

?>