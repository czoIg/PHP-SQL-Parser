<?php

namespace PHPSQLParser\Test\Parser;
use PHPSQLParser\PHPSQLParser;
use PHPSQLParser\PHPSQLCreator;

class issue355Test extends \PHPUnit\Framework\TestCase
{
	public function testIssue322()
	{
        $sql = "
            CREATE TABLE `test_alias` (
              `a` INTEGER,
              `c` VARCHARACTER(10),
              `d` INT2,
              `e` INT3,
              `f` INT4,
              `g` INT8,
              `h` FLOAT4,
              `i` FLOAT8,
              `j` MIDDLEINT
            );
        ";
		$parser = new PHPSQLParser();
        $parser->parse($sql, true);
        // We expect to see 9 parsed columns
        $this->assertEquals(
            9,
            count($parser->parsed['TABLE']['create-def']['sub_tree'])
        );

    }
}

