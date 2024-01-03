<?php
session_start();
include 'dbconnect.php';
$loggedin = false;
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true)
{
    header("location: index.php");
    exit;
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addsubmitted']) && $_POST['addsubmitted'] == 3) {
        $name = $_POST['eventName'];
        $date = $_POST['eventDate'];
        $sql = "INSERT INTO `events_data` (`id`, `event_name`, `event_date`) VALUES (NULL, '$name', '$date')";

        if (mysqli_query($conn, $sql)) {
            header("Location: events_calender.php"); // Replace with the appropriate URL
            exit();
            // Data inserted successfully, you can set a success message if needed
            // $_SESSION['success_message'] = "Data saved successfully.";
        } else {
            // Error during insertion
            echo "Error: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['delsubmitted']) && $_POST['delsubmitted'] == 1) {
            // Convert the date format to match the database format if needed
            $dateToDelete = $_POST['delDate'];
            $formattedDateToDelete = date('Y-m-d', strtotime($dateToDelete));
        // Get the event date to be deleted

        // Perform the deletion based on the provided date
        $sql = "DELETE FROM `events_data` WHERE `event_date` = '$formattedDateToDelete'";

        if (mysqli_query($conn, $sql)) {
            // Deletion successful
            header("Location: events_calender.php"); // Replace with the appropriate URL
            exit();
        } else {
            // Error during deletion
            echo "Error: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events</title>
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="calender/evo-calendar.min.css">
        <link rel="stylesheet" href="calender/evo-calendar.midnight-blue.min.css">
        <link rel="stylesheet" href="css/sidebar.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    
    <?php

// Check if this part is executed
echo "<!-- This is after including eventModal.php -->";
$activeTab = 'events_calender';
include 'head.php';

include 'eventModal.php';
include 'eventdelmodal.php';
    ?>
    <div class="main_">
        <div id="calendar"></div>
        <div class="addbtn">
        
    <button id="addEventBtn" data-bs-toggle="modal" data-bs-target="#eventModal" class="btn" style="margin-top: 10px; background-color: #8773c1; color: #fff; position: relative; left: 40%;">Add Event</button>
    <button id="deleteEventBtn" data-bs-toggle="modal" data-bs-target="#eventdelModal" class="btn" style="margin-top: 10px; background-color: #8773c1; color: #fff; position: relative; left: 40%;">Delete event</button>
   

</div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
        <script src="calender/evo-calendar.js"></script>
        <script src="calender/evo-calendar.min.js"></script>
        
<script>
 
 <?php
$sql = "SELECT * FROM events_data";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert the database date format to the desired format
        $eventDate = date('d F Y', strtotime($row['event_date']));

        $event = array(
            'id' => 'event_' . $row['id'], // Use a unique identifier for the event
            'name' => $row['event_name'],
            'date' => $eventDate, // Format the date as "10 September 2023"
            'type' => 'event',
            'color' => '#63d867'
        );

        // Add event to the events array
        $events[] = $event;
    }
}


// Close the database connection
$conn->close();
?>

$('#calendar').evoCalendar();

// Assuming you have the events array generated in PHP
var events = <?php echo json_encode($events); ?>;

// Loop through events and add them to the calendar
for (var i = 0; i < events.length; i++) {
    $('#calendar').evoCalendar('addCalendarEvent', events[i]);
}
    // $('#calendar').evoCalendar({
            //     'eventListToggler' : false,
            //     'sidebarToggler' : false,
            //     'sidebarDisplayDefault' : false
            // });
            $(document).ready(function() {
                $('#calendar').evoCalendar({
                    calendarEvents: [
                        {
                            id: 'bHay68s', // Event's ID (required)
                            name: "New Year", // Event name (required)
            date: "10 September 2023", // Event date (required)
            type: "holiday", // Event type (required)
            everyYear: true // Same event every year (optional)
        },
        {
            name: "Vacation Leave",
            badge: "02/13 - 02/15", // Event badge (optional)
            date: ["September/13/2023", "September/15/2023"], // Date range
            description: "Vacation leave for 3 days.", // Event description (optional)
            type: "event",
            color: "#63d867" // Event custom color (optional)
        }
    ]
});
})
<!-- Add this script after your existing scripts -->

   
    //     function deleteEvent() {
    //     // You need to identify the event to delete, for example, by name or date
    //     var eventName = $('#eventName').val();
    //     var eventDate = $('#eventDate').val();

    //     // Identify and remove the event from the calendar
    //     $('#calendar').evoCalendar('removeCalendarEvent', {
    //         name: eventName,
    //         date: eventDate,
    //         type: "event"
    //     });

    //     // Clear form fields
    //     $('#eventName').val('');
    //     $('#eventDate').val('');

    //     // Close the correct modal with the ID 'eventdelModal'
    //     $('#eventdelModal').modal('hide');
    // }

    
    
    </script>
<?php
// Include eventdelmodal.php first

// Check if this part is executed
echo "<!-- This is after including eventdelmodal.php -->";

// 

?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
  