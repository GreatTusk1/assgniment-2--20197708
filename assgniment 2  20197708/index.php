<?php 

$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response = file_get_contents($url);

echo $response;
print_r($response);

$data = json_decode($response, true);

echo $response;
print_r($response);

if (!$data || !isset($data["results"])) {
    die('error fetching the data from the api');
}

$result = $data['results'];

?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    </head>
    <body>
        <table>
            <thead>
                <tr>
                <th>year</th>
                <th>semester</th>
                <th>the programs</th>
                <th>nationality</th>
                <th>colleges</th>
                <th>number of sudents</th>
            
                </tr>

            </thead>
            <tbody>
                <?php 
                 foreach ($result as $student){
                    ?><tr>
                        <td><?php echo $student("year");?></td>
                        <td><?php echo $student("semester");?></td>
                        <td><?php echo $student("the programs");?></td>
                        <td><?php echo $student("nationality");?></td>
                        <td><?php echo $student("colleges");?></td>
                        <td><?php echo $student("number of students");?></td>
                    </tr>
                    
                    <?php 
                 }
                ?>
            </tbody>
            
        </table>

    </body>
</html>