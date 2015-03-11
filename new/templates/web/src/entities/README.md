# Entities

Use this directory to store POPO (Plain Old PHP Object) classes.

A POPO is a simple class that can be used to encapsulate the properties of some _thing_.

``` php
namespace My\App\Entities;

class Address
{
	public $street;
	public $apartment;
	public $city;
	public $state;
	public $zip;
}
```


``` php
$address = new \My\App\Entities\Address()
```