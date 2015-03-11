# Models

This is where your ORM models should go.

Example:

``` php
# File: src/models/Captain.php

namespace werx\Skeleton\Models;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
	public $timestamps = false;
}
```

To be automatically wired up, the name of the model file (and the class it contains) should be the Uppercase singular of the table name.

If your table is named "captains", your model file would be `Captain.php`, and the class name would be `Captain`. If you have an existing
table that doesn't conform to this convention, simplly add a `table` property to your model with the correct table name.

``` php
protected $table = 'my_captains';
```
