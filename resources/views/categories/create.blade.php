<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    
    <form action="{{ Route("category.store")}}" method="post">
        @csrf
        <input type='text' name="name" placeholder="Category Name"/>
        <input type="submit" value="Create">
    </form>

</body>
</html>