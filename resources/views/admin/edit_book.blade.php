<!DOCTYPE html>
<html>

<head>
    @include('admin.css')


    <style type="text/css">
        .div_deg {
            text-align: justify;
            margin: auto;
        }

        .title_deg {
            color: white;
            padding: 40px;
            font-size: 30px;
            font-weight: bold;
        }

        .div_pad {
            padding: 10px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .textarea {
            text-align: justify;
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


                <div class="div_deg">

                    <h2 class="title_deg">Update Category</h2>

                    <form action="{{url('update_book', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_pad">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $data->title }}">
                        </div>
                        <div class="div_pad">
                            <label>Author Name</label>
                            <input type="text" name="author_name" value="{{ $data->author_name }}">
                        </div>
                        <div class="div_pad">
                            <label>Quantity</label>
                            <input type="text" name="quantity" value="{{ $data->quantity }}">
                        </div>
                        <div class="div_pad">
                            <label class="textarea">Description</label>
                            <textarea name="description" value="{{ $data->description }}">{{ $data->description }}</textarea>
                        </div>

                        <div class="div_pad">
                            <label>Category</label>
                            <select name="category">

                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }} ">{{ $cat->cat_title }}</option>
                                @endforeach
                            </select>

                        </div>

                        {{-- <div class="div_pad">
                            <label>Book Image</label>
                            <input type="file" name="book_img">
                        </div> --}}

                        <div class="div_pad">
                            <input class="btn btn-info" type="submit" value="Edit book">
                        </div>

                    </form>
                </div>














            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>
