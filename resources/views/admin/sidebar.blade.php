<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>

    <!-- Sidebar Navigation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="index.html"><i class="icon-home"></i>Home</a></li>
        <li><a href="{{ url('category_page') }}"><i class="icon-grid"></i>Category</a></li>

        <li>
            <!-- Link to collapse the Product submenu -->
            <a href="#productSubmenu" aria-expanded="false" data-toggle="collapse"><i class="icon-windows"></i>Books</a>
            <ul id="productSubmenu" class="collapse list-unstyled">
                <li><a href="{{ url('add_book') }}">Add Books</a></li>
                <li><a href="{{ url('show_book') }}">Show Book</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
        <li><a href="{{ url('borrow_request') }}"><i class="icon-logout"></i>Borrow Request</a></li>
    </ul>

    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li><a href="#"><i class="icon-settings"></i>Demo</a></li>
        <li><a href="#"><i class="icon-writing-whiteboard"></i>Demo</a></li>
        <li><a href="#"><i class="icon-chart"></i>Demo</a></li>
    </ul>
</nav>

<!-- Ensure to include necessary JS libraries such as jQuery and Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
