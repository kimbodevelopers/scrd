<?php 

$submitted_park_types = [];

if(isset($_POST['submit'])){

    if(!empty($_POST['park_type'])) {

        if(isset($_POST['park_type'])) {
            foreach($_POST['park_type'] as $value){
                $submitted_park_types[] = $value;
            }
        }

    }

    if(isset($_POST['park_type'])) {
        if(empty($_POST['park_type'])) {

            foreach($park_types as $park_type) {
                $submitted_park_types[] = $park_type->slug;
            }
        }
    }
}

if(isset($_POST['reset'])){
    if(!empty($_POST['reset'])) {
        if(isset($_POST['park_type'])) {
            foreach($park_types as $park_type) {
                $submitted_park_types[] = $park_type->slug;
            }
        }
    }
}