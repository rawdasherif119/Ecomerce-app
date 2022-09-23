
## About E-commerce

**Setup**

After Installing, take a copy for .env.example to .env and fill out the system database connection

1 -
```sh
composer install
```

2-
```sh
php artisan migrate
```

3-
```sh
php artisan key:generate
```

4-
```sh
php artisan passport:install
```


7- To have a dummy data, run the seeders:
```sh
php artisan db:seed
```


9- Register User and login api are found in the postman collection 
Or you can use this user directly without register (olso exist as example in collection)

Marchant :
```sh
email:MerchantTest@gmail.com 
```
```sh
password:12345678:
```

User :
```sh
email:UserTest@gmail.com 
```
```sh
password:12345678:
```



10- Postman Collection: [Postman Collection](https://documenter.getpostman.com/view/6589767/2s7ZT9Q4GG).
***


**Example**

When You try to login with userTest (which provided in seeder) he buy 4 
 2 from store 1 which (VAT calculated from the product price)
   VAT Percantage -> 20
   Shipping cost  -> 30

   product1=10000
   product2=20000

 2 from store 2 which (VAT is included in the product price)
   Shipping cost  -> 50

   product3=5000
   product4=1000

 if you use api to get total in cart
 All prices with vat   + all Shipping cost
 ((10000 + 10000*0.2) + (20000 + 20000*0.2) + 5000 + 1000) + (30+50) = 42080
 
```sh
 Api Url : (GET)   {{url}}/api/users/products  
```

 if you use api to get total in cart in each store
 All prices with vat   + all Shipping cost
 (10000 + 10000*0.2) + (20000 + 20000*0.2) + 30 = 36030
 
 ```sh
 Api Url : (GET)   {{url}}/api/users/products/{store} 
        inOurCase ->  {{url}}/api/users/products/1
```
 