<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])   
     
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <!-- top navbar -->
        <x-navbar/>
        <div id="layoutSidenav">
           <!-- left sidebar  -->
            <x-sidebar/>
            <div id="layoutSidenav_content">
                <main >
                    <div class="container-fluid  px-4">
                        <h1 class="mt-4">Dashboard</h1>
                       @yield('adminSection')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Finlink 2025</div>
                          
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
    </body>
</html>
