<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given there is a courier (n) :arg1
     */
    public function thereIsAWhichCostsPs($arg1)
    {
        
    }

    /**
     * @Given I am a normaluser
     */
    public function iAmANormaluser()
    {
        throw new PendingException();
    }

    /**
     * @Given there is a courier with name :arg1
     */
    public function thereIsACourierWithName($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I browse to the homepage
     */
    public function iBrowseToTheHomepage()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see a courier named :arg1
     */
    public function iShouldSeeACourierNamed($arg1)
    {
        throw new PendingException();
    }
}
