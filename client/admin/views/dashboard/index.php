<div class="row">
    <div class="col-12">
        <h2>Dashboard</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Cars</h5>
                        <h2 class="mb-0">215</h2>
                    </div>
                    <i class="fas fa-car fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Available</h5>
                        <h2 class="mb-0">180</h2>
                    </div>
                    <i class="fas fa-check-circle fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Under Maintenance</h5>
                        <h2 class="mb-0">15</h2>
                    </div>
                    <i class="fas fa-tools fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Reserved</h5>
                        <h2 class="mb-0">20</h2>
                    </div>
                    <i class="fas fa-calendar-check fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                Recent Activity
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Car ID</th>
                            <th>Model</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#12345</td>
                            <td>Toyota Camry</td>
                            <td><span class="badge bg-success">Available</span></td>
                            <td>Today, 10:30 AM</td>
                        </tr>
                        <tr>
                            <td>#12346</td>
                            <td>Honda Civic</td>
                            <td><span class="badge bg-warning">Maintenance</span></td>
                            <td>Yesterday, 3:15 PM</td>
                        </tr>
                        <tr>
                            <td>#12347</td>
                            <td>Ford Mustang</td>
                            <td><span class="badge bg-danger">Reserved</span></td>
                            <td>Apr 10, 9:00 AM</td>
                        </tr>
                        <tr>
                            <td>#12348</td>
                            <td>Tesla Model 3</td>
                            <td><span class="badge bg-success">Available</span></td>
                            <td>Apr 9, 2:45 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                By Car Type
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Sedan (45%)</label>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>SUV (30%)</label>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Truck (15%)</label>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Sports (10%)</label>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>