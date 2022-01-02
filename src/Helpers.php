<?php

namespace Ignite;

class Helpers
{
	/**
	 * Quick way to get nested object values from a dot-notated string.
	 *
	 * Calling this method like this: `objGetNested($obj, 'one.two')`
	 * is equivalent to: `$obj->one->two`
	 *
	 * TODO: Look if there is anything in laravel/php that does this.
	 */
	static public function objGetNested(object $obj, string $key)
	{
		return self::_get_nested($obj, explode('.', $key));
	}

	static protected function _get_nested($obj, array $keys)
	{
		if (count($keys) < 1) {
			return $obj;
		}

		$obj = $obj->{array_shift($keys)};
		return self::_get_nested($obj, $keys);
	}
}
