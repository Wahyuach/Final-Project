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

        </style
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

            </div>
            <table class="center">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Book Title</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Book Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->user->name }}</td>
                            <td>{{ $d->user->email }}</td>
                            <td>{{ $d->user->phone }}</td>
                            <td>{{ $d->book->title }}</td>
                            <td>{{ $d->book->quantity }}</td>

                            <td>
                                @if ($d->status == 'Approved')
                                    <span style="color:greenyellow">{{ $d->status }}</span>
                                @endif

                                @if ($d->status == 'Rejected')
                                    <span style="color:red">{{ $d->status }}</span>
                                @endif

                                @if ($d->status == 'Returned')
                                    <span style="color:blue">{{ $d->status }}</span>
                                @endif
                                @if ($d->status == 'Applied')
                                    <span style="color:white">{{ $d->status }}</span>
                                @endif

                            </td>

                            <td>{{ $d->book->book_img }}</td>




                            <td>

                                <a href="{{ url('approve_b', $d->id) }}" class="btn btn-info">Approve</a>
                                <a href="{{ url('reject_b', $d->id) }}" class="btn btn-danger">Reject</a>
                                <a href="{{ url('returned_b', $d->id) }}" class="btn btn-warning">Returned</a>
                            </td>
                        </tr>
                    @endforeach
            </table>

        </div>
    </div>
    @include('admin.footer')
</body>

</html>
