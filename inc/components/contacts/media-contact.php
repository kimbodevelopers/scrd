<?php if(have_rows('media_contacts', 'option')) : ?>

        <div class="container-fluid site-component-container pt-0">
			
			<div class="row site-component-row ">
				<div class="col-12">
					<p class="body-text _17"><strong>Contact Us</strong></p>
				</div>
			</div>

            <div class="row site-component-row department-contact-row">
				
				<?php while(have_rows('media_contacts', 'option')) : the_row(); 
					$contact_name = get_sub_field('contact_name');
					$job_title = get_sub_field('job_title');
					$phone_number = get_sub_field('phone_number');
					$cell_number = get_sub_field('cell_number');
					$extension = get_sub_field('extension');
					$email = get_sub_field('email');
				?>
					<div class="col-12 col-md-6 col-lg-4">
						
						<?php if($contact_name) : ?>
							<p class="body-text _17"><?php echo $contact_name; ?></p>
						<?php endif; ?>

						<?php if($job_title) : ?>
							<p class="body-text _17"><?php echo $job_title; ?></p>
						<?php endif; ?>

						<?php if($phone_number) : ?>
							<p class="body-text _17">Phone: <a href="tel:+1-<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a> <span>Ext. <?php echo $extension ?></span></p>
						<?php endif; ?>

						<?php if($cell_number) : ?>
							<p class="body-text _17">Cellular: <a href="tel:+1-<?php echo $cell_number; ?>"><?php echo $cell_number; ?></a></p>
						<?php endif; ?>

						<?php if($email) : ?>
							<p class="body-text _17">Email: <a href="mailto:<?php echo $email ?>"><?php echo $email; ?></a></p>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
            </div>
        </div>
    
<?php endif; ?>