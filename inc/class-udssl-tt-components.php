<?php
/**
 * UDSSL Time Tracker Components
 */
class UDSSL_TT_Components{
    /**
     * Constructor
     */
    function __construct(){
        /**
         * UDSSL Time Tracker Action Links
         */
        add_filter('plugin_action_links', array($this, 'action_links'));

        /**
         * UDSSL Time Tracker Navigation
         */
        add_action('udssl_nav', array($this, 'navigation'));
    }

    /**
     * UDSSL Time Tracker Action Links
     */
    function action_links($links){
       $links[] = '<a href="'. get_admin_url(null, 'admin.php?page=manage-udssl-tt') .'">Settings</a>';
       $links[] = '<a href="' . get_home_url() . '/time-tracker/" target="_blank">Tracker</a>';
       return $links;
    }

    /**
     * UDSSL Time Tracker Navigation
     */
    function navigation(){
    ?>
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav">
                <li><a href="<?php echo get_home_url()  . '/time-tracker/'; ?>"><?php _e('Time Tracker', 'udssl') ?></a></li>
                <li><a href="<?php echo get_home_url() . '/payment-tracker/'; ?>"><?php _e('Payment Tracker', 'udssl') ?></a></li>
                <li><a href="<?php echo admin_url('admin.php?page=manage-udssl-tt'); ?>" target="_blank"><?php _e('Admin', 'udssl') ?></a></li>
                <li><a href="http://udssl.com/udssl-time-tracker/" target="_blank"><?php _e('UDSSL', 'udssl') ?></a></li>
            </ul>
        </div>
    </div>
    <?php
    }

    /**
     * UDSSL Time Tracker Head Top
     */
    function headtop(){
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="<?php echo UDSSL_TT_URL; ?>favicon.png">
    <?php
    }
}
?>
