<?php

namespace WP_CLI_Command;

use WP_CLI;
use WP_CLI_Utils\Target;

class SSH {

	/**
	 * Use WP CLI aliases to open an SSH connection.
	 *
	 * ## OPTIONS
	 *
	 * <target>
	 * : WP CLI alias name.
	 *
	 * ## EXAMPLES
	 *
	 *     $ wp ssh @staging
	 */
	public function __invoke( array $args ) : void {
		list ( $name ) = $args;

		$target = Target::get( $name );

		passthru( $target->get_ssh_cmd() );
	}
}

WP_CLI::add_command( 'ssh', SSH::class );
