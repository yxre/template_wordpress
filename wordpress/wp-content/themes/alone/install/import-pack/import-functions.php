<?php
/**
 * Import main functions
 *
 * @package Import Pack WP theme
 * @author BePlus
 * @version 1.0.10
 */

{
    /**
     * Defineds
     *
     */

    function beplus_import_pack_defineds() {
        /**
         * Defines
         *
         */

        define( 'IMPORT_REMOTE_SERVER', 'https://package.beplusthemes.com/alone/' );
        define( 'IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD', 'https://download.beplusthemes.com/' );
        define( 'IMPORT_URL_OPEN_TICKET', 'https://bearsthemes.ticksy.com' );
    }
}

{
    /**
     * Includes
     *
     */
    require( get_template_directory() . '/install/import-pack/inc/class.install-hepers.php' );
    require( get_template_directory() . '/install/import-pack/static.php' );
    require( get_template_directory() . '/install/import-pack/hooks.php' );
    require( get_template_directory() . '/install/import-pack/ajax.php' );
}

if( ! function_exists( 'beplus_register_import_menu' ) ) {
    /**
     * Register menu import page
     *
     */
    function beplus_register_import_menu() {

        $page_title = apply_filters( 'beplus/import_pack/submenu_page_title', __( 'Import Demos', 'beplus' ) );

        add_submenu_page(
            'themes.php',
            $page_title,
            $page_title,
            'manage_options',
            'import-demo-page',
            'beplus_register_import_page_callback'
        );
    }
}

if( ! function_exists( 'beplus_register_import_page_callback' ) ) {
    /**
     * Import page template func
     *
     */
    function beplus_register_import_page_callback() {

        set_query_var( 'tabs', amentex_import_page_tabs() );
        load_template( get_template_directory() . '/install/import-pack/templates/import-page.php' );
    }
}

if( ! function_exists( 'amentex_import_page_tabs' ) ) {
    /**
     * Import page tabs data
     *
     */
    function amentex_import_page_tabs() {

        return apply_filters( 'beplus/import_page/tabs', [
            [
                'id' => 'demo_install_package',
                'title' => __( 'Demo & Install Package', 'beplus' ),
                'template_callback' => 'beplus_import_pack_demo_install_package_tab_content',
            ],
            [
                'id' => 'theme_requirements',
                'title' => __( 'Theme Requirements', 'beplus' ),
                'template_callback' => 'beplus_import_pack_theme_requirements_tab_content',
            ],
        ] );
    }
}

if( ! function_exists( 'beplus_package_demo' ) ) {
    /**
     * Import package demo data
     *
     */
    function beplus_package_demo() {

        return require( get_template_directory() . '/install/import-pack/data/import.php' );
    }
}

if( ! function_exists( 'beplus_import_pack_theme_requirements_tab_content' ) ) {
    /**
     * Import pack theme requirements template
     *
     */
    function beplus_import_pack_theme_requirements_tab_content() {

        load_template( get_template_directory() . '/install/import-pack/templates/theme-requirements.php' );
    }
}

if( ! function_exists( 'beplus_import_pack_demo_install_package_tab_content' ) ) {
    /**
     * Import pack demo install package template
     *
     */
    function beplus_import_pack_demo_install_package_tab_content() {

        set_query_var( 'package_demos', beplus_package_demo() );
        load_template( get_template_directory() . '/install/import-pack/templates/demo-install-package.php' );
    }
}

if( ! function_exists( 'beplus_import_pack_get_package_data_by_id' ) ) {
    /**
     * Get package data by package name
     *
     */
    function beplus_import_pack_get_package_data_by_id( $package_id ) {

        $packages = beplus_package_demo();
        $key = array_search( $package_id, array_column( $packages, 'package_name' ) );

        if( $key === false ) {
            return;
        }

        return $packages[$key];
    }
}

