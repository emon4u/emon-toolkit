<?php

namespace EmonToolkit;

/**
 * The Admin Class
 */
class Admin {
    /**
     * Initialize the class
     */
    function __construct() {
        $addressbook = new Admin\Addressbook();

        $this->dispatch_actions( $addressbook );

        new Admin\Menu( $addressbook );
    }

    /**
     * Dispatch and bind actions
     *
     * @return void
     */
    public function dispatch_actions( $addressbook ) {
        add_action( 'admin_init', [$addressbook, 'form_handler'] );
        add_action( 'admin_post_et-delete-address', [$addressbook, 'delete_address'] );
    }
}