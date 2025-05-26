<?php
/**
 * Template part for displaying FAQs
 */
?>

<section class="faq py-5">
    <div class="container">
        <h2 class="title-home text-center"><?php _e('FAQs about Mynt Models', 'manila-luxury-model'); ?></h2>
        <p class="text-center text-white"><?php _e('We provide answers to common questions that potential clients may have about their high-class escort services with us.', 'manila-luxury-model'); ?></p>
        
        <div class="accordion" id="accordionPlusMinus">
            <?php
            // You can create a custom post type for FAQs or use ACF repeater
            $faqs = array(
                array(
                    'question' => __('What services do you offer?', 'manila-luxury-model'),
                    'answer' => __('We offer premium escort and companionship services for various occasions including dinner dates, travel companionship, and social events.', 'manila-luxury-model')
                ),
                array(
                    'question' => __('How do I book a model?', 'manila-luxury-model'),
                    'answer' => __('You can book a model through our online booking form or by contacting us directly. We recommend booking at least 24 hours in advance.', 'manila-luxury-model')
                ),
                array(
                    'question' => __('Are your photos real?', 'manila-luxury-model'),
                    'answer' => __('Yes, all photos on our website are 100% real and recent. We guarantee authenticity or you pay no rejection fee.', 'manila-luxury-model')
                ),
                array(
                    'question' => __('What are your rates?', 'manila-luxury-model'),
                    'answer' => __('Our rates vary depending on the model and services requested. Please check individual model profiles for specific pricing.', 'manila-luxury-model')
                )
            );
            
            $i = 1;
            foreach ($faqs as $faq) :
                ?>
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="false" 
                                aria-controls="collapse<?php echo $i; ?>">
                            <?php echo $faq['question']; ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" 
                         aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionPlusMinus">
                        <div class="accordion-body text-bidgray">
                            <p><?php echo $faq['answer']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</section>