if( ! function_exists( 'beplus_import_pack_import_steps' ) ) {
    /**
     * Import steps define
     *
     */
    function beplus_import_pack_import_steps() {

        return apply_filters( 'beplus/import_pack/import_steps', [
            [
                'name' => 'backup_site',
                'title' => __( 'Backup site', 'beplus' ),
                'description' => __( 'Avoid risks during the import process, you should create a backup before performing install package demo. click \'yes\' to backup now or skip.', 'pp' ),
                'template_callback' => 'beplus_import_pack_step_backup_site',
                'actions' => ['__skip__', '__yes__'],
                'actions_callback' => [
                    [
                        'action' => '__skip__',
                        'ajax_func' => 'beplus_import_pack_backup_site_skip_func',
                    ],
                ]
            ],
            // [
            //     'name' => 'install_plugin',
            //     'title' => __( 'Install Plugins', 'beplus' ),
            //     'description' => __( 'This package include __count_plugin__ plugin(s) please install and activate they before import content. click \'Explained\' to view all plugins.', 'beplus' ),
            //     'template_callback' => 'beplus_import_pack_step_install_plugins',
            //     'actions' => ['__yes__'],
            // ],
            [
                'name' => 'download_import_package',
                'title' => __( 'Download & Import Package', 'beplus' ),
                'description' => __( 'This process may take several minutes or longer depending on the network speed. Thanks you!', 'beplus' ),
                'template_callback' => 'beplus_import_pack_step_download_import_package',
                'actions' => ['__yes__'],
            ],
            [
                'name' => 'import_package_successful',
                'title' => __( 'Import Package Successful!', 'beplus' ),
                'description' => __( 'Thank you creating with Alone. Do not hesitate to contact us if you need help!', 'beplus' ),
                'template_callback' => 'beplus_import_pack_step_import_package_successful',
            ]
        ] );
    }
}

if( ! function_exists( 'beplus_import_pack_step_import_package_successful' ) ) {
    /**
     * Step import package successful
     */
    function beplus_import_pack_step_import_package_successful( $package, $step, $index ) {
        ?>
        <div class="item inner-step">
            <div class="heading-image">
                <svg x="0px" y="0px" viewBox="0 0 426.667 426.667" style="enable-background:new 0 0 426.667 426.667;" xml:space="preserve"> <path style="fill:#6AC259;" d="M213.333,0C95.518,0,0,95.514,0,213.333s95.518,213.333,213.333,213.333 c117.828,0,213.333-95.514,213.333-213.333S331.157,0,213.333,0z M174.199,322.918l-93.935-93.931l31.309-31.309l62.626,62.622 l140.894-140.898l31.309,31.309L174.199,322.918z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
            </div>
            <div class="entry">
                <h4 class="title"><?php echo "{$step['title']}"; ?></h4>
                <div class="desc"><?php echo "{$step['description']}" ?></div>
                <div class="buttons-action">
                    <a href="javascript:" class="button button-close"><?php _e( 'Close', 'beplus' ); ?></a>
                    <a href="<?php echo site_url(); ?>" class="button button-primary"><?php _e( 'Go Home', 'beplus' ); ?></a>
                </div>
            </div>
        </div>
        <?php
    }
}

if( ! function_exists( 'beplus_import_pack_render_actions_button' ) ) {
    /**
     * Render action button
     *
     */
    function beplus_import_pack_render_actions_button( $actions = [] ) {

        $button_map = apply_filters( 'beplus/import_pack/action_buttons', [
            '__skip__' => function() {
                return '<button class="ip-btn btn-action-skip" data-type="__skip__">'. __( 'Skip', 'beplus' ) .'</button>';
            },
            '__yes__' => function() {
                return '<button class="ip-btn btn-action-yes" data-type="__yes__">'. __( 'Yes', 'beplus' ) .'</button>';
            }
        ] );

        $output = '';
        foreach( $actions as $index => $action ) {
            $output .= $button_map[$action]();
        }

        return $output;
    }
}

if( ! function_exists( 'beplus_import_pack_render_actions_callback_form' ) ) {
    /**
     * Render action handle form
     *
     */
    function beplus_import_pack_render_actions_callback_form( $actions_callback = [] ) {

        ?>
        <form class="ip-actions-callback-form">
            <?php foreach( $actions_callback as $index => $action ) : ?>
            <input type="hidden" name="<?php echo esc_attr( $action['action'] ); ?>" value="<?php echo esc_attr( $action['ajax_func'] ); ?>">
            <?php endforeach; ?>
        </form>
        <?php
    }
}

if( ! function_exists( 'beplus_import_pack_step_backup_site' ) ) {
    /**
     * Step backup site
     *
     */
    function beplus_import_pack_step_backup_site( $package, $step, $index ) {
        $int_step = $index + 1;
        ?>
        <div class="item inner-step">
            <div class="heading-image">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/install/import-pack/images/backup-site.jpg' ); ?>" alt="<?php echo esc_attr( $package['title'] ); ?>">
            </div>
            <div class="entry">
                <h4 class="title"><?php echo "{$int_step}. ", "{$step['title']}"; ?></h4>
                <div class="desc"><?php echo "{$step['description']}" ?></div>

                <div class="ip-explained-container">
                    <a href="javascript:" class="__toggle-explained"><?php _e( 'Explained', 'beplus' ); ?></a>
                    <div class="ip-explained-content">
                        <ul class="__sub-step">
                            <li class="__step" data-step-name="install_bears_backup_plg">
                                <span class="__step-label"><?php _e( 'Install Bears Backup Plugin', 'beplus' ); ?></span>
                                <span class="status-ui"></span>
                            </li>
                            <li class="__step" data-step-name="backup_database">
                                <span class="__step-label"><?php _e( 'Backup Database', 'beplus' ); ?></span>
                                <span class="status-ui"></span>
                            </li>
                            <li class="__step" data-step-name="create_file_config">
                                <span class="__step-label"><?php _e( 'Create File Config', 'beplus' ); ?></span>
                                <span class="status-ui"></span>
                            </li>
                            <li class="__step" data-step-name="backup_folder_upload">
                                <span class="__step-label"><?php _e( 'Backup Folder Upload', 'beplus' ); ?></span>
                                <span class="status-ui"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="actions">
                <?php echo isset( $step['actions'] ) ? beplus_import_pack_render_actions_button( $step['actions'] ) : ''; ?>
                <?php echo isset( $step['actions_callback'] ) ? beplus_import_pack_render_actions_callback_form( $step['actions_callback'] ) : ''; ?>
            </div>
        </div>
        <?php
    }
}

