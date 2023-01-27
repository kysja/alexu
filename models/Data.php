<?php

class Data {
    public function get($type) {
        return json_decode(file_get_contents(__DIR__ . '/../data/' . $type . '.json'));
    }
}