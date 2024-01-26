<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Table</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Data Table</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Detail</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Replace the following rows with your actual data -->
        @foreach( $posts as $post )
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->detail }}</td>
                <td><img src="{{ $post->image }}" alt="Sample Image" class="img-thumbnail" width="50"></td>
                <td>
                    <a href="{{route('post.show',$post->id)}}"><button type="button" class="btn btn-info">Show</button></a>
                    <a href="{{route('post.edit',$post->id)}}"><button type="button" class="btn btn-primary">Update</button></a>
                    <a href="{{route('post.destroy',$post->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
            </tr>

        @endforeach
        <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js (Optional) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
