# Documentation officielle              

### Static GET
In the URL -> http://localhost/ 
The output -> Index
``` php
Route::get('/', 'views/index.php');
```

### Dynamic GET. Example with 1 variable
The $id will be available in user.php
``` php
Route::get('/user/$id', 'views/user'); 
```

### Dynamic GET. Example with 2 variables
The $name will be available in full_name.php
The $last_name will be available in full_name.php
In the browser point to: localhost/user/X/Y
``` php
Route::get('/user/$name/$last_name', 'views/full_name.php'); 
```

### Dynamic GET. Example with 2 variables with static
In the URL -> http://localhost/product/shoes/color/blue
The $type will be available in product.php
The $color will be available in product.php
``` php
Route::get('/product/$type/color/$color', 'product.php'); 
```

### A route with a callback
``` php
Route::get('/callback', function(){
    echo 'Callback executed';
});
```

### A route with a callback passing a variable
To run this route, in the browser type:
http://localhost/user/A
``` php
Route::get('/callback/$name', function($name){
    echo "Callback executed. The name is $name";
});
```

### Route where the query string happends right after a forward slash
``` php 
Route::get('/product', '');
```

# A route with a callback passing 2 variables
To run this route, in the browser type:
http://localhost/callback/A/B
``` php 
Route::get('/callback/$name/$last_name', function($name, $last_name){
    echo "Callback executed. The full name is $name $last_name";
});
```

### Route that will use POST data
``` php 
Route::post('/user', '/api/save_user');
```



### **any can be used for GETs or POSTs**

For GET or POST
The 404.php which is inside the views folder will be called
The 404.php has access to $_GET and $_POST
``` php 
Route::any('/404','views/404.php');
```