# Tajawal Hotel Rest api task 
[![Build Status](https://travis-ci.org/AhmedGoudaa/TajawalHotelTask.svg?branch=master)](https://travis-ci.org/AhmedGoudaa/TajawalHotelTask) <a href="https://codeclimate.com/github/AhmedGoudaa/TajawalHotelTask/maintainability"><img src="https://api.codeclimate.com/v1/badges/4a94f2424b03afc677c7/maintainability" /></a>

This RESTful API to allow search in the given inventory by any of the following:
- Hotel [Name] => TajawalHotelTask/public/search?name=Le Meridien 
- Destination [City] => TajawalHotelTask/public/search?city=cairo
- Price range [ex: $100:$200] => TajawalHotelTask/public/search?priceFrom=100&priceTo=200
- Date range [ex: 10-10-2020:15-10-2020] => TajawalHotelTask/public/search?dateFrom=10-10-2020&dateTo=15-10-2020

and allow sorting by:

- Hotel Name   => TajawalHotelTask/public/search?orderBy=name&orderType=asc
- Price        => TajawalHotelTask/public/search?orderBy=price&orderType=desc


and allow multi search criterias and sorting
- [Name] [price range] [date range] [Price Sort desc] TajawalHotelTask/public/search?name=Le Meridien & priceFrom=70 & priceTo=100 & dateFrom=01-10-2020 & dateTo=12-10-2020 & orderBy=price & orderType=desc
    
    
### Project structure

- Presentation layer -> [lumen controllers](https://github.com/AhmedGoudaa/TajawalHotelTask/blob/master/app/Http/Controllers/HotelController.php)
- Tajawal Bounded Context . separate  module for hotel search and ordering [tajawalBContext](https://github.com/AhmedGoudaa/TajawalHotelTask/tree/master/tajawalBContext).
    - [Contracts ](https://github.com/AhmedGoudaa/TajawalHotelTask/tree/master/tajawalBContext/Contracts ) has all contracts or interfaces.
    - [Base layer ](https://github.com/AhmedGoudaa/TajawalHotelTask/tree/master/tajawalBContext/Base)that has all abstractions and My custom laravel [collection](https://github.com/AhmedGoudaa/TajawalHotelTask/blob/master/tajawalBContext/Base/Collection.php).
    - [Domain layer](https://github.com/AhmedGoudaa/TajawalHotelTask/tree/master/tajawalBContext/Domain) (business layer) that has all search and ordering logic with domain models.
        - Models [Hotel].
        - Services [HotelService - HotelCriteriaCreator].
    - [Infrastructure](https://github.com/AhmedGoudaa/TajawalHotelTask/tree/master/tajawalBContext/Infrastructure) has all libraries dependent code
        - [Criterias] ordering and sorting
        - [Repositories] HotelRepo
        - [Validation Rules] search rules
        - [HotelDataSource]  fetching hotels using rest api
        - [HotelCollectionMapper] Mapping hotels fetched from rest api from json to a Collection of Hotel object
        - [ValidatorService] Validation request data by laravel validation with [Validation Rules]
        
        
        


### Installation : 
    - composer install in the project directory
    
### test :
    - ./vendor/bin/phpunit  in the project directory
        