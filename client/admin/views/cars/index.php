<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-center mb-4">
        <h2>Cars Management</h2>
        <a href="/?page=cars/create" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Car
        </a>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search cars...">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary">
                <i class="fas fa-filter me-1"></i>Filter
            </button>
            <button type="button" class="btn btn-outline-secondary">
                <i class="fas fa-sort me-1"></i>Sort
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Color</th>
                                <th>Fuel</th>
                                <th>Transmission</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be injected here via fetch() -->
                            <tr>
                                <td colspan="9" class="text-center text-muted">Loading cars...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <nav>
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tbody = document.querySelector('table tbody');

        fetch('http://127.0.0.1:8000/api/admin/cars')
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(cars => {
                tbody.innerHTML = ''; // Clear existing rows

                cars.forEach(car => {
                    const statusBadge = car.is_available ?
                        '<span class="badge bg-success">Available</span>' :
                        '<span class="badge bg-danger">Unavailable</span>';

                    const row = `
                        <tr>
                            <td>${car.id}</td>
                            <td>${car.make}</td>
                            <td>${car.model}</td>
                            <td>${car.year}</td>
                            <td>${car.color}</td>
                            <td>${car.fuel_type}</td>
                            <td>${car.transmission}</td>
                            <td>${statusBadge}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-info" href="/?page=cars/show&id=${car.id}" title="View"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary" href="/?page=cars/edit&id=${car.id}" title="Edit"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteCar(${car.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    tbody.insertAdjacentHTML('beforeend', row);
                });
            })
            .catch(error => {
                console.error('Fetch error:', error);
                tbody.innerHTML = `
                    <tr>
                        <td colspan="9" class="text-center text-danger">Failed to load car data.</td>
                    </tr>
                `;
            });
    });

    function deleteCar(id) {
        if (!confirm('Are you sure you want to delete this car?')) return;

        fetch(`http://127.0.0.1:8000/api/admin/cars/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(res => {
                if (!res.ok) throw new Error('Failed to delete car.');
                return res.json();
            })
            .then(result => {
                alert(result.message || 'Car deleted successfully.');
                window.location.reload(); // or redirect to index
            })
            .catch(err => {
                console.error(err);
                alert('Error deleting car.');
            });
    }
</script>