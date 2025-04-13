<div class="sidebar bg-dark">
    <div class="sidebar-header">
        <h3 class="text-light text-center py-4 m-0">Admin Panel</h3>
    </div>
    <hr class="bg-light m-0">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="?page=dashboard/index" class="nav-link <?php echo ($page == 'dashboard/index' || $page == '/') ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="?page=cars/index" class="nav-link <?php echo ($page == 'cars/index') ? 'active' : ''; ?>">
                <i class="fas fa-car me-2"></i>Cars
            </a>
        </li>
        <!-- Add more menu items as needed -->
    </ul>
</div>