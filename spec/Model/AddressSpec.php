<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Addressing\Model;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Addressing\Model\AddressInterface;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class AddressSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Addressing\Model\Address');
    }

    function it_implements_Sylius_address_interface()
    {
        $this->shouldImplement(AddressInterface::class);
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_first_name_by_default()
    {
        $this->getFirstName()->shouldReturn(null);
    }

    function its_first_name_is_mutable()
    {
        $this->setFirstName('John');
        $this->getFirstName()->shouldReturn('John');
    }

    function it_has_no_last_name_by_default()
    {
        $this->getLastName()->shouldReturn(null);
    }

    function its_last_name_is_mutable()
    {
        $this->setLastName('Doe');
        $this->getLastName()->shouldReturn('Doe');
    }

    function it_returns_correct_full_name()
    {
        $this->setFirstName('John');
        $this->setLastName('Doe');

        $this->getFullName()->shouldReturn('John Doe');
    }

    function it_has_no_phone_number_by_default()
    {
        $this->getPhoneNumber()->shouldReturn(null);
    }

    function its_phone_number_is_mutable()
    {
        $this->setPhoneNumber('+48555123456');
        $this->getPhoneNumber()->shouldReturn('+48555123456');
    }

    function it_has_no_country_by_default()
    {
        $this->getCountry()->shouldReturn(null);
    }

    function its_country_is_mutable()
    {
        $this->setCountry('IE');
        $this->getCountry()->shouldReturn('IE');
    }

    function it_allows_to_unset_the_country()
    {
        $this->setCountry('IE');
        $this->getCountry()->shouldReturn('IE');

        $this->setCountry(null);
        $this->getCountry()->shouldReturn(null);
    }

    function it_unsets_the_province_when_erasing_the_country()
    {
        $this->setCountry('IE');
        $this->setProvince('DU');

        $this->setCountry(null);

        $this->getCountry()->shouldReturn(null);
        $this->getProvince()->shouldReturn(null);
    }

    function it_has_no_province_by_default()
    {
        $this->getProvince()->shouldReturn(null);
    }

    function it_ignores_province_when_there_is_no_country()
    {
        $this->setCountry(null);
        $this->setProvince('DU');
        $this->getProvince()->shouldReturn(null);
    }

    function its_province_is_mutable()
    {
        $this->setCountry("IE");

        $this->setProvince('DU');
        $this->getProvince()->shouldReturn('DU');
    }

    function it_has_no_company_by_default()
    {
        $this->getCompany()->shouldReturn(null);
    }

    function its_company_is_mutable()
    {
        $this->setCompany('Foo Ltd.');
        $this->getCompany()->shouldReturn('Foo Ltd.');
    }

    function it_has_no_street_by_default()
    {
        $this->getStreet()->shouldReturn(null);
    }

    function its_street_is_mutable()
    {
        $this->setStreet('Foo Street 3/44');
        $this->getStreet()->shouldReturn('Foo Street 3/44');
    }

    function it_has_no_city_by_default()
    {
        $this->getCity()->shouldReturn(null);
    }

    function its_city_is_mutable()
    {
        $this->setCity('New York');
        $this->getCity()->shouldReturn('New York');
    }

    function it_has_no_postcode_by_default()
    {
        $this->getPostcode()->shouldReturn(null);
    }

    function its_postcode_is_mutable()
    {
        $this->setPostcode('24154');
        $this->getPostcode()->shouldReturn('24154');
    }

    function its_creation_time_is_initialized_by_default()
    {
        $this->getCreatedAt()->shouldHaveType(\DateTime::class);
    }

    function its_last_update_time_is_undefined_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }
}
