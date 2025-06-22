<div style="width:600px; height:800px; border:1px solid #ccc; padding:30px; box-sizing:border-box;">
    <h2>User Info</h2>
    <p><strong>Name:</strong> <?php echo esc_html($name); ?></p>
    <p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
    <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
    <?php if (!empty($photo)) : ?>
        <p><strong>Photo:</strong><br>
            <img src="<?php echo esc_url($photo); ?>" alt="User Photo" style="max-width:100%; max-height:500px; width:auto; height:auto; display:block; margin-top:10px;">
        </p>
    <?php endif; ?>
    <p><strong>Photo URL:</strong> <?php echo esc_url($photo); ?></p>
</div>