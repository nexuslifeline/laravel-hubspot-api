Modified Fungku\HubSpot to support Laravel 5.5+
=============================================================


HubSpot API package for [Laravel 5.5+](http://laravel.com/)

Most of the hard-working code is modified classes from [HubSpot/haPiHP](https://github.com/HubSpot/haPiHP).
This is a modified version of Fungku\HubSpot(https://packagist.org/packages/fungku/hubspot-php) to support Laravel version 5.5+.

## Setup

1.) clone the repository to your project vendor folder

2.) then run 

```
php artisan vendor:publish --provider="Fungku\HubSpot\HubSpotServiceProvider"
```

3.) Open `app/config/app.php` and add this to the providers array:

```
Fungku\HubSpot\HubSpotServiceProvider::class,
```

and on the Class Aliases add this
```
'HubSpot' => Fungku\HubSpot\Facades\HubSpot::class,   
```

TO SET YOUR API KEY:
Open your environment variables file(.env) and add this 
```
HUBSPOT_KEY=YOUR_API_KEY_HERE
HUBSPOT_USER_AGENT=USER_AGENT_HERE
```


## Examples

### Contacts:

```php
$contacts = HubSpot::contacts();

// Get 100 contacts
$contacts->get_all_contacts(array('count'=>100));

// Get a contact by email address
$contacts->get_contact_by_email('example@somedomain.com');
```

### Lists

```php
$lists = HubSpot::lists();

// Get 20 lists
$lists->get_lists(array('count'=>20));
```
