<?php

/**
 * Toolset potential associations query arguments controller.
 *
 * @since m2m
 * TODO create a properly namespaced alias for this
 */
class Toolset_Potential_Association_Query_Arguments {


	/** @var Toolset_Potential_Association_Query_Filter_Interface[] */
	private $filters = array();


	/** @var array */
	private $query_arguments = array();


	/**
	 * Register a filter to modify the query arguments.
	 *
	 * @since m2m
	 *
	 * @param Toolset_Potential_Association_Query_Filter_Interface $filter
	 * @return $this
	 */
	public function addFilter( Toolset_Potential_Association_Query_Filter_Interface $filter ) {
		$this->filters[] = $filter;

		return $this;
	}


	/**
	 * Apply the filters to the query arguments.
	 *
	 * @since m2m
	 */
	public function get() {
		$this->query_arguments = array();

		foreach ( $this->filters as $filter ) {
			$this->query_arguments = $filter->filter( $this->query_arguments );
		}

		return $this->query_arguments;
	}

}
