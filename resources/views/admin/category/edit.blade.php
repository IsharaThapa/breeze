<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit category </title>
</head>
<body>
    <main>
        <div class="container">
            <div class="edit-form">
                <form action ="/admin/category/{{ $category->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="category-name">
                        <input type="text" class="form-control" placeholder="animals" name="name" value=" {{ $category->name }}" >
                    </div>
                    <label for="number">Parent Category</label>
                        <select class="form-control form-control-user" name="parent_id">
                             <option value="">{{ !empty($category->parent->name)? $category->parent->name : 'Select category' }}</option>
                            @foreach($listCategory as $categoryList)
                                <option value="{{ $categoryList->id }}">{{ $categoryList->name }}</option>
                            @endforeach
                         </select>
              
                <div class="button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>