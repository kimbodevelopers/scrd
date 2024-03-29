

<?php if(get_field('building_contact', 'option')) : ?>
	
    <?php while(have_rows('building_contact', 'option')) : the_row(); 
        $department_name = get_sub_field('department_name');
        $phone_number = get_sub_field('phone_number');
        $email = get_sub_field('email');
    ?>

    <div class="container-fluid site-component-container pt-0">

        <div class="row site-component-row department-contact-row">
            <div class="col-12">
                <p class="body-text _17"><strong>Contact Us</strong></p>
                
                <?php if($department_name) : ?>
                    <p class="body-text _17"><?php echo $department_name; ?></p>
                <?php endif; ?>

                <?php if($phone_number) : ?>
                    <p class="body-text _17">Phone: <a href="tel:+1-<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></p>
                <?php endif; ?>

                <?php if($email) : ?>
                    <p class="body-text _17">Email: <a href="mailto:<?php echo $email ?>"><?php echo $email; ?></a></p>
                <?php endif; ?>


            </div>
        </div>
    </div>

    <?php endwhile; ?>
<?php endif; ?>