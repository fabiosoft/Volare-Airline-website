<?php

/**
 * Class Cart
 * Current cart of logged in user
 */

class Cart {

    public function total_amount(User $current_user){
        if($current_user->isLoggedIn()){
            $totale = 0;
            foreach ($current_user->flights_reserved() as $flight){
                $totale = $totale + ($flight['seats'] * $flight['price']);
            }
            return $totale;
        }
        return NULL;
    }

}