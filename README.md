# laravel-findby
Extended 'find' functionality for Eloquent (Laravel).

Enables writing queries like `$that_smith_guy = User::findByLastName('Smith')`, rather than the longer, but equivalent `$that_smith_guy = User::where('last_name', 'Smith')->first()`.

Also, `$all_the_bobs = User::findAllByFirstName('Bob')` rather than `$all_the_bobs = User::where('first_name', 'Bob')->get()`.

The command can be used for any arbitrary [snake-cased] field name. e.g. `Item::findByArbitraryFieldName('example')` is functionaliy equivalent to `Item::where('arbitrary_field_name', 'example')->first()`.

To use, simply add `use SomeoneFamous\FindBy\FindBy;` to any Eloquent model.

```
<?php

namespace App;

use SomeoneFamous\FindBy\FindBy;

class Thing extends Model
{
    use FindBy;

...
```
