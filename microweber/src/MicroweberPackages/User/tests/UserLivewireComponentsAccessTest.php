<?php

namespace MicroweberPackages\User\tests;

use Livewire\Livewire;
use MicroweberPackages\Core\tests\TestCase;
use MicroweberPackages\User\Http\Livewire\Admin\CreateProfileInformationForm;
use MicroweberPackages\User\Http\Livewire\Admin\DeleteUserForm;
use MicroweberPackages\User\Http\Livewire\Admin\LogoutOtherBrowserSessionsForm;
use MicroweberPackages\User\Http\Livewire\Admin\TwoFactorAuthenticationForm;
use MicroweberPackages\User\Http\Livewire\Admin\UpdatePasswordForm;
use MicroweberPackages\User\Http\Livewire\Admin\UpdatePasswordWithoutConfirmFormModal;
use MicroweberPackages\User\Http\Livewire\Admin\UpdateProfileInformationForm;
use MicroweberPackages\User\Http\Livewire\Admin\UpdateStatusAndRoleForm;
use MicroweberPackages\User\Http\Livewire\Admin\UserLoginAttemptsModal;
use MicroweberPackages\User\Http\Livewire\Admin\UsersList;
use MicroweberPackages\User\Http\Livewire\Admin\UserTosLogModal;


class UserLivewireComponentsAccessTest extends TestCase
{
    use UserTestHelperTrait;

    public $componentsList = [
        UsersList::class,
        UpdatePasswordForm::class,
        UpdatePasswordWithoutConfirmFormModal::class,
        TwoFactorAuthenticationForm::class,
        UpdateProfileInformationForm::class,
        UpdateStatusAndRoleForm::class,
        UserLoginAttemptsModal::class,
        UserTosLogModal::class,
        LogoutOtherBrowserSessionsForm::class,
        DeleteUserForm::class,
        CreateProfileInformationForm::class,
    ];

    public function testIfCanViewComponentAsAdmin()
    {

        $this->actingAsAdmin();

        foreach ($this->componentsList as $component) {
            Livewire::test($component)->assertOk();
        }

    }

    public function testIfCannotViewComponentAsUser()
    {
        $this->actingAsUser();
        foreach ($this->componentsList as $component) {
             Livewire::test($component)->assertUnauthorized();
        }
     }
}
