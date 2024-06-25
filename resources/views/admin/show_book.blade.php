<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

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
                                <th>Book Image</th>
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
                                </tr>
                            @endforeach



                        </table>
                    </div>

                </div>
            </div>
        </div>

</body>

</html>
