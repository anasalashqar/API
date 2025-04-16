<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Edit Car</h2>
        <form id="editCarForm">
            <input type="hidden" id="carId" value="<?= htmlspecialchars($carId) ?>">

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="make" class="form-label">Make</label>
                    <input type="text" class="form-control" id="make" name="make" required>
                </div>
                <div class="col-md-4">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="col-md-4">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color">
                </div>
                <div class="col-md-4">
                    <label for="fuel_type" class="form-label">Fuel Type</label>
                    <select class="form-select" id="fuel_type" name="fuel_type">
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electric">Electric</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="transmission" class="form-label">Transmission</label>
                    <select class="form-select" id="transmission" name="transmission">
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="mileage" class="form-label">Mileage</label>
                    <input type="number" class="form-control" id="mileage" name="mileage">
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01">
                </div>
                <div class="col-md-4">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input type="url" class="form-control" id="image_url" name="image_url">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="is_available" name="is_available">
                <label class="form-check-label" for="is_available">Available</label>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update Car</button>
        </form>
    </div>
</div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const carId = urlParams.get('id');
    const endpoint = `http://127.0.0.1:8000/api/admin/cars/${carId}`;
    const form = document.getElementById('editCarForm');

    // Fetch existing car data
    fetch(endpoint)
        .then(res => {
            if (!res.ok) throw new Error('Failed to fetch car');
            return res.json();
        })
        .then(car => {
            form.make.value = car.make;
            form.model.value = car.model;
            form.year.value = car.year;
            form.color.value = car.color ?? '';
            form.fuel_type.value = car.fuel_type ?? 'Petrol';
            form.transmission.value = car.transmission ?? 'Automatic';
            form.mileage.value = car.mileage ?? 0;
            form.price.value = car.price ?? 0;
            form.image_url.value = car.image_url ?? '';
            form.description.value = car.description ?? '';
            form.is_available.checked = !!car.is_available;
        })
        .catch(error => {
            alert('Error loading car: ' + error.message);
        });

    // Submit PUT update
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const data = {
            make: form.make.value,
            model: form.model.value,
            year: form.year.value,
            color: form.color.value,
            fuel_type: form.fuel_type.value,
            transmission: form.transmission.value,
            mileage: form.mileage.value,
            price: form.price.value,
            description: form.description.value,
            image_url: form.image_url.value,
            is_available: form.is_available.checked
        };

        fetch(endpoint, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => {
            if (!res.ok) throw res;
            return res.json();
        })
        .then(result => {
            alert('Car updated successfully!');
            window.location.href = '?page=cars/index'; // redirect after success
        })
        .catch(async err => {
            const errorData = await err.json();
            alert('Error updating car: ' + (errorData.message || 'Validation error'));
            console.error(errorData);
        });
    });
</script>
