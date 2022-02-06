<?php
namespace tools;
interface Routes {
    // routes interface
    public function getController($name);
    public function getDefaultRoute();
    public function checkLogin($route);
}