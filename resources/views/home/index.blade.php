<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('home.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    @include('home.main_banner')
    <!-- ***** Main Banner Area End ***** -->

    {{-- Category --}}
    @include('home.category')


    {{-- Book --}}

    @include('home.book')

    {{-- Footer --}}
    @include('home.footer')
    @include('home.script')



</body>

</html>
