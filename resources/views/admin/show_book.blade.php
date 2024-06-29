<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
        .table_center {
            text-align: center;
            margin: auto;
            border: 1px solid yellowgreen;
            margin-top: 50px;

        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 15px;
            font-weight: bold;
            color: black;

        }

        .img_auther {
            width: 80px;
            border-radius: 50px;

        }

        .img_book {
            width: 150px;
            height: auto;
            padding: 10px;

        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{-- {{ session()->get('message') }} --}}
                        </div>
                    @endif
                    <div>
                        <table class="table_center">
                            <tr>
                                <th>Book Title</th>
                                <th>Auther Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Auther Image</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>

                            @foreach ($book as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->auther_name }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->category->cat_title }}</td>

                                    {{-- <td><img src="auther/{{ $book->auther_img }}" alt="Auther Image" width="50"></td>
                                    <td><img src="book/{{ $book->book_img }}" alt="Book Image" width="50"></td> --}}
                                    <td><img class="img_auther" src="auther/{{ $book->auther_img }}" alt="Auther Image"
                                            width="50"></td>
                                    <td><img class="img_book" src="book/{{ $book->book_img }}" alt="Book Image"
                                            width="50"></td>
                                    <td>
                                        <a onclick="confirmation(event)" href="{{ url('book_delete', $book->id) }}"
                                            class="btn btn-danger"> Delete
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_book', $book->id) }}" class="btn btn-info">Update
                                        </a>
                                    </td>


                                </tr>
                            @endforeach



                        </table>
                    </div>

                </div>
            </div>
        </div>

        @include('admin.footer')

        <script>
            function confirmation(ev) {
                ev.preventDefault();
                var urlToredirect = ev.currentTarget.getAttribute('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = urlToredirect;
                    }
                });
            }
        </script>

</body>

</html>
