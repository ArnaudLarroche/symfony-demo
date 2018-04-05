<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogPageTest extends WebTestCase
{
	/**
	  * The title should be in a h1 tag
	  */
	public function testTitle()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', '/en/blog/posts/lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit');
		
		$this->assertEquals('Lorem ipsum dolor sit amet consectetur adipiscing elit', $crawler->filter('h1')->text());
	}

	/**
	 * The list of comments should be present
	 */
	public function testListComments()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', '/en/blog/posts/lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit');
		
		$this->assertGreaterThan(
			0,
			$crawler->filter('.row .post-comment')->count()
		);
	}
}
