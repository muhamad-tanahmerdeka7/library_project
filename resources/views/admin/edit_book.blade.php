<!DOCTYPE html>
<html>

<head>
    <!-- Tambahkan CSS di sini atau tautkan file CSS eksternal -->
    <style>
        /* Mengatur agar seluruh body memiliki margin dan padding nol dan tinggi minimal 100vh */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        /* Mengatur layout utama agar fleksibel dan memusatkan konten */
        .page-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            /* Padding atas dan bawah ditambahkan */
        }

        /* Mengatur styling container form */
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Styling untuk wrapper kolom */
        .form-row {
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }

        /* Styling untuk kolom kiri dan kanan */
        .form-column {
            flex: 1;
            min-width: 280px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Styling untuk setiap label dan input */
        .form-item label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-item input,
        .form-item select,
        .form-item textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-item textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Styling untuk gambar author dan book */
        .form-item img {
            display: block;
            margin-top: 10px;
            border-radius: 8px;
            max-width: 100%;
        }

        /* Styling untuk tombol submit */
        .form-item-submit {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-item-submit input {
            background-color: #17a2b8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-item-submit input:hover {
            background-color: #138496;
        }
    </style>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="form-container">
                <form action="{{ url('update_book', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <!-- Kolom Kiri -->
                        <div class="form-column">
                            <div class="form-item">
                                <label for="title">Book Title</label>
                                <input type="text" name="title" id="title" value="{{ $data->title }}">
                            </div>
                            <div class="form-item">
                                <label for="auther_name">Auther Name</label>
                                <input type="text" name="auther_name" id="auther_name"
                                    value="{{ $data->auther_name }}">
                            </div>
                            <div class="form-item">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" value="{{ $data->price }}">
                            </div>
                            <div class="form-item">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" value="{{ $data->quantity }}">
                            </div>
                            <div class="form-item">
                                <label>Current Author Image</label>
                                <img src="/auther/{{ $data->auther_img }}" alt="Author Image">
                            </div>
                            <div class="form-item">
                                <label>Change Author Image</label>
                                <input type="file" name="auther_img">
                            </div>
                        </div>
                        <!-- Kolom Kanan -->
                        <div class="form-column">
                            <div class="form-item">
                                <label for="description">Description</label>
                                <textarea name="description" id="description">{{ $data->description }}</textarea>
                            </div>
                            <div class="form-item">
                                <label for="category">Category</label>
                                <select name="category" id="category">
                                    <option value="{{ $data->category_id }}">{{ $data->category->cat_title }}</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-item">
                                <label>Current Book Image</label>
                                <img src="/book/{{ $data->book_img }}" alt="Book Image">
                            </div>
                            <div class="form-item">
                                <label>Change Book Image</label>
                                <input type="file" name="book_img">
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Submit di Tengah -->
                    <div class="form-item-submit">
                        <input type="submit" value="Update Book">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>
