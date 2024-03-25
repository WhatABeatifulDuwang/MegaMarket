<?php

class User {
    private $email_address;

    private $first_name;
    private $surname;
    private $password;
    private $country;
    private $postal_code;
    private $house_number;
    private $additional;
    private $phone_number;

    public function __construct($email_address, $first_name, $surname, $password, $country, $postal_code, $house_number, $additional, $phone_number) {
        $this->email_address = $email_address;
        $this->first_name = $first_name;
        $this->surname = $surname;
        $this->password = $password;
        $this->country = $country;
        $this->postal_code = $postal_code;
        $this->house_number = $house_number;
        $this->additional = $additional;
        $this->phone_number = $phone_number;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getPostalCode() {
        return $this->postal_code;
    }

    public function getHouseNumber() {
        return $this->house_number;
    }

    public function getAdditional() {
        return $this->additional;
    }

    public function getPhoneNumber() {
        return $this->phone_number;
    }

    public function getEmailAddress()
    {
        return $this->email_address;
    }

    public function getPassword()
    {
        return $this->password;
    }
}