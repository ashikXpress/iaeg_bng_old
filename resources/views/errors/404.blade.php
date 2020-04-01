<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oops! This Page is Not Working</title>
    <!-- Favicon -->
    @include('layouts.assets.__style')
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-sm-12 text-center">
            <div class="iq-error error-500">
                <h1 class="text-primary">404</h1>
                <!-- <img src="images/error/03.png" class="img-fluid iq-error-img" alt=""> -->
                <h2 class="mb-0">Oops! This Page is not Found.</h2>
{{--                <p>The requested is Internal Server Error.</p>--}}
                <a class="btn btn-primary mt-3" href="{{url('/')}}"><i class="ri-home-4-line"></i>Back to Home</a>

            </div>
        </div>
    </div>
</div>
<!-- Wrapper END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('layouts.assets.__script')
</body>

</html>
