<div class="wrap cmicpt-wrap">
    <h2>Current Menu Item for Custom Post Types</h2>
    <?php if(!empty($_POST['submit']) && $_POST['submit'] != ''):?>
    <div id="setting-error-settings_updated" class="updated settings-error"> 
        <p><strong>Settings saved.</strong></p>
    </div>
    <?php endif;?>
    <form method="post" action="options-general.php?page=current-menu-item-cpt">

        <table class="form-table">
            <tbody>
                <?php $cmicptData = json_decode( get_site_option( 'cmicpt-data' ) );?>
                <?php $cmicptClass = json_decode( get_site_option( 'cmicpt-class' ) );?>
                <?php $pages = get_posts( array( 'numberposts' => -1, 'post_type' => 'page' ) );?>
                <tr>   
                    <th colspan="2">
                        <h3>Assign custom post types to pages</h3>
                        <p>Select which page will be active in the nav menu when you are on the single page of a custom post type.</p>
                    </th>
                </tr>
                
                <?php foreach($postTypes as $postType):?>
                <tr>
                    <th scope="row">
                        <label title="<?php echo $postType->labels->name;?> (<?php echo $postType->name;?>)" for="<?php echo $postType->name;?>">Assign "<strong><?php echo $postType->labels->name;?></strong>" to</label>
                    </th>
                    <td>
                        <select name="<?php echo $postType->name;?>" id="<?php echo $postType->name;?>">
                            <option value=""></option>
                            <?php foreach($pages as $page):?>
                                <option value="<?php echo $page->ID;?>"<?php if(!empty($cmicptData->{$postType->name}) && $cmicptData->{$postType->name} == $page->ID):?> selected="selected"<?php endif;?>><?php echo $page->post_title;?></option>
                            <?php endforeach;?>	
                        </select>
                    </td>
                </tr>
                <?php endforeach;?>
                
                <tr>   
                    <th colspan="2"><h3>Options</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="custom_class_name">Custom Item Class</label>
                    </th>
                    <td>
                        <input class="regular-text ltr" type="text" name="custom_class_name" id="custom_class_name" value="<?php echo $cmicptClass->item;?>" /><br />
                        <small>You can enter multiple classes separated by a space. The default class is <em>current-menu-item</em>.</small>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="custom_parent_class_name">Custom Parent Class</label>
                    </th>
                    <td>
                        <input class="regular-text ltr" type="text" name="custom_parent_class_name" id="custom_parent_class_name" value="<?php echo $cmicptClass->parent;?>" /><br />
                        <small>You can enter multiple classes separated by a space. The default class is <em>current-menu-ancestor</em>.</small>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" /></p>
    </form>
    
</div>