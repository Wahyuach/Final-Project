<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    @include('home.header')



    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details <em>For {{ $data->title }}</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="left-image">
                        <img src="{{ $data->book_img }}" alt="" style="border-radius: 20px; min-width: 195px;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h4>{{ $data->title }}</h4>
                    <span class="author">
                        <h6>{{ $data->author_name }}</h6>
                    </span>
                    <p>{{$data->description}}</p>
                    <div class="row">
                        <div class="col-5">
                            <span class="ends">
                                Total Quantity<br><strong>20</strong><br>
                            </span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('home.footer')
</body>

</html>
