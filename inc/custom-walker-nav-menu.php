<?php

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

    private $idx = 0;

/**
 * What the class handles.
 *
 * @since 3.0.0
 * @var string
 *
 * @see Walker::$tree_type
 */
public $tree_type = array( 'post_type', 'taxonomy', 'custom' );


/**
 * Database fields to use.
 *
 * @since 3.0.0
 * @todo Decouple this.
 * @var string[]
 *
 * @see Walker::$db_fields
 */
public $db_fields = array(
    'parent' => 'menu_item_parent',
    'id'     => 'db_id',
);


/**
 * Starts the list before the elements are added.
 *
 * @since 3.0.0
 *
 * @see Walker::start_lvl()
 *
 * @param string   $output Used to append additional content (passed by reference).
 * @param WP_Post  $data_object       Menu item data object.
 * @param int      $depth  Depth of menu item. Used for padding.
 * @param stdClass $args   An object of wp_nav_menu() arguments.
 */



public function start_lvl( &$output, $depth = 0, $args = null) {

    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent = str_repeat( $t, $depth );
    

    // Default class.

    if($depth === 0) {
        $classes = array( 'sub-menu dropdown-menu megamenu' );
    } else {
        $classes = array( 'sub-menu' );

    }

    /**
     * Filters the CSS class(es) applied to a menu list element.
     *
     * @since 4.8.0
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
     * @param stdClass $args    An object of `wp_nav_menu()` arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $output .= "{$n}{$indent}<ul$class_names>{$n}";

    if($depth === 0) {
        $output .= "<div class='accordion' id='accordionNav'>";
    }


    $this->idx++;
	
	$index = $this->idx-1;

    if($depth > 0) {
        $output .= "<div id='collapse" . $index . "-" . $depth . "'" . " class='accordion-collapse collapse' aria-labelledby='headingOne' >";
    }

}

/**
 * Ends the list of after the elements are added.
 *
 * @since 3.0.0
 *
 * @see Walker::end_lvl()
 *
 * @param string   $output Used to append additional content (passed by reference).
 * @param int      $depth  Depth of menu item. Used for padding.
 * @param stdClass $args   An object of wp_nav_menu() arguments.
 */
public function end_lvl( &$output, $depth = 0, $args = null ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent  = str_repeat( $t, $depth );

    if($depth === 0) {
        $output .= "</div>";

    }

    if($depth > 0) {
        $output .= '</div>';
    }

    $output .= "$indent</ul>{$n}";
}

/**
 * Starts the element output.
 *
 * @since 3.0.0
 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
 * @since 5.9.0 Renamed `$item` to `$data_object` and `$id` to `$current_object_id`
 *              to match parent class for PHP 8 named parameter support.
 *
 * @see Walker::start_el()
 *
 * @param string   $output            Used to append additional content (passed by reference).
 * @param WP_Post  $data_object       Menu item data object.
 * @param int      $depth             Depth of menu item. Used for padding.
 * @param stdClass $args              An object of wp_nav_menu() arguments.
 * @param int      $current_object_id Optional. ID of the current menu item. Default 0.
 */
public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
    // Restores the more descriptive, specific name for use within this method.
    $menu_item = $data_object;

    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
    $classes[] = 'nav-item menu-item-' . $menu_item->ID;

    foreach($classes as $class) {

        if($class === 'menu-item-has-children' && $depth === 0) {
            $classes[] =  ' first-nav-item nav-item dropdown has-megamenu menu-item-' . $menu_item->ID;
        }
    }

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param WP_Post  $menu_item Menu item data object.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );

    /**
     * Filters the CSS classes applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    /**
     * Filters the ID applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_id   The ID that is applied to the menu item's `<li>` element.
     * @param WP_Post  $menu_item The current menu item.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';


    if($depth > 0) {
        if($depth === 1 ) {
            $output .= '<div class="accordion-item first-accordion-item">';

        } else {
            $output .= '<div class="accordion-item">';

        }
    }

    $output .= $indent . '<li' . $id . $class_names . '>';

    $atts           = array();
    $atts['title']  = ! empty( $menu_item->attr_title ) ? $menu_item->attr_title : '';
    $atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
    if ( '_blank' === $menu_item->target && empty( $menu_item->xfn ) ) {
        $atts['rel'] = 'noopener';
    } else {
        $atts['rel'] = $menu_item->xfn;
    }

    $atts['href']         = ! empty( $menu_item->url ) ? $menu_item->url : '';



    $atts['aria-current'] = $menu_item->current ? 'page' : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title        Title attribute.
     *     @type string $target       Target attribute.
     *     @type string $rel          The rel attribute.
     *     @type string $href         The href attribute.
     *     @type string $aria-current The aria-current attribute.
     * }
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
            $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';

            foreach($classes as $class) {
                if($depth === 0 && $class === 'menu-item-has-children') {
                    $attributes .= 'data-bs-toggle="dropdown"';
                }
            }

        }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title     The menu item's title.
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );
    

    $item_output  = $args->before;

    foreach($classes as $class) {
        if($depth > 0 && $class === "menu-item-has-children") {
			
			$item_output .= '<a ';

			$item_output .=  $attributes . '>';

			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			

            if($depth === 1) {
				
                $item_output .= 
                "
                <button class='first-nav-button accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$this->idx-$depth' aria-expanded='true' aria-controls='collapse$this->idx-$depth'>
        
                ";
            } else {
				
				
                $item_output .= 
                "
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$this->idx-$depth' aria-expanded='true' aria-controls='collapse$this->idx-$depth'>
        
                ";
            }


        }
    }


    $item_output .= '<a ';

    foreach($classes as $class) {
        if( $depth === 0 && $class === "menu-item-has-children") {
            $item_output .= 'class="nav-link dropdown-toggle"';
        }
    }

    $item_output .=  $attributes . '>';
	
    $item_output .= $args->link_before;
	

			$item_output .= $title;

	$args->link_after;
	
    $item_output .= '</a>';
	
    $item_output .= $args->after;

    foreach($classes as $class) {
        if($depth > 0 && $class === "menu-item-has-children") {
            $item_output .= 
            '
                </button>
            ';
        }
    }

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $menu_item   Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
}

/**
 * Ends the element output, if needed.
 *
 * @since 3.0.0
 * @since 5.9.0 Renamed `$item` to `$data_object` to match parent class for PHP 8 named parameter support.
 *
 * @see Walker::end_el()
 *
 * @param string   $output      Used to append additional content (passed by reference).
 * @param WP_Post  $data_object Menu item data object. Not used.
 * @param int      $depth       Depth of page. Not Used.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 */
public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
    $menu_item = $data_object;
    $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;

    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }

    $output .= "</li>{$n}";

    if($depth > 0) {
        $output .= '</div>';
    }
    
}



}

