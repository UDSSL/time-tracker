<?php
/**
 * UDSSL Time Tracker App Enqueue and Bootstrapper
 */
class UDSSL_TT_App{
    /**
     * Constructor
     */
    function __construct(){
        add_action('udssl_time_tracker', array($this, 'time_tracker'));
        add_action('udssl_payment_tracker', array($this, 'payment_tracker'));
    }

    /**
     * Backbone Time Tracker App
     */
    function time_tracker(){
        ?>
        <!-- Models -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/timeslot.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/category.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/project.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/task.js"></script>

        <!-- Collections -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/timeslots.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/categories.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/projects.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/tasks.js"></script>

        <!-- Views -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/timeslot.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/timetracker.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/taskmanage.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/projectmanage.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/categorymanage.js"></script>

        <!-- UDSSL Time Tracker -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/core/udssl-time-tracker-app.js"></script>
        <?php
    }

    /**
     * Backbone Payment Tracker App
     */
    function payment_tracker(){
        ?>
        <!-- Models -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/payment.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/category.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/project.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/models/task.js"></script>

        <!-- Collections -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/payments.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/categories.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/projects.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/collections/tasks.js"></script>

        <!-- Views -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/payment.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>app/views/paymenttracker.js"></script>

        <!-- UDSSL Time Tracker -->
        <script src="<?php echo UDSSL_TT_URL; ?>app/core/udssl-payment-tracker-app.js"></script>
        <?php
    }
}
?>
