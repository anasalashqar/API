<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Car Details</h2>
        <div id="carDetails" class="card shadow-sm">
            <div class="card-body">
                <p><strong>Make:</strong> <span id="car-make"></span></p>
                <p><strong>Model:</strong> <span id="car-model"></span></p>
                <p><strong>Year:</strong> <span id="car-year"></span></p>
                <p><strong>Color:</strong> <span id="car-color"></span></p>
                <p><strong>Fuel Type:</strong> <span id="car-fuel"></span></p>
                <p><strong>Transmission:</strong> <span id="car-transmission"></span></p>
                <p><strong>Mileage:</strong> <span id="car-mileage"></span> km</p>
                <p><strong>Price:</strong> $<span id="car-price"></span></p>
                <p><strong>Status:</strong> <span id="car-status" class="badge"></span></p>
                <p><strong>Description:</strong></p>
                <p id="car-description" class="fst-italic text-muted"></p>
                <div class="mt-4">
                    <img id="car-image" src="" alt="Car Image" class="img-fluid rounded border" style="max-width: 400px;">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const carId = urlParams.get('id');
    
    const endpoint = `http://127.0.0.1:8000/api/admin/cars/${carId}`;

    fetch(endpoint)
        .then(response => {
            if (!response.ok) throw new Error("Car not found");
            return response.json();
        })
        .then(car => {
            document.getElementById('car-make').textContent = car.make;
            document.getElementById('car-model').textContent = car.model;
            document.getElementById('car-year').textContent = car.year;
            document.getElementById('car-color').textContent = car.color ?? 'N/A';
            document.getElementById('car-fuel').textContent = car.fuel_type ?? 'N/A';
            document.getElementById('car-transmission').textContent = car.transmission ?? 'N/A';
            document.getElementById('car-mileage').textContent = car.mileage ?? '0';
            document.getElementById('car-price').textContent = parseFloat(car.price).toFixed(2);
            document.getElementById('car-description').textContent = car.description ?? 'No description provided';

            const statusBadge = document.getElementById('car-status');
            if (car.is_available) {
                statusBadge.textContent = 'Available';
                statusBadge.classList.add('bg-success');
            } else {
                statusBadge.textContent = 'Unavailable';
                statusBadge.classList.add('bg-danger');
            }

            document.getElementById('car-image').src = car.image_url || 'https://via.placeholder.com/400x300?text=No+Image';
        })
        .catch(error => {
            document.getElementById('carDetails').innerHTML = `
                <div class="card-body text-danger text-center">
                    <p><strong>Failed to load car details:</strong> ${error.message}</p>
                </div>
            `;
        });
</script>