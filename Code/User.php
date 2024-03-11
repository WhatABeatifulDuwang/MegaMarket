<?php

class User {
    private $id;
    private $first_name;
    private $surname;
    private $email_address;
    private $country;
    private $postal_code;
    private $house_number;
    private $additional;
    private $phone_number;

    public function __construct($id, $first_name, $surname, $email_address, $country, $postal_code, $house_number, $additional, $phone_number) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->surname = $surname;
        $this->email_address = $email_address;
        $this->country = $country;
        $this->postal_code = $postal_code;
        $this->house_number = $house_number;
        $this->additional = $additional;
        $this->phone_number = $phone_number;
    }

    public function getId() {
        return $this->id;
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
}