if( ! function_exists( 'beplus_import_pack_step_install_plugins' ) ) {
    /**
     * Step install plugins
     *
     */
    function beplus_import_pack_step_install_plugins( $package, $step, $index ) {
        $int_step = $index + 1;
        ?>
        <div class="item inner-step">
            <div class="heading-image">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/install/import-pack/images/install-plugins.jpg' ) ?>" alt="<?php echo esc_attr( $package['title'] ); ?>">
            </div>
            <div class="entry">
                <h4 class="title"><?php echo "{$int_step}. ", "{$step['title']}"; ?></h4>
                <div class="desc"><?php echo "{$step['description']}" ?></div>

                <?php if( isset( $package['plugins'] ) && count( $package['plugins'] ) > 0 ) : ?>
                <div class="ip-explained-container">
                    <a href="javascript:" class="__toggle-explained"><?php _e( 'Explained', 'beplus' ); ?></a>
                    <div class="ip-explained-content">
                        <ul class="ip-plugin-include-checklist">
                            <?php foreach( $package['plugins'] as $index => $plugin ) : ?>
                            <li data-plugin-slug="<?php echo esc_attr( $plugin['slug'] ); ?>" data-plugin-source="<?php echo isset( $plugin['source'] ) ? esc_attr( $plugin['source'] ) : ''; ?>">
                                <span class="plg-name"><?php echo $plugin['name'] ?></span>
                                <span class="status-ui"></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="actions">
                <?php echo isset( $step['actions'] ) ? beplus_import_pack_render_actions_button( $step['actions'] ) : ''; ?>
                <?php echo isset( $step['actions_callback'] ) ? beplus_import_pack_render_actions_callback_form( $step['actions_callback'] ) : ''; ?>
            </div>
        </div>
        <?php
    }
}

if( ! function_exists( 'beplus_import_pack_step_download_import_package' ) ) {
    /**
     * Step download & import demo
     *
     */
    function beplus_import_pack_step_download_import_package( $package, $step, $index ) {
        $int_step = $index + 1;
        ?>
        <div class="item inner-step">
            <div class="heading-image">
                <img src="<?php echo esc_url( $package['preview'] ) ?>" alt="<?php echo esc_attr( $package['title'] ); ?>">
            </div>
            <div class="entry">
                <h4 class="title"><?php echo "{$int_step}. ", "{$step['title']}"; ?></h4>
                <div class="desc"><?php echo "{$step['description']}" ?></div>
            </div>
            <div class="actions">
                <?php echo isset( $step['actions'] ) ? beplus_import_pack_render_actions_button( $step['actions'] ) : ''; ?>
                <?php echo isset( $step['actions_callback'] ) ? beplus_import_pack_render_actions_callback_form( $step['actions_callback'] ) : ''; ?>
            </div>
        </div>
        <?php
    }
}

if( ! function_exists( 'beplus_import_pack_backup_site_skip_func' ) ) {
    /**
     * Backup site skip action
     *
     */
    function beplus_import_pack_backup_site_skip_func() {

        // Install plugin Bears Backup
        $installer = false;
        $plugin = [
            'slug' => 'bears-backup',
            'source' => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'bears-backup.zip',
        ];

        if(! Import_Pack_Plugin_Installer_Helper::is_installed( $plugin )) {

            $install_response = Import_Pack_Plugin_Installer_Helper::install( $plugin );
            if( $install_response['success'] == true ) {
                // Install...
                $installer = true;
            }
        } else {
            $installer = true;
        }

        if( false == $installer ) {
            wp_send_json( [
                'success' => true,
                'result' => [
                    'status' => false,
                    'message' => __( 'Install plugin Bears Backup fail!', 'beplus' ),
                ]
            ] );

            exit();
        }

        $active_response = Import_Pack_Plugin_Installer_Helper::activate( $plugin );
        $activate = false;

        if( $active_response['success'] != true ) {
            wp_send_json( [
                'success' => true,
                'result' => [
                    'status' => false,
                    'message' => __( 'Active plugin Bears Backup fail!', 'beplus' ),
                ]
            ] );

            exit();
        }

        return [
            'form_action' => '__next_step__',
        ];
    }
}

