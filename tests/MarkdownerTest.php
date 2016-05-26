<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MarkdownerTest extends TestCase
{
	protected $markdown;
	
	public function setup()
	{
		$this->markdown = new \App\Services\Markdowner();
	}
	
	public function testSimpleParagraph()
	{
		$this->assertEquals ( "<p>test</p>\n", $this->markdown->toHTML ( 'test' ) );
	}
}
