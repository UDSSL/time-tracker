<?php
/**
 * UDSSL Time Tracker Enqueues
 */
class UDSSL_TT_Enqueues{
    /**
     * Constructor
     */
    function __construct(){
        /**
         * Twitter Bootstrap
         */
        add_action('udssl_bootstrap', array($this, 'bootstrap'));

        /**
         * Backbone and Underscore
         */
        add_action('udssl_backbone', array($this, 'underscore'));
        add_action('udssl_backbone', array($this, 'backbone'));

        /**
         * Other Head Enqueues
         */
        add_action('udssl_head_enqueue', array($this, 'highcharts'));
        add_action('udssl_head_enqueue', array($this, 'moment'));
        add_action('udssl_head_enqueue', array($this, 'app'));
    }

    /**
     * Enqueue Underscore JS
     */
    function underscore(){
        ?>
        <script src="<?php echo UDSSL_TT_URL; ?>lib/backbone/json2.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>lib/underscore/underscore-min.js"></script>
        <?php
    }


    /**
     * Enqueue Backbone JS
     */
    function backbone(){
        ?>
        <script src="<?php echo UDSSL_TT_URL; ?>lib/backbone/backbone-min.js"></script>
        <?php
    }

    /**
     * Enqueue Twitter Bootstrap
     */
    function bootstrap(){
        ?>
        <link rel="stylesheet" href="<?php echo UDSSL_TT_URL; ?>lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo UDSSL_TT_URL; ?>lib/bootstrap/css/bootstrap-responsive.min.css">
        <script src="<?php echo UDSSL_TT_URL; ?>lib/bootstrap/js/jquery.js"></script>
        <script src="<?php echo UDSSL_TT_URL; ?>lib/bootstrap/js/bootstrap.js"></script>
        <?php
    }

    /**
     * Enqueue Highcharts JS
     */
    function highcharts(){
        ?>
        <script src="<?php echo UDSSL_TT_URL; ?>lib/highcharts/highcharts.js"></script>
        <?php
    }

    /**
     * Enqueue Moment JS
     */
    function moment(){
        ?>
        <script src="<?php echo UDSSL_TT_URL; ?>lib/moment/moment.min.js"></script>
        <?php
    }

    /**
     * UDSSL Time Tracker Core Scripts ans Styles
     */
    function app(){
        ?>
        <script src="<?php echo UDSSL_TT_URL; ?>app/core/udssl-time-tracker-utilities.js"></script>
        <link rel="stylesheet" href="<?php echo UDSSL_TT_URL; ?>css/udssl-tt.css">
        <?php
    }
}
?>
