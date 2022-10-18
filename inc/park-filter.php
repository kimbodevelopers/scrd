<?php 


if(empty($_POST['park_type'])) {
    foreach($park_types as $park_type) {
        $submitted_park_types[] = $park_type->slug;
    }
}

if(empty($_POST['area'])) {
    foreach($areas as $area) {
        $submitted_areas[] = $area->slug;
    }
}


if(isset($_POST['submit'])){

    if(!empty($_POST['park_type'])) {

        foreach($_POST['park_type'] as $value){
            $submitted_park_types[] = $value;
        }
    }

    if(empty($_POST['park_type'])) {

        if(isset($park_types)) {
            foreach($park_types as $park_type) {
                $submitted_park_types[] = $park_type->slug;
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

        if(isset($park_types)) {
            foreach($park_types as $park_type) {
                $submitted_park_types[] = $park_type->slug;
            }
        }

        if(isset($areas)) {
            foreach($areas as $area) {
                $submitted_areas[] = $area->slug;
            }
        }

    }
}