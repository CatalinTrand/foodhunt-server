<?php

namespace App\Http\Controllers;

use App\Webservice\offerHandler;
use App\Webservice\orderHandler;
use App\Webservice\truckHandler;
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
}
