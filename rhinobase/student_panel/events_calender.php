<?php
session_start();
$loggedin = false;
if(!isset($_SESSION['s_loggedin']) && $_SESSION['s_loggedin'] != true)
{
    header("location: login_rhinobase.php");
    exit;
} 
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/sidebar.css">
        <link rel="stylesheet" href="../calender/evo-calendar.min.css">
        <link rel="stylesheet" href="../calender/evo-calendar.midnight-blue.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    
    <?php
    $activeTab = 'events_calender';
    include 'sidebar.php';
    ?>
    <div class="main_">
        <div id="calendar"></div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
        <script src="../calender/evo-calendar.js"></script>
        <script src="../calender/evo-calendar.min.js"></script>
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
        </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>