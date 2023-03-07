<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <div class="heading">
            <div class="cart_added text-danger"></div>
            <h2 class="book">
                Books
            </h2>
        </div>
        <div class="book-content">
            @foreach($books as $book)
            <div class="book-card">
                <div class="card-heading">
                    <div class="row">
                        <div class="col-8">
                            {{-- <div class="card-image">
                                <img src="{{ $book->getFirstMediaUrl() != null ? $book->getFirstMediaUrl() : $book->getFirstMediaUrl('image')   }}"
                                    alt="" width="300px">
                            </div> --}}
                        </div>
                        <div class="col-3">
                            <form action="{{ url('addtocart',$book->id) }}" method="post" id="cart">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="number" name="quantity">
                                <button type="submit" class="cart-submit" data-id="{{ $book->id }}"> <i
                                        class="bi bi-cart"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">
                    {{$book->name}}
                </div>
                <div class="book-price">
                    {{$book->price}}
                </div>
                <div class="book-author">
                    {{$book->author_name}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#cart').submit(function(event){
            event.preventDefault();
            var cartadded = document.querySelector(".cart_added")
            $.ajax({
                url: $(this).attr('action'),
                type : "POST",
                data : $(this).serialize(),
                headers: "{{csrf_token() }}",
                success: function(response){
                    // console.log('here');
                    cartadded.innerText = response.message;
                },
                error: function (e){
                    // echo "There is an error on adding items to cart."
                    console.log(e);
                }
            })
        })
    })
</script>

</html>