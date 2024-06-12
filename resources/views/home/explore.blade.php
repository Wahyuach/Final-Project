<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    @include('home.header')


    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2><em>Items</em> Currently</h2>
                    </div>
                </div>
    
    
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div class="filters">
                        <ul>
                            <li data-filter="*" class="active">All Books</li>
                            <li data-filter=".msc">Popular</li>
                            <li data-filter=".dig">Latest</li>
    
                        </ul>
                    </div>
                </div>
    
    
    
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        </div>
                    @endif
                </div>
    
                <div class="col-lg-9">
                    <div class="row grid">
    
    
                        @foreach ($data as $data)
                            <div class="col-lg-6 currently-market-item all msc">
                                <div class="item">
                                    <div class="left-image">
                                        <img src="{{ $data->book_img }}" alt=""
                                            style="border-radius: 20px; min-width: 195px;">
                                    </div>
                                    <div class="right-content">
                                        <h4>{{ $data->title }}</h4>
                                        <span class="author">
                                            <h6>{{ $data->author_name }}</h6>
                                        </span>
                                        <div class="line-dec"></div>
                                        <span class="bid">
                                            Current Available<br><strong>{{ $data->quantity }}</strong><br>
                                        </span>
                                        <div class="text-button">
                                            <a href="{{ url('book_details', $data->id) }}">View Book Detail</a>
                                        </div>
                                        <br>
                                        <div class="text-button">
                                            <a class="btn btn-primary" href="{{ url('borrow_books', $data->id) }}">Apply
                                                to borrow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
    
    
    
    
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('home.footer')
</body>

</html>
