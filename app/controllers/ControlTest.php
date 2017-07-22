<?php

class ControlTest extends ControlAll
{
    public function actonLogin()
    {
        $data = [];
        $data['firstname'] = "Babatunde";
        $data['lastname'] = "Otaru";
        $response = new Response();
        $response->setHeader("Content-type", "application/json");
        $response->setStatusCode(307);
        $response->sendResponse($data);
    }
}