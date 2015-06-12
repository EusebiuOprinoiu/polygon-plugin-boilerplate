<?php

/**
 * The file that contains the loader class 
 *
 * A class definition that registers all actions and filters with the
 * WordPress API.
 *
 * @since      1.0.0
 * @package    Polygon_Plugin
 */





/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @since      1.0.0
 */
class Polygon_Plugin_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array
	 */
	protected $actions;



	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array
	 */
	protected $filters;





	/**
	 * Initialize the hook containers.
	 *
	 * Initialize the containers used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->actions = array();
		$this->filters = array();
	}





	/**
	 * Add a new action.
	 *
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string    $hook             The name of the WordPress action that is being registered.
	 * @param    object    $component        A reference to the instance of the object on which the action is defined.
	 * @param    string    $callback         The name of the function definition on the $component.
	 * @param    int       $priority         Optional. The priority at which the function should be fired.
	 * @param    int       $accepted_args    Optional. The number of arguments that should be passed to the $callback.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}





	/**
	 * Add a new filter.
	 *
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string    $hook             The name of the WordPress filter that is being registered.
	 * @param    object    $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string    $callback         The name of the function definition on the $component.
	 * @param    int       $priority         Optional. The priority at which the function should be fired.
	 * @param    int       $accepted_args    Optional. The number of arguments that should be passed to the $callback.
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}





	/**
	 * Register all hooks into a single collection.
	 *
	 * A helper function that is used to register all actions and filters into a single
	 * collection.
	 *
	 * @since     1.0.0
	 * @access    private
	 * @param     array      $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param     string     $hook             The name of the WordPress filter that is being registered.
	 * @param     object     $component        A reference to the instance of the object on which the filter is defined.
	 * @param     string     $callback         The name of the function definition on the $component.
	 * @param     int        $priority         Optional. The priority at which the function should be fired.
	 * @param     int        $accepted_args    Optional. The number of arguments that should be passed to the $callback.
	 * @return    array                        The collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;
	}





	/**
	 * Register hooks
	 *
	 * Register all our filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
	}

}