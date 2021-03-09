<?php


namespace AFS;


class Crone
{
	public function __construct()
	{
		add_action( 'after_switch_theme', [ $this, 'afs_deleteAdds' ] );
		add_action( 'afs_deleteAdds', [ $this, 'doDeleteAdds' ] );
		add_action( 'switch_theme', [ $this, 'deleteCrone' ] );
	}

	// добавляет новую крон задачу
	public function afs_deleteAdds()
	{
		if ( ! wp_next_scheduled( 'afs_deleteAdds' ) )
		{
			wp_schedule_event( time(), 'hourly', 'afs_deleteAdds' );
		}

	}

	// добавляем функцию к указанному хуку
	public function doDeleteAdds()
	{
		$args = [
			'post_type'  => ['goods', 'transports'],
			'posts_per_page' => -1,
			'date_query' => array(
				'after' => '1 weeks ago',
			),
		];

		$wp_query = new \WP_Query( $args );


		while ( $wp_query->have_posts() ): $wp_query->the_post();
		wp_delete_post($wp_query->post->ID);
		endwhile;

	}

	public function deleteCrone(  )
	{
		wp_unschedule_hook( 'afs_deleteAdds' );
	}

}