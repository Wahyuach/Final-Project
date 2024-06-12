<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            margin: auto;
        }

        .title_deg {
            color: white;
            padding: 40px;
            font-size: 30px;
            font-weight: bold;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_pad {
            padding: 10px;
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
                <div class="div_center">



                    <h1 class="title_deg">Add books</h1>
                    <form action="{{ url('store_book') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_pad">
                            <label>Title</label>
                            <input type="text" name="title">
                        </div>

                        <div class="div_pad">
                            <label>Author Name</label>
                            <input type="text" name="author_name">
                        </div>

                        <div class="div_pad">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>

                        <div class="div_pad">
                            <label>Category</label>

                            <select name="category" required>
                                <option>Select Category</option>
                                @foreach ($data as $data)
                                    <option value="{{ $data->id }}"> {{ $data->cat_title }}



                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="div_pad">
                            <label>Quantity</label>
                            <input type="number" name="quantity">
                        </div>

                        {{-- <div class="div_pad">
                            <label>Book Image</label>
                            <input type="file" name="book_img">
                        </div> --}}

                        <div class="div_pad">
                            <input class="btn btn-info" type="submit" value="Add book">
                        </div>

                    </form>

                </div>

                <div>

                </div>
            </div>
            @include('admin.footer')
</body>

</html>
