<?php
namespace Model;


class StoresModel implements \JsonSerializable
{
   /*1.0 Class Attributes*/
   private $id;
   private $storename;
   private $siret;
   private $address;
   private $zipcode;
   private $city;
   private $lat;
   private $lng;
   private $phone;
   private $email;
   private $website;
   private $genre;


    /*2.0 Class setters*/
    public function setId($id)
    {
        if ($id > 0)
        {
          $this->id=$id;
        }
    }

    public function setStorename($storename)
    {
        if (is_string($storename))
        {
          $this->storename=$storename;
        }
    }

    public function setSiret($siret)
    {
        if (is_string($siret))
        {
          $this->siret=$siret;
        }
    }

    public function setAddress($address)
    {
        if (is_string($address))
        {
          $this->address=$address;
        }
    }

    public function setZipcode($zipcode)
    {
        if ($zipcode > 0)
        {
          $this->zipcode=$zipcode;
        }
    }

    public function setCity($city)
    {
        if (is_string($city))
        {
          $this->city=$city;
        }
    }

    public function setLatitude($lat)
    {
        if (is_string($lat))
        {
          $this->lat=$lat;
        }
    }

    public function setLongitude($lng)
    {
        if (is_string($lng))
        {
          $this->lng=$lng;
        }
    }

    public function setPhone($phone)
    {
        if (is_string($phone))
        {
          $this->phone=$phone;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email))
        {
          $this->email=$email;
        }
    }

    public function setWebsite($website)
    {
        if (is_string($website))
        {
          $this->website=$website;
        }
    }

    public function setGenre($genre)
    {
       if (is_string($genre))
        {
          $this->genre=$genre;
        }
    }


    /*3.0 Getters*/
    public function getId()
    {
        return $this->id;
    }

    public function getStorename()
    {
        return $this->storename;
    }

    public function getSiret()
    {
        return $this->siret;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getLatitude()
    {
        return $this->lat;
    }

    public function getLongitude()
    {
        return $this->lng;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getWebsite()
    {
        return $this->website;    
    }

    public function getGenre()
    {
        return $this->genre;
    }

    /*4.0 Json serializable method*/
    public function jsonSerialize() {
        return [
            'id'=> $this->getId(),
            'storename'=> $this->getStorename(),
            'siret'=> $this->getSiret(),
            'address'=> $this->getAddress(),
            'zipcode'=> $this->getZipcode(),
            'city'=> $this->getCity(),
            'position'=>['lat'=>$this->getLatitude(),'lng'=>$this->getLongitude()],
            'lat'=>$this->getLatitude(),
            'lng'=>$this->getLongitude(),
            'phone'=> $this->getPhone(),
            'email'=> $this->getEmail(),
            'website'=>$this->getWebsite(),
            'genre'=> $this->getGenre()];
    }

}
