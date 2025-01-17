<?php declare(strict_types = 1);

namespace PHPStan\Rules\Exceptions;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<CatchWithUnthrownExceptionRule>
 */
class CatchWithUnthrownExceptionRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new CatchWithUnthrownExceptionRule();
	}

	public function testRule(): void
	{
		$this->analyse([__DIR__ . '/data/unthrown-exception.php'], [
			[
				'Dead catch - Throwable is never thrown in the try block.',
				12,
			],
			[
				'Dead catch - Exception is never thrown in the try block.',
				21,
			],
			[
				'Dead catch - Exception is never thrown in the try block.',
				38,
			],
			[
				'Dead catch - RuntimeException is never thrown in the try block.',
				49,
			],
			[
				'Dead catch - Throwable is never thrown in the try block.',
				71,
			],
			[
				'Dead catch - InvalidArgumentException is never thrown in the try block.',
				84,
			],
			[
				'Dead catch - DomainException is never thrown in the try block.',
				117,
			],
			[
				'Dead catch - Throwable is never thrown in the try block.',
				119,
			],
		]);
	}

}
