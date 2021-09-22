<div class="wrap">
    <h1><?php _e( 'View Address', 'emon-toolkit' );?></h1>

    <table class="form-table">
        <tbody>
            <tr class="row">
                <th scope="row">
                   <?php _e( 'Name', 'emon-toolkit' );?>
                </th>
                <td>
                    <p><?php echo esc_html( $address->name ); ?></p>
                </td>
            </tr>
            <tr class="row">
                <th scope="row">
                    <?php _e( 'Address', 'emon-toolkit' );?>
                </th>
                <td>
                    <p><?php echo $address->address ? esc_html( $address->address ) : __( 'None', 'emon-toolkit' ) ?></p>
                </td>
            </tr>
            <tr class="row">
                <th scope="row">
                    <?php _e( 'Phone', 'emon-toolkit' );?>
                </th>
                <td>
                    <p><?php echo esc_html( $address->phone ); ?></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>