<!DOCTYPE html>
<html>

<head>
    @include('admin.css')


    <style type="text/css">
        .div_deg {
            text-align: center;
            margin: auto;
        }

        .title_deg {
            color: white;
            padding: 40px;
            font-size: 30px;
            font-weight: bold;
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
                    <div>

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            </div>
                        @endif
                    </div>
                    <h2 class="title_deg">Update Category</h2>

                    <form action="{{ url('update_cat', $data->id) }}" method="POST">
                        @csrf
                        <span style="padding-right: 15px;">
                            <label>Category Name</label>
                            <input type="text" name="cat_name" value="{{ $data->cat_title }}">
                        </span>

                        <input type="submit" class="btn btn-info" value="Update">
                    </form>
                </div>














            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>
