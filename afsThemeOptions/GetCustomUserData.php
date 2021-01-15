<?php


class GetCustomUserData
{
	public $data;

	public function __construct( array $arr )
	{
		$this->data = $arr;
	}

	/**
	 * @return array
	 */
	public function get_data(): array
	{
		return $this->data;
	}

	public function get_first_name()
	{
		return $this->get_data()['user_first_name'];
	}

	public function get_last_name()
	{
		return $this->get_data()['user_last_name'];
	}

	public function get_nick_name()
	{
		return $this->get_data()['user_nick_name'];
	}

	public function get_phone()
	{
		return $this->get_data()['user_phone'];
	}

	public function get_email()
	{
		return $this->get_data()['user_email'];
	}

	public function get_logo_id()
	{
		return $this->get_data()['user_logo']['attachment_id'];
	}

	public function get_logo_url()
	{
		return $this->get_data()['user_logo']['url'];
	}

}