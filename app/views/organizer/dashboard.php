<?php
include APP_DIR.'views/templates/header.php';
?>
<body>
    <div id="app">
    <?php
    include APP_DIR.'views/templates/nav.php';
    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        table.dataTable {
            width: 100% !important;
        }
        .dataTables_filter {
            margin-bottom: 20px;
        }
        table.dataTable tbody td {
            padding: 15px 10px;
        }
    </style>
</head>

<body>
   <div class="container mt-3">
        <div class="row">
            <div class="col-md-12"> 
                <h4>Events List</h4>
                <a class="btn btn-warning mb-2" role="button" href="<?=site_url('/organizer/create');?>">Create Event</a>
                <?php flash_alert(); ?>
                
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price Range</th>
                            <th>Popularity</th>
                            <th>Ratings</th>
                            <th>Type</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($e as $e): ?>
                        <tr>
                            <td><?=$e['event_id'];?></td>
                            <td><?=$e['title'];?></td>
                            <td><?=$e['description'];?></td>
                            <td><?=$e['location'];?></td>
                            <td><?=$e['start_date'];?></td>
                            <td><?=$e['end_date'];?></td>
                            <td><?=$e['price_range'];?></td>
                            <td><?=$e['popularity'];?></td>
                            <td><?=$e['ratings'];?></td>
                            <td><?=$e['type'];?></td>
                            <td><?=$e['created_at'];?></td>
                            <td><?=$e['updated_at'];?></td>
                            <td>
                                <a href="<?=site_url('/organizer/update/'.$e['event_id']);?>" class="btn btn-success btn-sm">Update</a>
                                <a href="javascript:void(0);" data-id="<?=$e['event_id'];?>" class="btn btn-danger btn-sm deleteBtn">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
   </div>

   <script>
        $(document).ready(function () {
            // Initialize DataTables
            $('#myTable').DataTable({
                "responsive": true,
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 } // Disable ordering for "Actions" column
                ],
            });

            // Handle Delete Button Click
            $(document).on('click', '.deleteBtn', function () {
                const eventId = $(this).data('id'); // Get event ID from data-id attribute
                if (confirm('Are you sure you want to delete this event?')) {
                    $.ajax({
                        url: `/organizer/delete/${eventId}`, // Endpoint for deletion
                        type: 'POST', // HTTP method
                        success: function (response) {
                            alert('Event deleted successfully!');
                            location.reload(); // Reload page to reflect changes
                        },
                        error: function () {
                            alert('Failed to delete the event.');
                        }
                    });
                }
            });
        });
   </script>
</body>
</html>
