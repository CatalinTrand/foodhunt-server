<?php

namespace App\Http\Controllers;

use App\Webservice\offerHandler;
use App\Webservice\orderHandler;
use App\Webservice\scheduledFoodDeliveries;
use App\Webservice\truckHandler;
use App\Webservice\userAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class requestController extends Controller
{
    //offers
    public function createOffer(){
        offerHandler::createOffer(
            Input::get("truckID"),
            Input::get("name"),
            Input::get("price"),
            Input::get("quantity")
        );
    }

    public function deleteOffer(){
        offerHandler::deleteOffer(
            Input::get("id")
        );
    }

    public function editOffer(){
        offerHandler::editOffer(
            Input::get("offerValues")
        );
    }

    public function getOffers(){
        return offerHandler::getOffers(
            Input::get("lat"),
            Input::get("lng"),
            Input::get("radius")
        );
    }

    public function flushOffers(){
        offerHandler::flushOffers(
            Input::get("truckID")
        );
    }

    //orders
    public function createOrder(){
        return orderHandler::createOrder(
            Input::get("truckID"),
            Input::get("offers"),
            Input::get("address"),
            Input::get("phone")
        );
    }

    public function deleteOrder(){
        orderHandler::deleteOrder(
            Input::get("id")
        );
    }

    public function getOrders(){
        return orderHandler::getOrders(
            Input::get("truckID")
        );
    }

    public function deliverOrder(){
        orderHandler::deliverOrder(
            Input::get("truckID"),
            Input::get("time"),
            Input::get("address")
        );
    }

    public function archiveOrders(){
        orderHandler::archiveOrders();
    }

    public function getOrdersArchived(){
        return orderHandler::getOrdersArchived();
    }


    //trucks
    public function updateTruckPosition(){
        truckHandler::updateTruckPosition(
            Input::get("truckID"),
            Input::get("lat"),
            Input::get("lng")
        );
    }

    //schedules
    public function createSchedule(){
        return scheduledFoodDeliveries::createSchedule(
            Input::get("date"),
            Input::get("name"),
            Input::get("quantity"),
            Input::get("supplier")
        );
    }

    public function deleteSchedule(){
        scheduledFoodDeliveries::deleteSchedule(
            Input::get("id")
        );
    }

    public function editSchedule(){
        scheduledFoodDeliveries::editSchedule(
            Input::get("schedule")
        );
    }

    public function getSchedules(){
        return scheduledFoodDeliveries::getSchedules();
    }

    //user
    public function createUser(){
        return userAuth::createUser(
            Input::get("name"),
            Input::get("address"),
            Input::get("phone"),
            Input::get("email"),
            Input::get("type"),
            Input::get("password")
        );
    }

    public function editUser(){
        userAuth::editUser(
            Input::get("user")
        );
    }

    public function deleteUser(){
        userAuth::deleteUser(
            Input::get("id")
        );
    }

    public function loginUser(){
        return userAuth::loginUser(
            Input::get("credentials")
        );
    }

    public function logoutUser(){
        userAuth::logoutUser(
            Input::get("id")
        );
    }
}
