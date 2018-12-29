<?php

namespace Tests;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
     use CreatesApplication , DatabaseMigrations, DatabaseTransactions;


    /**
     * Set up the test
     */
    public function setUp()
    {
        parent::setUp();
        $this->createApplication();
        $this->artisanMigrateRefresh();
    }

    /**
     * Reset the migrations
     */
    public function tearDown()
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }

     public function artisanMigrateRefresh()
    {
        $this->artisan('migrate:refresh');
    }

    public function artisanMigrateReset()
    {
       $this->artisan('migrate:reset');
    }
}
