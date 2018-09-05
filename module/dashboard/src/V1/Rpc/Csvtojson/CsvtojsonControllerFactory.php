<?php
namespace dashboard\V1\Rpc\Csvtojson;

class CsvtojsonControllerFactory
{
    public function __invoke($controllers)
    {
        return new CsvtojsonController();
    }
}
