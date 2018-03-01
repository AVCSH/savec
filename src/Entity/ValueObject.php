<?php declare(strict_types = 1);

namespace App\Entity;


interface ValueObject
{
	/**
	 * @param ValueObject $rhs
	 *
	 * @return int as with <=>
	 *
	 * return $rhs instanceof self ?
	 *        IMPLEMENT_THIS :
	 *        get_class($this) <=> get_class($other);
	 */
	public function compare(self $rhs): int;
}
