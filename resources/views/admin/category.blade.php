<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


                <div class="div_center">

                    <div>

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            </div>
                        @endif
                    </div>
                    <h1 class="cat_label">Add Category</h1>

                    <form action="{{ url('add_category') }}" method="POST">
                        @csrf
                        <span style="padding-right: 15px;">
                            <label>Category Name</label>
                            <input type="text" name="category" required>
                        </span>

                        <input class="btn btn-outline-danger" type="submit" value="Add Category">
                    </form>

                    <div>

                        <table class="center">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->cat_title }}</td>
                                        <td>


                                            <a href="{{ url('edit_cat', $data->id) }}"
                                                class="btn btn-info">Update</a>

                                            <a onclick="confirmation(event)" href="{{ url('cat_delete', $data->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')

    <script type="text/javascript">
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
        }

        swal({
                title: "Are you sure want to delete this.",
                text: "You will not be able to get it back.",
                icon: "warning",
                buttons: true,
                dangermode: true,

            })
            .then((willCancel))=>{
                if(willCancel){
                    window.location.href=urlToRedirect;
                }
            }
    </script>


</body>

</html>
