<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/url"> 
        $csrf
        <p>
            <input type="text" name="productDescription"  placeholder="Mô tả của sản phẩm" >
        </p>
        <p>
            <input type="text" name="listPrice" placeholder="Giá">
        </p>
        <p>
            <input type="text" name="discountPercent" placeholder="Giá chiết khấu">
        </p>
        <p>
        <button type="submit">Submit</button>
    </p>

    </form>


</body>
</html>