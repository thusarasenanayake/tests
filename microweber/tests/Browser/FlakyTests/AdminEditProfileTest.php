<?php

namespace Tests\Browser\FlakyTests;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;
use Tests\Browser\Components\AdminLogin;
use Tests\Browser\Components\ChekForJavascriptErrors;
use Tests\DuskTestCase;


class AdminEditProfileTest extends DuskTestCase
{

    public function testEditProfile()
    {

        $this->browse(function (Browser $browser) {

            $browser->within(new AdminLogin, function ($browser) {
                $browser->fillForm();
            });

            $browser->visit($this->siteUrl.'admin');

            $browser->clickLink('Users');

            $browser->within(new ChekForJavascriptErrors(), function ($browser) {
                $browser->validate();
            });

            $browser->pause(2000);
            $browser->waitForText('Edit profile');
            $browser->clickLink('Edit profile');

            $browser->within(new ChekForJavascriptErrors(), function ($browser) {
                $browser->validate();
            });

            $browser->pause(3000);
            // $browser->waitForText('First Name', 30);
            //  $browser->pause(3000);
            //.. $browser->scrollTo('#advanced-settings');

            $phone = rand(10000, 9999999);
            $email = 'visualtest+' . $phone . '@microweber.com';
            $first_name = 'Visual' . uniqid();
            $last_name = 'Test' . uniqid();


            $browser->typeSlowly('first_name', $first_name);
            $browser->typeSlowly('last_name', $last_name);

            $browser->typeSlowly('email', $email);
            $browser->typeSlowly('phone', $phone);

            $browser->pause(300);


            $browser->click('#user-save-button');

            $browser->waitForText('Saved',10);

            $browser->pause(3000);

            $browser->clickLink('Users');
            $browser->waitForText('Manage Users');
            $findUser = User::where('email', $email)->first();

            $this->assertEquals($first_name, $findUser->first_name);
            $this->assertEquals($last_name, $findUser->last_name);
            $this->assertEquals($phone, $findUser->phone);

        });
    }

    public function testEditProfileOnlyPhoneChange()
    {

        $this->browse(function (Browser $browser) {

            $browser->within(new AdminLogin, function ($browser) {
                $browser->fillForm();
            });
            $user = \MicroweberPackages\User\Models\User::where('username', 1)->first();
            Auth::login($user);
            $browser->visit($this->siteUrl.'admin');

            $browser->clickLink('Users');

            $browser->within(new ChekForJavascriptErrors(), function ($browser) {
                $browser->validate();
            });

            $browser->pause(2000);
            $browser->waitForText('Edit profile');
            $browser->clickLink('Edit profile');

            $browser->within(new ChekForJavascriptErrors(), function ($browser) {
                $browser->validate();
            });
            $userId = user_id();

            $browser->pause(3000);

            $phone = '+0000' . rand(9999999, 999999999);

            $browser->typeSlowly('phone', $phone);

            $browser->pause(300);
            $browser->press('Save');
            $browser->waitForText('Saved',10);
            $browser->pause(3000);

            $browser->clickLink('Users');
            $browser->waitForText('Manage Users');

            $findUser = User::where('id', $userId)->first();
            $this->assertEquals($phone, $findUser->phone);

        });
    }

    public function testAddNewAdminProfile()
    {
        $this->browse(function (Browser $browser) {


            $browser->within(new AdminLogin, function ($browser) {
                $browser->fillForm();
            });


            $browser->waitForText('Users');
            $browser->clickLink('Users');

            $browser->within(new ChekForJavascriptErrors(), function ($browser) {
                $browser->validate();
            });

            $browser->pause(2000);
            $browser->waitForText('Add new user');
            $browser->clickLink('Add new user');

            $browser->within(new ChekForJavascriptErrors(), function ($browser) {
                $browser->validate();
            });

            $browser->pause(3000);
            $browser->waitForText('Please fill the form below to create a new user.');
            $browser->pause(3000);

            $faker = Factory::create('en_US');

            $new_username = $faker->userName;
            $new_email = $faker->email;
            $new_password = $faker->password;
            $first_name = $faker->firstName;
            $last_name = $faker->lastName;
            $phone = $faker->phoneNumber;


            $browser->typeSlowly('username', $new_username);
            $browser->typeSlowly('password', $new_password);
            $browser->typeSlowly('first_name', $first_name);
            $browser->typeSlowly('last_name', $last_name);
            $browser->typeSlowly('phone', $phone);
            $browser->typeSlowly('email', $new_email);
            $browser->select('is_admin', 1);
//
//            $browser->script("document.querySelector('label[for=\"is_active1\"]').scrollIntoView({block: 'start', inline: 'nearest',behavior :'auto'});");
//            $browser->pause(300);
//
//            $browser->click('label[for="is_active1"]');

            $browser->pause(100);

            $browser->script("document.querySelector('#user-save-button').scrollIntoView({block: 'start', inline: 'nearest',behavior :'auto'});");


            $browser->pause(1000);


            $browser->click('button[id="user-save-button"]');

            // $browser->click('#user-save-button');

            $browser->pause(3000);

            $findUser = User::where('email', $new_email)->first();

            $this->assertEquals($new_username, $findUser->username);
            $this->assertEquals($new_email, $findUser->email);
            $this->assertEquals($first_name, $findUser->first_name);
            $this->assertEquals($last_name, $findUser->last_name);
            $this->assertEquals($phone, $findUser->phone);
            $this->assertEquals('1', $findUser->is_active);
            $this->assertEquals('1', $findUser->is_admin);


        });
    }
}
