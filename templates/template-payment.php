<!DOCTYPE html>
<html lang="en">
<head>
    <?php do_action('udssl_headtop'); ?>
    <title><?php _e('Payment Tracker', 'udssl') ?> | <?php _e('UDSSL Time Tracker', 'udssl') ?></title>
    <meta name="Description" content="<?php _e('Payment Tracker for WordPress', 'udssl') ?>">
    <?php do_action('udssl_bootstrap'); ?>
    <?php do_action('udssl_backbone'); ?>
    <?php do_action('udssl_head_enqueue'); ?>
</head>
<body>
    <?php $options = get_option('udssl_tt_options'); ?>
    <div class="container" id="life">
        <div class="masthead">
            <h2><img src="<?php echo UDSSL_TT_URL; ?>assets/page-icon.png" /> <?php _e('Payment Tracker', 'udssl') ?> <span class="muted" >| <?php _e('UDSSL Time Tracker', 'udssl') ?></span></h2>
            <div class="navbar">
                <?php do_action('udssl_nav'); ?>
            </div><!-- /.navbar -->
        </div>

        <div id="payment" >
            <table id="payments-list" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th><?php _e('Time', 'udssl') ?></th>
                        <th><?php _e('Category', 'udssl') ?></th>
                        <th><?php _e('Project', 'udssl') ?></th>
                        <th><?php _e('Task', 'udssl') ?></th>
                        <th><?php _e('Paid', 'udssl') ?></th>
                        <th><?php _e('Charge', 'udssl') ?></th>
                        <th><?php _e('Effective', 'udssl') ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div id="form" class="udssl-unit">
              <fieldset>
                <legend><?php _e('New Payment', 'udssl') ?> | <span id="clock">&nbsp;</span></legend>
                <table class="table borderless table-condensed" >
                <tr>
                <td><?php _e('Time', 'udssl') ?> </td>
                <td>
                    <input id="pay_time" type="text" value="<?php echo date('Y-m-d h:i A', current_time('timestamp')); ?>" />
                </td>
                </tr>
                <tr>
                <td><?php _e('Category', 'udssl') ?> </td>
                <td>
                    <select id="pay_category" type="text" value="<?php _e('Sample Category', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <td><?php _e('Project', 'udssl') ?> </td>
                <td>
                    <select id="pay_project" type="text" value="<?php _e('Sample Project', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <td><?php _e('Task', 'udssl') ?> </td>
                <td>
                    <select id="pay_task" type="text" value="<?php _e('Sample Task', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <td><?php _e('Paid', 'udssl') ?> </td>
                <td>
                    <input id="pay_paid" type="text" value="10" />
                    <button id="pay_calculate" class="btn " ><?php _e('Calculate', 'udssl') ?></button>
                </td>
                </tr>
                <tr>
                <td><?php _e('Charges', 'udssl') ?> </td>
                <td>
                    <input id="pay_charges" type="text" value="10" />
                </td>
                </tr>
                <tr>
                <td><?php _e('Effective', 'udssl') ?> </td>
                <td>
                    <input id="pay_effective" type="text" value="10" />
                </td>
                </tr>
                <td></td>
                <td>
                    <button id="pay_add_payment" class="btn btn-large btn-primary" ><?php _e('Add Payment', 'udssl') ?></button>
                </td>
                </tr>
                <tr>
                <td colspan="2">
                    <?php
                    foreach($options['presets'] as $preset){
                        $id  = 't_preset';
                        $id .= '_' . $preset['category'];
                        $id .= '_' . $preset['project'];
                        $id .= '_' . $preset['task'];
                        $name = $preset['name'];
                        echo '<button id="' . $id . '" class="btn pay_preset" >' . $name . '</button> ';
                    }
                    ?>
                </td>
                </tr>

                </table>
              </fieldset>
            </div>
            </div>
        <hr>
        <div class="footer">
            <p class="text-muted"><?php _e('UDSSL Time Tracker', 'udssl') ?></p>
        </div>
    </div> <!-- /container -->
    <?php include_once UDSSL_TT_PATH . 'app/templates/_templates.php'; ?>
    <?php do_action('udssl_payment_tracker'); ?>
</body>
</html>
