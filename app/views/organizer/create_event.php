<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2>Create Event</h2>
        <?php flash_alert(); ?>
        <form id="createEventForm">
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
                <small class="text-danger" id="titleError"></small>
            </div>
            <div class="mb-3">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="mb-3">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="mb-3">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="mb-3">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="mb-3">
                <label for="price_range">Price Range:</label>
                <input type="text" class="form-control" id="price_range" name="price_range">
            </div>
            <div class="mb-3">
                <label for="popularity">Popularity:</label>
                <input type="number" class="form-control" id="popularity" name="popularity">
            </div>
            <div class="mb-3">
                <label for="ratings">Ratings:</label>
                <input type="number" class="form-control" id="ratings" name="ratings" step="0.1" max="5">
            </div>
            <div class="mb-3">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" name="type">
            </div>
            <button type="submit" class="btn btn-warning">Create</button>
            <a class="btn btn-success mb-0.5" role="button" href="<?= site_url('/organizer'); ?>">Show Events</a>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            // Real-Time Validation
            $('#title').on('input', function () {
                const title = $(this).val();
                if (title.length < 5) {
                    $('#titleError').text('Title must be at least 5 characters.');
                } else {
                    $('#titleError').text('');
                }
            });

            // AJAX Form Submission
            $('#createEventForm').on('submit', function (e) {
                e.preventDefault();
                const formData = $(this).serialize();
                $.ajax({
                    url: '<?= site_url('/organizer/create'); ?>',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        alert('Event created successfully!');
                        window.location.href = '<?= site_url('/organizer'); ?>';
                    },
                    error: function () {
                        alert('Failed to create the event.');
                    }
                });
            });
        });
    </script>
</body>
</html>
