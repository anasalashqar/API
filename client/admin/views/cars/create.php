<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Add New Car</h2>
        <form id="createCarForm">
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
                    <input type="number" class="form-control" id="year" name="year" required min="1900" max="2099">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color">
                </div>
                <div class="col-md-4">
                    <label for="fuel_type" class="form-label">Fuel Type</label>
                    <select class="form-select" id="fuel_type" name="fuel_type" required>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electric">Electric</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="transmission" class="form-label">Transmission</label>
                    <select class="form-select" id="transmission" name="transmission" required>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="mileage" class="form-label">Mileage (km)</label>
                    <input type="number" class="form-control" id="mileage" name="mileage">
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <div class="col-md-4">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="image_url" name="image_url">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="is_available" name="is_available" checked>
                <label class="form-check-label" for="is_available">
                    Available
                </label>
            </div>

            <button type="submit" class="btn btn-success"><i class="fas fa-save me-2"></i>Save Car</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('createCarForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
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

        fetch('http://127.0.0.1:8000/api/admin/cars', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(res => {
                if (!res.ok) throw res;
                return res.json();
            })
            .then(result => {
                alert('Car added successfully!');
                form.reset();
            })
            .catch(async (err) => {
                const errorData = await err.json();
                alert('Error: ' + (errorData.message || 'Something went wrong.'));
                console.error(errorData);
            });
    });
</script>