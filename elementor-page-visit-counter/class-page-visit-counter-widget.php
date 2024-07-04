<?php
// Replace 'Page_Visit_Counter_Widget' with your widget's class name.
class Page_Visit_Counter_Widget extends \Elementor\Widget_Base {

    // Widget Name
    public function get_name() {
        return 'page-visit-counter-widget';
    }

    // Widget Title
    public function get_title() {
        return __( 'Page Visit Counter', 'page-visit-counter' );
    }

    // Widget Icon (optional)
    public function get_icon() {
        return 'eicon-time'; // Example icon
    }

    // Widget Categories (optional)
    public function get_categories() {
        return [ 'general' ]; // Categories for your widget
    }

    // Constructor
    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        // Hook into page visit counting
        add_action('wp', [$this, 'count_page_visit']);
    }

    // Count Page Visits
    public function count_page_visit() {
        $post_id = get_the_ID();
        $count_key = 'page_visit_count';
        $count = get_post_meta($post_id, $count_key, true);
        $count = (empty($count)) ? 0 : (int)$count;
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }

    // Render Widget Output
    protected function render() {
        $post_id = get_the_ID();
        $count_key = 'page_visit_count';
        $count = get_post_meta($post_id, $count_key, true);

        // Output the counter
        echo '<div class="page-visit-counter-widget">';
        echo '<p>Page Visits: ' . esc_html($count) . '</p>';
        echo '</div>';
    }

    // Render Widget Output in Editor (Optional)
    protected function _content_template() {
        ?>
        <div class="page-visit-counter-widget">
            <p>Page Visits: {{{ settings.count }}}</p>
        </div>
        <?php
    }
}
