<?php

class Portfolio {
    public function get() {
        return json_decode(file_get_contents(__DIR__ . '/../data/portfolio.json'));
    }
}