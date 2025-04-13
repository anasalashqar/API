<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include_once 'sidebar.php'; ?>

        <div class="main-content">
            <!-- Navbar -->
            <?php include_once 'navbar.php'; ?>

            <!-- Page Content -->
            <div class="container-fluid py-4">
                <?php include_once $view_path; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Prevent redirect loop if already on login page
            const isLoginPage = window.location.href.includes('page=login');

            if (!sessionStorage.getItem('sessionChecked') && !isLoginPage) {
                fetch('http://127.0.0.1:8000/api/profile', {
                    headers: {
                        'Accept': 'application/json'
                    },
                }).then(res => {
                    if (res.status === 401) {
                        window.location.href = '?page=login';
                    } else {
                        sessionStorage.setItem('sessionChecked', 'true');
                    }
                }).catch(err => {
                    console.error('API session check failed:', err);
                });
            }
        });
    </script>


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>

</html>