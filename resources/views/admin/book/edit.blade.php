{{-- @extends('admin.layout')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="edit-form">
                <form action="{{ route('admin.book.update', $book->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class=" form-group mb-0">
                        <label for="title">Title</label>
                        <div class="title input-group">
                            <input type="text" class="form-control" placeholder="name of the book" name="name"
                                value=" {{ $book->name }}">
                        </div>
                </div>
                    <div class=" form-group mb-0">
                        <label for="title">Author name</label>
                        <div class="author-name">
                            <input type="text" class="form-control" placeholder="author-name" name="author_name"
                                value=" {{$book->author_name}}">
                        </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for="title">Image</label>
                        <div class="content">
                            <input type="file" class="form-control" placeholder="upload image" name="image"
                                value=" {{$book->image}}">
                        </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for="Category">Category</label>
                        <div class="category-book input-group">
                            <select name="categories_id" class="form-control">
    
                                @foreach($categories as $category)
                                <option value="{{ $category->id === $book->category_id ? ' selected' : '' }}">{{
                                    $category->name }}</option>
                                @endforeach
    
                            </select>
                        </div>
                    </div>
                    <div class=" form-group mb-0">
                        <label for="title">Price</label>
                        <div class="author-name">
                            <input type="text" class="form-control" placeholder="eg:350" name="price"
                                value=" {{$book->price}}">
                        </div>
                    </div>
    
                    <div class="button">
                        <button type="submit" class="btn btn-secondary btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>
{{-- @endsection --}}