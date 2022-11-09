<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Blog | Dashboard</title>

  <link rel="stylesheet" href="/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="/template/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="/template/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="/template/css/start-dashboard.css">
  <link rel="stylesheet" href="/template/css/select.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>
<body>
    <div class="container-scroller">
        @include('template.dashboard.layouts.header')

        <div class="container-fluid page-body-wrapper">

            @include('template.dashboard.layouts.setting')
            @include('template.dashboard.layouts.sidebar')

            <div class="main-panel">
                @yield('container')
            </div>
        </div>

    </div>

    <script src="/template/js/vendor.bundle.base.js"></script>
    <script src="/template/js/Chart.min.js"></script>
    <script src="/template/js/bootstrap-datepicker.min.js"></script>
    <script src="/template/js/progressbar.min.js"></script>

    <script src="/template/js/off-canvas.js"></script>
    <script src="/template/js/hoverable-collapse.js"></script>
    <script src="/template/js/template.js"></script>
    <script src="/template/js/settings.js"></script>
    <script src="/template/js/todolist.js"></script>

    <script type="text/javascript" src="/js/trix.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> --}}

    <script src="/template/js/jquery.cookie.js"></script>
    <script src="/template/js/dashboard.js"></script>
    <script src="/template/js/Chart.roundedBarCharts.js"></script>
</body>