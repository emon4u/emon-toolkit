<?php

namespace EmonToolkit\Admin;

/**
 * The Menu handler class
 */
class Menu {
    public $addressbook;

    /**
     * Initialize the class
     */
    function __construct( $addressbook ) {
        $this->addressbook = $addressbook;

        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu() {
        $parent_slug = 'emon-toolkit';
        $capability = 'manage_options';

        add_menu_page( __( 'Emon Toolkit', 'emon-toolkit' ), __( 'Emon Toolkit', 'emon-toolkit' ), $capability, $parent_slug, [$this->addressbook, 'plugin_page'], 'dashicons-smiley' );
        add_submenu_page( $parent_slug, __( 'Address Book', 'emon-toolkit' ), __( 'Address Book', 'emon-toolkit' ), $capability, $parent_slug, [$this->addressbook, 'plugin_page'] );
    }
}