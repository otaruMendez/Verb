<?php


class Verb
{
    public function run()
    {
        try{
            list($control, $actor) = Router::getRoutes();
            $controlObject = new $control();
            $controlObject->beforeExecution();
            self::execute($controlObject, $actor);
            $controlObject->afterExecution();
        }catch(Exception $e){
            echo "Something Terribly Went Wrong";
        }
    }

    private function execute($control, $actor)
    {
        call_user_func($control->$actor());
    }
}