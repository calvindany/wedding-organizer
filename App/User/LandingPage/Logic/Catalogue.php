<?php
    function GetCatalogue($conn) {
        $query = "SELECT * FROM tb_catalogues";
    
        $result = $conn->query($query);
    
        if ($result->num_rows > 0)  
        { 
            $data = array();
            while($row = $result->fetch_assoc()) 
            { 
                $data[] = $row;
            }
        } else { 
            $data = []; 
        } 

        return $data;
    }