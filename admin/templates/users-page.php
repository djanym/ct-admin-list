<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Users', 'ct-admin-list' ); ?></h1>

    <hr class="wp-header-end">

    <h2 class="screen-reader-text"><?php esc_html_e( 'Filter users list', 'ct-admin-list' ); ?></h2>

        <div class="tablenav top">

            <h2 class="screen-reader-text"><?php esc_html_e( 'User roles filter', 'ct-admin-list' ); ?></h2>
            <ul class="subsubsub roles-list-nav">
                <?php echo $this->role_filter_nav(); ?>
            </ul>

            <h2 class="screen-reader-text"><?php esc_html_e( 'Users list pagination', 'ct-admin-list' ); ?></h2>
            <?php echo $this->paginator(); ?>
            <br class="clear">
        </div>

        <h2 class="screen-reader-text"><?php esc_html_e( 'Users list', 'ct-admin-list' ); ?></h2>
        <table class="wp-list-table widefat fixed striped users-list-table">
            <thead>
            <tr>
                <th scope="col" id="username" class="column-username column-primary <?php echo $this->prepare_sortable_classes('user_name'); ?>">
                    <a href="<?php echo esc_url( $sort_link_username ); ?>" data-sort-order="<?php echo $this->prepare_new_orderdir('user_name'); ?>" data-sort-orderby="user_name">
                        <span><?php esc_html_e( 'Username', 'ct-admin-list' ); ?></span><span class="sorting-indicator"></span>
                    </a>
                </th>
                <th scope="col" id="name" class="column-name <?php echo $this->prepare_sortable_classes('display_name'); ?>">
                    <a href="<?php echo esc_url( $sort_link_displayname ); ?>" data-sort-order="<?php echo $this->prepare_new_orderdir('display_name'); ?>" data-sort-orderby="display_name">
                        <span><?php esc_html_e( 'Name', 'ct-admin-list' ); ?></span><span class="sorting-indicator"></span>
                    </a>
                </th>
                <th scope="col" id="email" class="column-email"><?php esc_html_e( 'Email', 'ct-admin-list' ); ?></th>
                <th scope="col" id="role" class="column-role"><?php esc_html_e( 'Role', 'ct-admin-list' ); ?></th>
            </tr>
            </thead>

            <template id="user_table_row" style="display: none;">
                <tr>
                    <td><strong><a id="user_name_link"></a></strong></td>
                    <td id="display_name"></td>
                    <td id="user_email"></td>
                    <td id="user_roles"></td>
                </tr>
            </template>

            <template id="user_table_noresults" style="display: none;">
                <tr class="no-items"><td class="colspanchange" colspan="4"><?php esc_html_e('Nothing found', 'ct-admin-list'); ?></td></tr>
            </template>

            <tbody id="list_table_body">

            <?php
            if ( $this->found_items ) :
                foreach ($this->found_items as $user) : ?>
                    <tr>
                        <td><strong><a href="<?php echo get_edit_user_link( $user->ID ); ?>"><?php echo $user->user_login; ?></a></strong></td>
                        <td><?php echo $user->display_name; ?></td>
                        <td><?php echo $user->user_email; ?></td>
                        <td><?php echo $this->format_roles( $user->roles ); ?></td>
                    </tr>
                <?php
                endforeach;
            else : ?>
                <tr class="no-items"><td class="colspanchange" colspan="4"><?php esc_html_e('Nothing found', 'ct-admin-list'); ?></td></tr>
            <?php
            endif;
            ?>

            </tbody>

        </table>

        <div class="tablenav bottom">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Users list pagination', 'ct-admin-list' ); ?></h2>
            <?php echo $this->paginator(); ?>
            <br class="clear">
        </div>

    <br class="clear">
</div>
