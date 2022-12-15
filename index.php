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
    $filtered_hotels = $hotels;
    if (!empty($_GET['park']) || $_GET['park'] == "0" ){
        $temp_hotels = [];
        foreach ($filtered_hotels as $hotel){
            if ($hotel['parking'] == $_GET['park']){
                $temp_hotels[] = $hotel;
            }
        }
        $filtered_hotels = $temp_hotels;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- /Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP Hotel</title>
</head>
<body>
    <div>
        <h3>Filtra Hotels</h3>
        <form action="index.php" method="get">
            <label for="parcheggio" class="form-label">Parcheggio</label>
            <select name="park" class="parking" aria-label="Default select">
            <option value="">disponibiltà di parcheggio</option>
            <option value="true">SI</option>
            <option value="false">NO</option>
            </select>
        <button type="submit">Filtra</button>
        </form>
    </div>
    <h3>Lista Hotels</h3>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
            <th scope="col"><i class="fa-solid fa-hotel"></i></th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col ">Parking</th>
            <th scope="col">Vote</th>
            <th scope="col">Distance to center</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach( $filtered_hotels as $key => $hotel ) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td class="name"><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td>Parcheggio: <?php 
                        if($hotel['parking'] == true){
                            echo 'Si';
                        } else {
                            echo 'No';
                        }   
                    ?></td>
                    <td>Voto: <?php echo $hotel['vote']; ?></td>
                    <td>Distanza dal centro: <?php echo $hotel['distance_to_center']; ?>km</td>
                </tr>
        <?php } ?>
        </tbody>

    </table>
    <ul>
        
    </ul>


<!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- /Bootstrap CDN -->
</body>
</html>