<?php

class Country extends mysqli
{
    private $country_csv = false;
    public function __construct()
    {
        parent::__construct("localhost", "root", "", "interview_test");
        if ($this->connect_error) {
            echo "Failed to connect to database" . $this->connect_error;
        }
    }
    public function import($file)
    {
        $file = fopen($file, "r");
        while ($row = fgetcsv($file)) {

            $value = "'" . implode("','", $row) . "'";
            $insertQuery = "INSERT INTO country(continent_code,currency_code,iso2_code,iso3_code,iso_numeric_code,fips_code,calling_code,common_name,official_name,endonym,demonym) VALUES(" . $value . ")";
            //echo $insertQuery;
            if ($this->query($insertQuery)) {
                $this->country_csv = true;

            }
            else {
                $this->country_csv = false;

            }

        }
        if ($this->country_csv) {
            echo "<script>alert('Successful')</script>";
        }
        else {
            echo "<script>alert('Not successful')</script>";
        }

    }
}
?>