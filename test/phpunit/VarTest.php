<?php

class CalcVarTest extends phpunit_bootstrap {
	public function testVarInOperation() {
		$lessCode = "selector {\n  some-property: calc(var(--a) * 2);\n}\n";

		$parser = new Less_Parser();
		$parser->parse( $lessCode );
		$css = $parser->getCss();

		// Code contains no LESS-specific behavior so it should be left as-is.
		// In particular, the math in the calc expression should not be parsed
		// as LESS math.
		$this->assertEquals(
			$lessCode,
			$css,
		);
	}
}
