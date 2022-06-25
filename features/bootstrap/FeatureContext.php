<?php

use App\Models\Role;
use App\Models\User;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreatesApplication;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    use CreatesApplication, WithFaker;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        putenv('APP_ENV=testing');
        parent::__construct();
        $this->setUp();
        $this->withExceptionHandling();
        $this->parcel = $this->newParcelPayload();
    }


    /**
     * @Given I am a normaluser
     */
    public function iAmANormaluser()
    {
        $this->actingUser = User::normaluser()->first();
    }

    /** @BeforeScenario */
    public function before()
    {
        $this->artisan('migrate:fresh --seed');
    }

    /**
     * @Given there is a courier with name :couriername
     */
    public function thereIsACourierWithName($couriername)
    {
        //courier3
        $this->actingCourier = User::create([
            'username' => $couriername,
            'first_name' => $couriername,
            'last_name' => '',
            'email' => $couriername . '@isp.com',
            'password' => bcrypt('courier123'),
            'gender' => '1',
            'phone' => '0123456789',
        ])
            ->role()->associate(Role::ROLE_COURIER)
            ->save();

        $this->assertDatabaseHas('users', [
            'username' => $couriername
        ]);
    }

    /**
     * @When I browse to the homepage
     */
    public function iBrowseToTheHomepage()
    {
        $this->response = $this->actingAs($this->actingUser)
            ->get(route('normal_user.home'));
    }

    /**
     * @Then I should see a courier named :couriername
     */
    public function iShouldSeeACourierNamed($couriername)
    {
        $this->response->assertSee($couriername);
    }

    /**
     * @Given I submit the form with all the detail
     */
    public function iSubmitTheFormWithAllTheDetail()
    {
        $this->response = $this->actingAs($this->actingUser)
            ->post(route('normal_user.save_parcel'), $this->parcel);
    }

    /**
     * @Then I should see a parcel with detail I wrote
     */
    public function iShouldSeeAParcelWithDetailIWrote()
    {
        $this->assertDatabaseHas('parcels', $this->parcel);
    }

    private function newParcelPayload()
    {
        return [
            'sender_address' => $this->faker->address(),
            "sender_postcode" => $this->faker->postcode(),
            "recipient_firstname" => $this->faker->firstName(),
            "recipient_lastname" => $this->faker->lastName(),
            "recipient_address" => $this->faker->address(),
            "recipient_postcode" => $this->faker->postcode(),
            "recipient_phone" => $this->faker->phoneNumber(),
            "weight" => $this->faker->randomNumber(2),
            "courier_id" => User::courier()->first()->id,
        ];
    }
}
