<?php 


if(empty($_POST['park_amenity'])) {
    foreach($park_amenities as $park_amenity) {
        $submitted_park_amenities[] = $park_amenity->slug;
    }
}

if(empty($_POST['area'])) {
    foreach($areas as $area) {
        $submitted_areas[] = $area->slug;
    }
}


if(isset($_POST['submit'])){

    if(!empty($_POST['park_amenity'])) {

        foreach($_POST['park_amenity'] as $value){
            $submitted_park_amenities[] = $value;
        }
    }

    if(empty($_POST['park_amenity'])) {

        if(isset($park_amenities)) {
            foreach($park_amenities as $park_amenity) {
                $submitted_park_amenities[] = $park_amenity->slug;
            }
        }
    }

    if(!empty($_POST['area'])) {

        foreach($_POST['area'] as $value){
            $submitted_areas[] = $value;
        }
    }

    if(empty($_POST['area'])) {

        if(isset($areas)) {
            foreach($areas as $area) {
                $submitted_area[] = $area->slug;
            }
        }
    }
}

if(isset($_POST['reset'])){
    if(!empty($_POST['reset'])) {

        if(isset($park_amenities)) {
            foreach($park_amenities as $park_amenity) {
                $submitted_park_amenities[] = $park_amenity->slug;
            }
        }

        if(isset($areas)) {
            foreach($areas as $area) {
                $submitted_areas[] = $area->slug;
            }
        }

    }
}