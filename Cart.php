<?php

/**
 * Class Cart
 * Current cart of logged in user
 */

class Cart {

    /**
     * calculate sum for all seats reserved.
     * @param User $current_user
     * @return int|null
     */
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

    public function remove_all_items(User $current_user){
        if($current_user->isLoggedIn() and isset($_SESSION['flights'])) {
            unset($_SESSION['flights']);
        }
    }

}