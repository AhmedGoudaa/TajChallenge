<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/24/18
 * Time: 1:29 AM
 */

namespace Tajawal\Infrastructure;

use Illuminate\Support\ServiceProvider;

class TajawalServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Tajawal\Contracts\CollectionMapper', 'Tajawal\Infrastructure\HotelCollectionMapper');
        $this->app->singleton('Tajawal\Base\AbstractHotelDataSource', 'Tajawal\Infrastructure\HotelDataSource');
        $this->app->singleton('Tajawal\Base\BaseRepository', 'Tajawal\Infrastructure\Repositories\HotelRepository');
        $this->app->singleton('Tajawal\Contracts\CriteriaCreator', 'Tajawal\Domain\Services\HotelCriteriaCreator');
        $this->app->singleton('Tajawal\Contracts\Validator', 'Tajawal\Infrastructure\ValidatorService');
        $this->app->singleton('Tajawal\Base\AbstractSearchRules', 'Tajawal\Infrastructure\Rules\Search');
        $this->app->when('App\Http\Controllers\HotelController')
            ->needs('Tajawal\Contracts\Service')
            ->give('Tajawal\Domain\Services\HotelService');


    }
}