if( ! function_exists( 'beplus_import_pack_backup_site_yes_func' ) ) {
    /**
     * Backup site yes action
     */
    function beplus_import_pack_backup_site_yes_func() {

        // Install plugin Bears Backup
        $installer = false;
        $plugin = [
            'slug' => 'bears-backup',
            'source' => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . '/bears-backup.zip',
        ];

        if(! Import_Pack_Plugin_Installer_Helper::is_installed( $plugin )) {

            $install_response = Import_Pack_Plugin_Installer_Helper::install( $plugin );
            if( $install_response['success'] == true ) {
                // Install...
                $installer = true;
            }
        } else {
            $installer = true;
        }

        if( false == $installer ) {
            return [
                'status' => false,
            ];
        }

        $active_response = Import_Pack_Plugin_Installer_Helper::activate( $plugin );
        $activate = false;

        if( $active_response['success'] != true ) {
            return [
                'status' => false,
            ];
        }

        return [
            'status' => true,
            'form_action' => '__next_step__',
        ];
    }
}

if( ! function_exists( 'beplus_import_pack_download_package_step' ) ) {
    /**
     *
     */
    function beplus_import_pack_download_package_step( $package_name, $position = 0, $package = null ) {

        $remote_url = beplus_import_pack_make_remote_url( $package_name, $position );

        if( ! $position ) {
            // step 0 create zip file
            $result = beplus_import_pack_download_package_step_init( $remote_url, 'package-demo.zip' );
        } else {

            $result = beplus_import_pack_download_package_step_push( $remote_url, $position, $package );
        }

        return $result;
    }
}

if( ! function_exists( 'beplus_import_pack_make_remote_url' ) ) {
    /**
     *
     */
    function beplus_import_pack_make_remote_url( $package_name = null, $position = 0, $size = 0 ) {

        $size = ( $size ) ? '&size=' . $size : '';
        return sprintf( '%s?id=%s&position=%d' . $size, IMPORT_REMOTE_SERVER, $package_name, $position );
    }
}

if( ! function_exists( 'beplus_import_pack_read_remote_head' ) ) {
    /**
     *
     */
    function beplus_import_pack_read_remote_head( $remote_url ) {

        $head = array_change_key_case(get_headers($remote_url, TRUE));
        return $head;
    }
}


if( ! function_exists( 'beplus_import_pack_download_package_step_init' ) ) {
    /**
     * Create package file (.zip)
     *
     */
    function beplus_import_pack_download_package_step_init( $remote_url, $file_name ) {
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $upload_dir = wp_upload_dir();
        $path = $upload_dir['basedir'];
        $path_file_package = $path . '/' . $file_name;

        $head = beplus_import_pack_read_remote_head( $remote_url );
        $content = $wp_filesystem->get_contents( $remote_url );

        $mb = 1000 * 1000;
        $download = number_format($head['x-position'] / $mb, 1);
        $total = number_format($head['x-filesize'] / $mb, 1);

        if( $wp_filesystem->put_contents( $path_file_package, $content ) ) {

            return array(
                'download_package_success' => false,
                'package_size' => $total,
                'package_download' => $download,
                'package' => $file_name,
                'x_position' => $head['x-position'],
            );
        } else {

            return false;
        }

    }
}

if( ! function_exists( 'beplus_import_pack_download_package_step_push' ) ) {
    /**
     * Download package push data
     *
     */
    function beplus_import_pack_download_package_step_push( $remote_url, $position, $package ) {

        global $wp_filesystem;
        if ( empty( $wp_filesystem ) ) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $head = beplus_import_pack_read_remote_head( $remote_url );
        $content = $wp_filesystem->get_contents( $remote_url );

        $upload_dir = wp_upload_dir();
        $path = $upload_dir['basedir'];
        $path_file_package = $path . '/' . $package;


        if( isset( $head['x-position'] ) && $head['x-position'] == -1 ) {
            return array(
                'download_package_success' => true,
                'remote_url' => $remote_url,
                'package' => $package,
            );
        }

        $mb = 1000 * 1000;
        $download = number_format($head['x-position'] / $mb, 1);

        if( BBACKUP_Helper_Function_File_Appent_Content( $path_file_package, $content ) ) {
            return array(
                'package_download' => $download,
                'package' => $package,
                'x_position' => $head['x-position'],
            );
        }
    }
}
