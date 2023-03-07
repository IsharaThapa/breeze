<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="row">
               <div class="col-6">
                    <form action=" {{ route('admin.search') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control bg-light border-2 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        
                        </div>
                    </form>
               </div>
                <div class="col-6">
                    <div class="button add-post">
                        <a href="/admin/blog/create"><button type="submit" class="btn btn-primary top-bottom">Add
                                blog</button></a>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="index-table">
                    <table class="table table-stripped 1px ">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Title</td>
                                <td>Body</td>
                                <td>Category</td>
                                <td>Image</td>
                                <td>Author Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ Str::limit($blog->body, 15, '...') }}</td>
                                <td>{{ $blog->category->name }}</td>
                                {{-- <td>@if ($blog->image)
                                    <img src="/images/{{$blog->image}}" height="50px" width="50px">
                                    @endif
                                </td> --}}
                                <td>
                                    <img src="{{ $blog->getFirstMediaUrl() != null ? $blog->getFirstMediaUrl() : $blog->getFirstMediaUrl('image')   }}" alt="" width="100px">
                                </td>
                                <td>{{ $blog->author_name }}</td>
                                <td>
                                    <div class="action">
                                        <div class="action-button">
                                            <div class="edit-button">
                                                <a href="{{ route('admin.blog.edit',$blog->slug)}}"
                                                    class="btn btn-secondary  edit-btn">Edit</a>
                                            </div>
                                            <div class="delete-button">
                                                <form action="{{route('admin.blog.destroy', $blog->slug)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger delete-btn" type="submit">Delete</a>
                                                </form>
                                            </div>
    
                                        </div>
    
    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                    <div class="row">
                        {{ $blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
</html>