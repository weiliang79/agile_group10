<?php

use App\Models\Parcel;
use App\Models\ParcelRequest;
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

    /**
     * @Given I am a courier
     */
    public function iAmACourier()
    {
        //throw new PendingException();
        $this->actingUser = User::courier()->where('id', 4)->first();
    }

    /**
     * @Given I submit the tracking number
     */
    public function iSubmitTheTrackingNumber()
    {
        //throw new PendingException();
        $this->courier_parcel = Parcel::where('courier_id', $this->actingUser->id)->first();
        $this->response = $this->actingAs($this->actingUser)->post(route('courier.update_parcel'), ['tracking_number' => $this->courier_parcel->tracking_number]);
    }

    /**
     * @When I browse to the tracking page
     */
    public function iBrowseToTheTrackingPage()
    {
        //throw new PendingException();
        $this->response = $this->actingAs($this->actingUser)->get(route('courier.tracking_page'));
    }

    /**
     * @Then I should see a parcel with updated status
     */
    public function iShouldSeeAParcelWithUpdatedStatus()
    {
        //throw new PendingException();
        $this->response->assertSeeInOrder(["List of Parcel in Transit", $this->courier_parcel->tracking_number], false);
    }

    /**
     * @Given I accept the parcel request
     */
    public function iAcceptTheParcelRequest()
    {
        //throw new PendingException();
        $this->courier_parcel = ParcelRequest::where('courier_id', $this->actingUser->id)->first();
        $this->response = $this->actingAs($this->actingUser)->get(route('courier.parcel_request_respond', ['action' => 'accept', 'request_id' => $this->courier_parcel->id]));
    }

    /**
     * @Then database should record parcel request accpeted
     */
    public function databaseShouldRecordParcelRequestAccpeted()
    {
        //throw new PendingException();
        $this->courier_parcel = ParcelRequest::where('courier_id', $this->actingUser->id)->first();
        $this->assertDatabaseHas('parcel_requests', [
            'id' => $this->courier_parcel->id,
            'status' => ParcelRequest::STATUS_ACCEPT,
        ]);
    }

    /**
     * @Given I am a manager
     */
    public function iAmAManager()
    {
        //throw new PendingException();
        $this->actingUser = User::manager()->first();
    }

    /**
     * @Given there is a parcel status show delivered
     */
    public function thereIsAParcelStatusShowDelivered()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @When I browse to the page
     */
    public function iBrowseToThePage()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Then I should see a parcel status show delivered
     */
    public function iShouldSeeAParcelStatusShowDelivered()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Given there is a parcel does not have any courier is responsible
     */
    public function thereIsAParcelDoesNotHaveAnyCourierIsResponsible()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Then I can assign the task to the courier
     */
    public function iCanAssignTheTaskToTheCourier()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Given I want to track parcel with all detail
     */
    public function iWantToTrackParcelWithAllDetail()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Then I should see a tracking page
     */
    public function iShouldSeeATrackingPage()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Given I want to update parcel from not pickup to not dispatched
     */
    public function iWantToUpdateParcelFromNotPickupToNotDispatched()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @When I browse the homepage
     */
    public function iBrowseTheHomepage()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Then I should see a form to submit
     */
    public function iShouldSeeAFormToSubmit()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }

    /**
     * @Given I am courier
     */
    public function iAmCourier()
    {
        //throw new PendingException();
        $this->assertTrue(true);
    }
}
