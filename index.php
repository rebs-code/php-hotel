<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    ?>
    <header class="container-fluid text-center mb-4 p-2">
        <h1>PHP Hotels</h1>
    </header>
    <main>
        <div class="container-fluid">
            <!-- Form -->
            <form action="index.php" method="get" class="d-flex justify-content-center mb-4">
                <select class="form-select form-select-sm w-25 me-2" aria-label="Small select example" name="parking">
                    <option selected>Parking</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
                <select class="form-select form-select-sm w-25" aria-label="Small select example" name="minVote">
                    <option selected>Min Vote</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit" class="btn btn-primary ms-2">Search</button>
            </form>
            <!-- table -->
            <table class="table w-75 mx-auto border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hotel Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance from Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get values from select
                    $parking_value = $_GET['parking'] ?? '0';
                    $min_vote = $_GET['minVote'] ?? '0';
                    //initialize row variable to 1
                    $row = 1;
                    foreach ($hotels as $hotel) {
                        //change parking value from boolean to yes or no string
                        if ($hotel['parking']) {
                            $parking = 'Yes';
                        } else {
                            $parking = 'No';
                        }
                        if ($hotel['vote'] >= $min_vote) {
                            //print a table tr for each hotel
                            echo "<tr>
                        <th scope='row'>" . $row . "</th>
                        <td>" . $hotel['name'] . "</td>
                        <td>" . $hotel['description'] . "</td>
                        <td>" .  $parking . "</td>
                        <td>" . $hotel['vote'] . "</td>
                        <td>" . $hotel['distance_to_center'] . ' km' . "</td>
                        </tr>";
                            //increment row by 1 with each cycle
                            $row++;
                        }
                    }

                    foreach ($hotel as $hotel_info) {
                        // echo $hotel_info;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>