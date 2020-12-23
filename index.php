<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1 class="display-4 text-center"><i class="fas fa-book-open"></i><span class="text-primary">Book</span> List</h1>
        <form action="" id="book-form">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control">
            </div>
            <input type="submit" value="ADD" class="btn btn-primary btn-block">
        </form>
        <table class="table table-striped mt-5">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN#</th>
                <th></th>
                <tbody id="book-list">

                </tbody>
            </tr>
        </table>
    </div>

    <script src="app.js"></script>
</body>

</html>