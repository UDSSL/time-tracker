<!DOCTYPE html>
<html lang="en">
<head>
    <?php do_action('udssl_headtop'); ?>
    <title><?php _e('UDSSL Time Tracker', 'udssl') ?> | <?php _e('Track Your Time', 'udssl') ?></title>
    <meta name="Description" content="<?php _e('UDSSL Time Tracker from UDSSL', 'udssl') ?>">
    <?php wp_head(); ?>
</head>
<body class="time-tracker">
    <?php $options = get_option('udssl_tt_options'); ?>
    <div class="container" id="life">
        <div id="menu" class="masthead">
            <h2><img src="<?php echo UDSSL_TT_URL; ?>assets/page-icon.png" /> <?php _e('UDSSL Time Tracker', 'udssl') ?></h2>
            <div class="navbar">
                <?php do_action('udssl_nav'); ?>
            </div>
        </div>

        <div id="time" >
            <table id="time-slot-list" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th><?php _e('Start Time', 'udssl') ?></th>
                        <th><?php _e('End Time', 'udssl') ?></th>
                        <th><?php _e('Duration', 'udssl') ?></th>
                        <th><?php _e('Category', 'udssl') ?></th>
                        <th><?php _e('Project', 'udssl') ?></th>
                        <th><?php _e('Task', 'udssl') ?></th>
                        <th><?php _e('Description', 'udssl') ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div id="tracker"></div>
            <div id="form" class="udssl-unit">
                <fieldset>
                    <legend><?php _e('New Time Slot', 'udssl') ?> | <span id="clock">&nbsp;</span></legend>

                    <table class="table borderless table-condensed" >
                    <tr>
                    <td><?php _e('Start Time', 'udssl') ?> </td>
                    <td>
                        <input id="t_start" type="text" value="<?php echo date('Y-m-d h:i A', current_time('timestamp')); ?>" />
                        <button id="t_add_10" class="btn t_add" >10</button>
                        <button id="t_add_15" class="btn t_add" >15</button>
                        <button id="t_add_20" class="btn t_add" >20</button>
                        <button id="t_add_30" class="btn t_add" >30</button>
                        <button id="t_add_45" class="btn t_add" >45</button>
                        <button id="t_add_60" class="btn t_add" >60</button>
                        <button id="t_add_90" class="btn t_add" >90</button>
                    </td>
                    </tr>
                    <tr>
                    <td><?php _e('End Time', 'udssl') ?> </td>
                    <td>
                        <input id="t_end" type="text" value="<?php echo date('Y-m-d h:i A', current_time('timestamp')); ?>" />
                        <button id="t_add_minute" class="btn " ><?php _e('Add', 'udssl') ?></button>
                        <button id="t_subtract_minute" class="btn " ><?php _e('Subtract', 'udssl') ?></button>
                        <button id="t_now_minute" class="btn " ><?php _e('Now', 'udssl') ?></button>
                    </td>
                    </tr>
                    <tr>
                    <td><?php _e('Duration', 'udssl') ?> </td>
                    <td>
                        <input id="t_duration" type="text" value="30" />
                    </td>
                    </tr>
                    <tr>
                    <td><?php _e('Category', 'udssl') ?> </td>
                    <td>
                        <select id="t_category" type="text" value="Sample Category" >
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <td><?php _e('Project', 'udssl') ?> </td>
                    <td>
                        <select id="t_project" type="text" value="Sample Project" >
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <td><?php _e('Task', 'udssl') ?> </td>
                    <td>
                        <select id="t_task" type="text" value="Sample Task" >
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <td><?php _e('Description', 'udssl') ?> </td>
                    <td>
                        <input id="t_description" type="text" value="none" />
                    </td>
                    </tr>
                    <td></td>
                    <td>
                        <button id="t_add_slot" class="btn btn-large btn-success" ><?php _e('Add Time Slot', 'udssl') ?></button>
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
                        echo '<button id="' . $id . '" class="btn t_preset" >' . $name . '</button> ';
                    }
                    ?>
                    </td>
                    </tr>

                    </table>
                </fieldset>
            </div>
        </div>
        <div id="charts" ></div>
        <div id="t_summary" >
            <h3 class="muted"><?php _e('Time Data Charts', 'udssl') ?></h3>
            <button id="t_summary_button" class="btn btn-large btn-primary" ><?php _e('Generate Charts', 'udssl') ?></button>
            <div id="t_summary_total"></div>
            <h4 class="muted"><?php _e('Category Summary', 'udssl') ?></h4>
            <div id="t_summary_table"></div>
            <h4 class="muted"><?php _e('Project Summary', 'udssl') ?></h4>
            <div id="t_project_summary_table"></div>
            <h4 class="muted"><?php _e('Task Summary', 'udssl') ?></h4>
            <div id="t_task_summary_table"></div>
        </div>
        <h3 id="new-task" class="muted"><?php _e('Add New Categories, Projects and Tasks', 'udssl') ?></h3>
        <div id="footer-boxes" class="row-fluid">
            <div class="span4" id="category">
              <fieldset>
                <legend><?php _e('Categories', 'udssl') ?></legend>

                <table class="table borderless">
                <tr>
                <td><?php _e('Categories', 'udssl') ?> </td>
                <td>
                    <select id="c_category_list" type="text" value="<?php _e('Sample Category', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <td><?php _e('Name', 'udssl') ?> </td>
                <td>
                    <input id="c_category_name" type="text" value="<?php _e('Sample Name', 'udssl') ?>" />
                </td>
                </tr>
                <tr>
                <td><?php _e('Description', 'udssl') ?> </td>
                <td>
                    <input id="c_category_description" type="text" value="<?php _e('Sample Description', 'udssl') ?>" />
                </td>
                </tr>
                </tr>
                <td></td>
                <td>
                    <button id="c_add_category" class="btn btn-primary" ><?php _e('Add Category', 'udssl') ?></button>
                </td>
                </tr>

                </table>
              </fieldset>
            </div>
            <div class="span4" id="project" >
              <fieldset>
                <legend><?php _e('Projects', 'udssl') ?></legend>

                <table class="table borderless" >
                <tr>
                <td><?php _e('Projects', 'udssl') ?> </td>
                <td>
                    <select id="p_project_list" type="text" value="<?php _e('Sample Project', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <td><?php _e('Categories', 'udssl') ?> </td>
                <td>
                    <select id="p_category_list" type="text" value="<?php _e('Sample Category', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <tr>
                <td><?php _e('Name', 'udssl') ?> </td>
                <td>
                    <input id="p_project_name" type="text" value="<?php _e('Sample Project', 'udssl') ?>" />
                </td>
                </tr>
                <tr>
                <td><?php _e('Description', 'udssl') ?> </td>
                <td>
                    <input id="p_project_description" type="text" value="<?php _e('Sample Project Description', 'udssl') ?>" />
                </td>
                </tr>
                </tr>
                <td></td>
                <td>
                    <button id="p_add_project" class="btn btn-primary" ><?php _e('Add Project', 'udssl') ?></button>
                </td>
                </tr>

                </table>
              </fieldset>
            </div>
            <div class="span4" id="task">
              <fieldset>
                <legend><?php _e('Tasks', 'udssl') ?></legend>

                <table class="table borderless" >
                <tr>
                <td><?php _e('Tasks', 'udssl') ?> </td>
                <td>
                    <select id="ta_task_list" type="text" value="<?php _e('Sample Task', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <td><?php _e('Projects', 'udssl') ?> </td>
                <td>
                    <select id="ta_project_list" type="text" value="<?php _e('Sample Project', 'udssl') ?>" >
                    </select>
                </td>
                </tr>
                <tr>
                <tr>
                <td><?php _e('Name', 'udssl') ?> </td>
                <td>
                    <input id="ta_task_name" type="text" value="<?php _e('Sample Task', 'udssl') ?>" />
                </td>
                </tr>
                <tr>
                <td><?php _e('Description', 'udssl') ?> </td>
                <td>
                    <input id="ta_task_description" type="text" value="<?php _e('Sample Task Description', 'udssl') ?>" />
                </td>
                </tr>
                </tr>
                <td></td>
                <td>
                    <button id="ta_add_task" class="btn btn-primary" ><?php _e('Add Task', 'udssl') ?></button>
                </td>
                </tr>

                </table>
              </fieldset>
            </div>
        </div>
        <div class="footer">
        </div>
    </div><!-- /container -->
    <?php include_once UDSSL_TT_PATH . 'app/templates/_templates.php'; ?>
    <div id="time-toolbar">
        <h3 id="toolbar_clock"></h3>
        <h3 id="toolbar_duration"></h3>
        <a href="#tracker" class="btn"><?php _e('Tracker', 'udssl') ?></a>
        <a href="#charts" class="btn"><?php _e('Charts', 'udssl') ?></a>
        <a href="#new-task" class="btn"><?php _e('New Task', 'udssl') ?></a>
        <a href="#menu" class="btn"><?php _e('Menu', 'udssl') ?></a>
    </div>
    <?php wp_footer(); ?>
    <?php do_action('udssl_time_tracker'); ?>
</body>
</html>
