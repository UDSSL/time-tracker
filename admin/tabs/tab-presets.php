<?php
/**
 * UDSSL Time Tracker Presets
 */
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

/**
 * UDSSL Time Tracker Options
 */
$options = get_option('udssl_tt_options');

/**
 * Preset Section
 */
add_settings_section(
    'presets',
    __('Task Presets', 'udssl'),
    'presets_callback',
    'manage-udssl'
);
function presets_callback(){
    _e('Configure Presets', 'udssl');
}

/**
 * Edit Preset Field
 */
add_settings_field(
    'edit_preset',
    __('Edit Preset', 'udssl'),
    'edit_preset_callback',
    'manage-udssl',
    'presets',
    $options
);
function edit_preset_callback($options){
    echo '<input name="udssl_tt_options[presets][name]" type="text"
        value="Project 1" class="regular-text" >';
    echo '<p class="description" >' . __('Preset Name', 'udssl') . '</p>';

    echo '<input name="udssl_tt_options[presets][category]" type="text"
        value="Work" class="regular-text" >';
    echo '<p class="description" >' . __('Preset Category', 'udssl') . '</p>';

    echo '<input name="udssl_tt_options[presets][project]" type="text"
        value="Project 1" class="regular-text" >';
    echo '<p class="description" >' . __('Preset Project', 'udssl') . '</p>';

    echo '<input name="udssl_tt_options[presets][task]" type="text"
        value="Research" class="regular-text" >';
    echo '<p class="description" >' . __('Preset Task', 'udssl') . '</p>';
}

/**
 * Save Reset Presets
 */
add_settings_section(
    'save_reset',
    __('Save Preset', 'udssl'),
    'save_reset_callback',
    'manage-udssl'
);
function save_reset_callback(){
    echo '<input name="udssl_tt_options[save_preset]"
        type="submit" class="button-primary" value="' . esc_attr__('Save Preset', 'udssl') .'" />';
    echo ' <input name="udssl_tt_options[delete_preset]"
        type="submit" class="button-secondary" value="' . esc_attr__('Delete', 'udssl') .'" />';
    echo ' <input name="udssl_tt_options[reset_presets]"
        type="submit" class="button-secondary" value="' . esc_attr__('Reset', 'udssl') .'" />';
}

/**
 * Current Presets
 */
add_settings_section(
    'current_presets',
    __('Current Presets', 'udssl'),
    'current_presets_callback',
    'manage-udssl'
);
function current_presets_callback(){
    $options = get_option('udssl_tt_options');
    echo '<table class="widefat">
        <thead>
            <tr>
                <th class="row-title">Name</th>
                <th>Category</th>
                <th>Project</th>
                <th>Task</th>
            </tr>
        </thead>
        <tbody>';

    foreach($options['presets'] as $preset){
		echo '<tr>
			<td class="row-title"><label for="tablecell">' . $preset['name'] . '</label></td>
			<td>' . $preset['category'] . '</td>
			<td>' . $preset['project'] . '</td>
			<td>' . $preset['task'] . '</td>
		</tr>';
    }

    echo '</tbody>
        <tfoot>
            <tr>
                <th class="row-title">Name</th>
                <th>Category</th>
                <th>Project</th>
                <th>Task</th>
            </tr>
        </tfoot>
    </table>';
}
?>
