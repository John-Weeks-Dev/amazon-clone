# Amazon Clone (amazon-clone)

### Tutorial series on how to build this

If you'd like a step by step guide on how to build this just **CLICK THE IMAGE BELOW**

[![GO TO JOHN WEEKS DEV TUTORIAL VIDEOS](https://user-images.githubusercontent.com/108229029/220291890-aef4e3e0-2b9b-43a3-ad49-e06be9b63915.jpeg)](https://www.youtube.com/watch?v=SAUKvG6ILSs)

Come and check out my YOUTUBE channel for lots more tutorials -> https://www.youtube.com/@johnweeksdev

**LIKE**, **SUBSCRIBE**, and **SMASH THE NOTIFICATION BELL**!!!

## App Setup

```
git clone https://github.com/John-Weeks-Dev/amazon-clone.git

composer install 

cp .env.example .env 

php artisan cache:clear 

composer dump-autoload 

php artisan key:generate

composer require laravel/breeze --dev

php artisan breeze:install vue --inertia

php artisan serve
```

Create the DB
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=amazon_clone
DB_USERNAME=root
DB_PASSWORD=
```
Now migrate your DB
```
php artisan migrate

php artisan db:seed
```

Now go to https://stripe.com/en-gb-us

Create a public and private KEY.

Add your new PRIVATE API KEY to **CheckoutController.php**

![Screenshot 2022-12-19 at 14 33 10](https://user-images.githubusercontent.com/108229029/211271467-926303ac-9e21-4557-bd2e-df781697283f.png)

And **Checkout**

![Screenshot 2022-12-19 at 14 33 32](https://user-images.githubusercontent.com/108229029/211272867-c81d401f-9e37-44e3-bc82-df8407b30247.png)

Connect Mailtrap

Add the details to **.env**

Now run this command to start the project 
```
npm i

npm run dev
```

You should be good to go!

# Application Images
![Screenshot 2023-01-08 at 22 13 46](https://user-images.githubusercontent.com/108229029/211273079-e792667b-a16f-4ea3-a726-4be3fbe133cc.png)
![Screenshot 2023-01-08 at 22 14 08](https://user-images.githubusercontent.com/108229029/211274170-a74fe46b-5fe3-4654-b675-22f9d7579e38.png)
![Screenshot 2023-01-08 at 22 14 24](https://user-images.githubusercontent.com/108229029/211274612-83fe1ccc-12c9-4934-a411-8ba6c5a66eeb.png)
![Screenshot 2023-01-08 at 22 14 51](https://user-images.githubusercontent.com/108229029/211274617-ae2d3138-f116-494f-b625-18f9e27d5bd8.png)
![Screenshot 2023-01-08 at 22 15 42](https://user-images.githubusercontent.com/108229029/211274628-0bd1e5f9-7fbb-41f9-86bf-4860e723a7e4.png)
![Screenshot 2023-01-08 at 22 16 01](https://user-images.githubusercontent.com/108229029/211274638-9d3461a8-617d-4797-868d-c1ed285c57d7.png)
![Screenshot 2023-01-08 at 22 16 41](https://user-images.githubusercontent.com/108229029/211274648-9d55d0a7-ef43-49fb-b332-8b43ed6f0334.png)
![Screenshot 2023-01-08 at 22 16 54](https://user-images.githubusercontent.com/108229029/211274652-1da2b0c5-8033-4f40-95d8-ecbbb7925305.png)
![Screenshot 2023-01-08 at 22 17 13](https://user-images.githubusercontent.com/108229029/211274658-c1a46bde-f438-4467-848b-50bfbd607ca0.png)
![Screenshot 2023-01-08 at 22 17 21](https://user-images.githubusercontent.com/108229029/211274662-665e1c76-a5fa-4e13-9bbc-6de831a712bd.png)
![Screenshot 2023-01-08 at 22 18 07](https://user-images.githubusercontent.com/108229029/211274663-4fe0ebd2-d553-47db-bdca-e8ca5974f7b0.png)
![Screenshot 2023-01-08 at 22 18 36](https://user-images.githubusercontent.com/108229029/211274673-736a05f2-c236-4e02-8840-8eccfaa80658.png)
![Screenshot 2023-01-08 at 22 19 45](https://user-images.githubusercontent.com/108229029/211274684-2f2c1af1-17ca-465f-892a-e5f1f24e2284.png)
![Screenshot 2023-01-08 at 22 20 53](https://user-images.githubusercontent.com/108229029/211274691-cd998330-ed21-4da8-a53f-6cf3dca8c38e.png)

