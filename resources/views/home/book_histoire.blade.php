<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')

    <style type="text/css">
        .title_deg {
            border: 1px solid white;
            margin: auto;
            text-align: center;
            margin-top: 100px;
        }


        th {
            background-color: rgb(0, 9, 39);
            padding: 20px;
            background-color: white;
        }

        tr {
            border: 1px solid white;
        }

        td {
            color: white;
            padding: 20px;
            background-color: black;
            border: 1px solid white;
        }
    </style>
</head>

<body>
    @include('home.header')

    <div class="item-details-page">
        <div class="container">
            <div class="row">


                


                <table class="title_deg">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Book Image</th>
                            <th>Cancel Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->book->title }}</td>
                                <td>{{ $d->book->author_name }}</td>

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
                                    <a href="{{ url('cancel_req', $d->id) }}" class="btn btn-danger">Cancel</a>
                                </td>

                            </tr>
                        @endforeach
                </table>



            </div>
        </div>
    </div>

    @include('home.footer')
</body>

</html>
