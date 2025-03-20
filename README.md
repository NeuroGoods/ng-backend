# Welcome to NeuroGoods  
🧠 Where every mind shines its own light!💡

![logoNeuroGoods](https://github.com/user-attachments/assets/c9dc3a62-7e83-41c0-b5ef-c724e0fbc63d)

NeuroGoods is an inclusive marketplace specialising in products designed for neurodivergent people. The platform aims to improve the well-being, comfort and quality of life of those who perceive and experience the world in a unique way. Here you will find a variety of items tailored to sensory, cognitive and organisational needs.

Our mission is to facilitate access to solutions that promote autonomy, emotional regulation and personal development for the neurodivergent community.


## 🔎📝 Installation Requirements

In order to run this project locally, you need:

1. XAMPP (or any other local server that supports PHP and MySQL)

2. VSC

3. Composer

4. Node.js (install npm)

5. xdebug (for tests coverage)

6. Postman (or any other platform to use for API) 


## 🔧⚙️ Installation

1. Install project with git clone

```bash
  git clone https://github.com/NeuroGoods/ng-backend.git
``` 

2. Install composer:

```
composer install
``` 

3. Install NPM:

```
npm install
``` 

4. Create an ".env" by taking the example ".env.example" file and modify:

- DB_CONNECTION=mysql
- DB_DATABASE=neurogoods

>[!IMPORTANT]
>You can create the database name as you wish, just remember to include that name in the ‘database’ in the ‘.env’ file and uncomment the paragraph.

5. Create a database in MySQL
- In the database manager “phpMyAdmin” of MySQL create only the database without tables.
- Generate the tables from the terminal and then run migrate to upload the changes to the database.

6. Migrate the tables:

```
php artisan migrate:fresh --seed
```

7. Run Locally:
-   Run Laravel in one terminal.
```
php artisan serve
```

## 🏃‍♂️🧪 Running Tests

To run the project tests, use the following command:

```
    php artisan test --coverage
```

- This project has a **82.4%** of test coverage.

![testing](https://github.com/user-attachments/assets/6e9be69d-d9cd-42ed-b0b5-b5365d1cf282)


You can also see the coverage in a web browser using:

```
  php artisan test --coverage-html=coverage-report
``` 


## 📊📁 Diagrams made (BBDD)

Below is a diagram of the database, showing different relationships between tables:

![diagramaBBDD](https://github.com/user-attachments/assets/9e5c006f-ca30-4ba7-a533-636a27d5526e)

- **Products:** Many to many relationship.
- **Category** One to many relationship. Several products can have one category.
- **Order:** Many to many relationship.
- **Review:** One to many relationship. Several  can perform a review.
- **User:** One to many. A user can have several orders.
- **Order_items:** Many to many. One order can receive several products and one product can go for several orders as long as it is available.

## 📡🌐 API Endpoints
We have 5 tables: Products, Category, Order User and  Review, you can create, edit, delete or read from Postman.

### 🔸 Api Products 

**GET**     (read all products): 
```
http://127.0.0.1:8000/api/products
```
**GET**     (read one products): 
```
http://127.0.0.1:8000/api/products/{id}
```
**POST**    (create a new products): 
```
http://127.0.0.1:8000/api/products
```
**PUT**     (edit one products): 
```
http://127.0.0.1:8000/api/products/{id}
```
**DELETE**  (delete an products): 
```
http://127.0.0.1:8000/api/products/{id}
```

### 🔸 Api Category 

**GET** (read all category):
```
http://127.0.0.1:8000/api/categories 
```
**GET** (read one category):
```
http://127.0.0.1:8000/api/categories/{id}
```
**POST** (create a new category):
```
http://127.0.0.1:8000/api/categories
```
**PUT** (edit one category):
```
http://127.0.0.1:8000/api/categories{id}
```
**DELETE** (delete a category):
```
http://127.0.0.1:8000/api/categories/{id}
```

### 🔸 Api Order 

**GET**     (read all order): 
```
http://127.0.0.1:8000/api/order
```
**GET**     (read one order): 
```
http://127.0.0.1:8000/api/order/{id}
```
**POST**    (create a new order): 
```
http://127.0.0.1:8000/api/order
```
**PUT**     (edit one order): 
```
http://127.0.0.1:8000/api/order/{id}
```
**DELETE**  (delete an order): 
```
http://127.0.0.1:8000/api/order/{id}
```

**POST**    (Order an product)
```
http://127.0.0.1:8000/api/users/{id}/order/{id}
```

### 🔸 Api Review 

**GET**     (read all review): 
```
http://127.0.0.1:8000/api/review
```
**GET**     (read one review): 
```
http://127.0.0.1:8000/api/review/{id}
```
**POST**    (create a new review): 
```
http://127.0.0.1:8000/api/review
```
**PUT**     (edit one review): 
```
http://127.0.0.1:8000/api/review/{id}
```
**DELETE**  (delete an review): 
```
http://127.0.0.1:8000/api/review/{id}
```

### 🔸 Api Users 

**GET**     (read all users): 
```
http://127.0.0.1:8000/api/users 
```
**GET**     (read one user): 
```
http://127.0.0.1:8000/api/users/{id}
```
**POST**    (create a new user): 
```
http://127.0.0.1:8000/api/users
```
**PUT**     (edit one user): 
```
http://127.0.0.1:8000/api/users/{id}
```
**DELETE**  (delete an user): 
```
http://127.0.0.1:8000/api/users/{id}
```

>[!NOTE]
>"{id}" is the id number of a object.


## ▶️💻 Project structure

The project follows the structure of the MVC design pattern, which allows a better separation of responsibilities and facilitates the maintenance of the code. We also use a laravel 11 framework to help us develop in PHP.

![estructuraMVC](https://github.com/user-attachments/assets/2ecf4108-4d00-47c5-bb7e-afe8ac59a77d)


## 🛠️🚀 Tech and tools
<a href='#777BB4' target="_blank"><img alt='PHP' src='https://img.shields.io/badge/PHP-100000?style=for-the-badge&logo=PHP&logoColor=FFFFFF&labelColor=8892be&color=8892be'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='CSS3' src='https://img.shields.io/badge/CSS3-100000?style=for-the-badge&logo=CSS3&logoColor=white&labelColor=1572B6&color=1572B6'/></a>
<a href='#4479A1' target="_blank"><img alt='MySQL' src='https://img.shields.io/badge/MySQL-100000?style=for-the-badge&logo=MySQL&logoColor=white&labelColor=00758f&color=00758f'/></a>
<a href='#FF2D20' target="_blank"><img alt='LARAVEL' src='https://img.shields.io/badge/LARAVEL-100000?style=for-the-badge&logo=LARAVEL&logoColor=white&labelColor=F05340&color=F05340'/></a>
<a href='visual studio code' target="_blank"><img alt='VSC' src='https://img.shields.io/badge/VSC-100000?style=for-the-badge&logo=VSC&logoColor=white&labelColor=0277BD&color=0277BD'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Git' src='https://img.shields.io/badge/Git-100000?style=for-the-badge&logo=Git&logoColor=white&labelColor=F05032&color=F05032'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='GitHub' src='https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=GitHub&logoColor=white&labelColor=181717&color=181717'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='composer' src='https://img.shields.io/badge/composer-100000?style=for-the-badge&logo=composer&logoColor=white&labelColor=8f6447&color=8f6447'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='postman' src='https://img.shields.io/badge/Postman-100000?style=for-the-badge&logo=postman&logoColor=white&labelColor=FF6C37&color=FF6C37'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='node.js' src='https://img.shields.io/badge/Node.js-100000?style=for-the-badge&logo=node.js&logoColor=white&labelColor=82cc27&color=82cc27'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='xampp' src='https://img.shields.io/badge/xampp-100000?style=for-the-badge&logo=xampp&logoColor=white&labelColor=FB7A24&color=FB7A24'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='javascript' src='https://img.shields.io/badge/javascript-100000?style=for-the-badge&logo=javascript&logoColor=000000&labelColor=F7DF1E&color=F7DF1E'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='react' src='https://img.shields.io/badge/REACT-100000?style=for-the-badge&logo=react&logoColor=000000&labelColor=61DAFB&color=61DAFB'/></a>


## ✍️🙍 Authors

- [Issam Chellaf](https://github.com/issamchlf)
- [Jose Romero](https://github.com/JoseRD149)
- [Mabel Rincon](https://github.com/MabelRincon)
- [René Barco](https://github.com/mrene42)
