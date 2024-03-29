<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('layouts.header')

    <div class="container mt-5">
        <h2 class="mb-4">Product Update</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('products.update.post', $product->uniqid) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @foreach ($product->images as $image)
                <div class="form-group">
                    <img src="{{ asset('images/' . $image->image) }}" alt="Product Image" style="max-width: 100px;">
                    <a href="#" class="btn btn-sm btn-danger"
                        onclick="deleteImage(event, {{ $image->id }})">X</a>
                </div>
            @endforeach

            <div class="form-group">
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

    @include('layouts.footer')

    <!-- Bootstrap JS ve Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteImage(event, id) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this image?')) {
                fetch(`/products/delete-image/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            event.target.parentNode.remove();
                        } else {
                            console.error('Error:', response.statusText);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>


</body>

</html>
