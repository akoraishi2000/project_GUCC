<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Table with Pagination</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* CSS styles here */
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
            background-color: #161743; 
        }
        
        .table-wrapper {
            width: 100%;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }
        
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .pagination .page-item {
            margin: 0 5px;
        }
    </style>
    <script>
        // JavaScript functions here
        function hrefFunction() {
            window.location.href = "admin_list_add.php";
        }
        
         // Delete row on delete button click
        $(document).on("click", ".delete", function(){
            // Get the admin name from the table row
            var adminName = $(this).closest("tr").find("td:eq(0)").text();
            
            // Show confirmation alert
            Swal.fire({
                title: 'Are you sure you want to remove the admin',
                // text: 'Are you sure you want to remove the admin: ' + adminName + '?',
                html: '<span style="font-weight: bold; color: blue;">' + adminName + '</span>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    var adminId = $(this).closest("tr").find("td:eq(1)").text(); // Get the admin ID from the table row
                    
                    // Send AJAX request to delete the admin
                    $.ajax({
                        url: "delete_admin.php",
                        type: "POST",
                        data: { adminId: adminId },
                        success: function(response) {
                            if (response === "success") {
                                // Show success message
                                Swal.fire('Success', ' ' + adminName + ' has been removed from admin list', 'success').then(() => {
                                    // Redirect to admin_list page
                                    window.location.href = "admin_list.php";
                                });
                            } else {
                                // Show error message
                                Swal.fire('Error', 'Error occurred while removing admin', 'error');
                            }
                        },
                        error: function() {
                            // Show error message
                            Swal.fire('Error', 'Error occurred while removing admin', 'error');
                        }
                    });
                }
            });
        });

    </script>
    
</head>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <!-- Table title content here -->
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Admin <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                          <button type="submit" class="btn btn-info add-new" onclick="hrefFunction()"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Connect to the database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "gucc";

                            $conn = new mysqli($servername, $username, $password, $database);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Fetch admin data from the database
                            $sql = "SELECT A_ID, Name, Email FROM admin";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $A_ID = $row["A_ID"];
                                    echo "<tr>";
                                    echo "<td>" . $row["Name"] . "</td>";
                                    echo "<td>" . $row["A_ID"] . "</td>";
                                    echo "<td>" . $row["Email"] . "</td>";
                                    echo '<td>
                                            <a class="edit" title="Edit" data-toggle="tooltip" href="admin_list_edit.php?id=' . $A_ID . '"><i class="material-icons">&#xE254;</i></a>
                                            <a class="delete" title="Delete" data-toggle="tooltip" style="cursor: pointer;"><i class="material-icons">&#xE872;</i></a>
                                          </td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No records found</td></tr>";
                            }

                            // Close the database connection
                            $conn->close();
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <!-- Pagination content here -->
                    <ul class="pagination">
                        <li class="page-item" id="prev">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item" id="next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        // JavaScript code for pagination here
         $(document).ready(function() {
            // Number of items per page
            var pageSize = 5;
            
            // Calculate the number of pages
            var pageCount = Math.ceil($(".table tbody tr").length / pageSize);
            
            // Show the first page and hide the rest
            $(".table tbody tr").hide();
            $(".table tbody tr").slice(0, pageSize).show();
            
            // Handle "Next" button click
            $("#next").on("click", function() {
                // Find the currently visible rows
                var visibleRows = $(".table tbody tr:visible");
                
                // Calculate the index of the last visible row
                var lastIndex = $(".table tbody tr").index(visibleRows.last());
                
                // Calculate the index of the first row to show on the next page
                var startIndex = lastIndex + 1;
                
                // Calculate the index of the last row to show on the next page
                var endIndex = startIndex + pageSize;
                
                // Hide all rows and show the selected items
                $(".table tbody tr").hide().slice(startIndex, endIndex).show();
            });
            
            // Handle "Previous" button click
            $("#prev").on("click", function() {
                // Find the currently visible rows
                var visibleRows = $(".table tbody tr:visible");
                
                // Calculate the index of the first visible row
                var firstIndex = $(".table tbody tr").index(visibleRows.first());
                
                // Calculate the index of the last row to show on the previous page
                var endIndex = firstIndex;
                
                // Calculate the index of the first row to show on the previous page
                var startIndex = endIndex - pageSize;
                
                // Hide all rows and show the selected items
                $(".table tbody tr").hide().slice(startIndex, endIndex).show();
            });
        });
    </script> -->

    <script>
    // JavaScript code for pagination here
    $(document).ready(function() {
      // Number of items per page
      var pageSize = 5;

      // Calculate the number of pages
      var pageCount = Math.ceil($(".table tbody tr").length / pageSize);

      // Show the first page and hide the rest
      $(".table tbody tr").hide();
      $(".table tbody tr").slice(0, pageSize).show();

      // Handle "Next" button click
      $("#next").on("click", function() {
        // Find the currently visible rows
        var visibleRows = $(".table tbody tr:visible");

        // Calculate the index of the last visible row
        var lastIndex = $(".table tbody tr").index(visibleRows.last());

        // Calculate the index of the first row to show on the next page
        var startIndex = lastIndex + 1;

        // Calculate the index of the last row to show on the next page
        var endIndex = startIndex + pageSize;

        // Hide all rows and show the selected items
        $(".table tbody tr").hide().slice(startIndex, endIndex).show();

        // Update button states
        updateButtonStates();
      });

      // Handle "Previous" button click
      $("#prev").on("click", function() {
        // Find the currently visible rows
        var visibleRows = $(".table tbody tr:visible");

        // Calculate the index of the first visible row
        var firstIndex = $(".table tbody tr").index(visibleRows.first());

        // Calculate the index of the last row to show on the previous page
        var endIndex = firstIndex;

        // Calculate the index of the first row to show on the previous page
        var startIndex = endIndex - pageSize;

        // Hide all rows and show the selected items
        $(".table tbody tr").hide().slice(startIndex, endIndex).show();

        // Update button states
        updateButtonStates();
      });

      // Function to update button states
      function updateButtonStates() {
        // Find the currently visible rows
        var visibleRows = $(".table tbody tr:visible");

        // Calculate the index of the first visible row
        var firstIndex = $(".table tbody tr").index(visibleRows.first());

        // Enable or disable the "Previous" button based on the first visible row index
        if (firstIndex === 0) {
          $("#prev").addClass("disabled");
        } else {
          $("#prev").removeClass("disabled");
        }

        // Enable or disable the "Next" button based on the last visible row index
        if (firstIndex + pageSize >= $(".table tbody tr").length) {
          $("#next").addClass("disabled");
        } else {
          $("#next").removeClass("disabled");
        }
      }

      // Initial button states
      updateButtonStates();

    });
  </script>

</body>
</html>
