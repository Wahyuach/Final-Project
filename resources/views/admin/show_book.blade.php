<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

      <style type="text/css">
        .div_center {
            text-align: center;
            margin: auto;
        }

        .cat_label {
            font-size: 30px;
            font-weight: bold;
            padding: 30px;
            color: white;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            border: 1px solid white;
        }

        th {
            background-color: rgb(1, 39, 161);
            padding: 10px;
        }

        tr {
            border: 1px solid white;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->


    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">


                <div>
                    <table class="center">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Author Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Book Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $book)
                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->author_name}}</td>
                                    <td>{{$book->category_id}}</td>
                                    <td>{{$book->description}}</td>
                                    <td>{{$book->quantity}}</td>
                                    <td>{{$book->book_img}}</td>



                                    <td>
                                        <a href="{{ url('', $book->id) }}"
                                            class="btn btn-info">Update</a>

                                        <a href="{{ url('delete_book', $book->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>

                </div>



            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>
